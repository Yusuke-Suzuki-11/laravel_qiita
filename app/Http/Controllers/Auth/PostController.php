<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\BranchAndPathCoverageNotSupportedException;

use function Psy\debug;

class PostController extends Controller
{
	public function new()
	{
		return view('auth.drafts.new');
	}

	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required|max:255',
			'tags' => 'required|string',
			'article' => 'required|string'
		]);

		$tags = explode(' ', $request->tags);

		$tag1 = $tags[0];
		$tag2 = (isset($tags[1])) ? $tags[1] : null;
		$tag3 = (isset($tags[2])) ? $tags[2] : null;

		$article = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'tag1' => $tag1,
            'tag2' => $tag2,
            'tag3' => $tag3,
            'body' => $request->article,
		]);

		return redirect(route("drafts.show",[
			'id' => $article->id
		]));
	}

	public function show($id)
	{
		$article = Post::find($id);

		return view('auth.drafts.show', compact('article'));
	}
}
