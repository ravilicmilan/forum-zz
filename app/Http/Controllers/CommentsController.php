<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateCommentRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\Topic;
use App\Comment;

class CommentsController extends Controller {

	public function __construct() {
        $this->middleware('auth', ['except' => ['getShow']]);
    }
    
    public function postCreate(CreateCommentRequest $request) {
    	$user_id = Auth::user()->id;

    	$comment = Comment::create([
    		'topic_id' => $request->get('topic_id'),
    		'user_id' => $user_id,
    		'comment' => $request->get('comment')
    	]);

    	$comment->save();

    	return redirect()->back()->with('message', 'Thank you for your comment');
    }

    
}
