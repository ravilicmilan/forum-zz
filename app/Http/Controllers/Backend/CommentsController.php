<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Comment;
use Auth;

class CommentsController extends Controller {


	public function index()	{
		$comments = Comment::orderBy('created_at', 'desc')->paginate(10);
		return view('backend.comments.index', ['comments' => $comments]);
	}

	public function create(Comment $comment) {
		return view('backend.comments.form', ['comment' => $comment]);
	}


	public function store(CreateCommentRequest $request)	{
		Comment::create([
			'topic_id' => $request->get('topic_id'),
			'user_id' => Auth::user()->id,
			'comment' => $request->get('comment'),
		]);

		return redirect(route('backend.comments.index'))->with('message', 'Comment Created');
	}

	public function show($id) {
		//
	}

	public function edit($id){
		$comment = Comment::findOrFail($id);

		return view('backend.comments.form', ['comment' => $comment]);
	}

	public function update(CommentUpdateRequest $request, $id)	{
		$comment = Comment::findOrFail($id);

		$comment->fill($request->only('topic_id', 'comment'))->save();

		return redirect(route('backend.comments.index'))->with('message', 'Comment Updated');
	}

	public function destroy($id) {
		$comment = Comment::findOrFail($id);

		$comment->delete();

		return redirect(route('backend.comments.index'))->with('message', 'Comment Deleted');
	}

}
