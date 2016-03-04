<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateTopicRequest;
use App\Http\Requests\EditTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Controllers\Controller;
use App\Category;
use App\Topic;
use Carbon\Carbon;
use Auth;

class TopicsController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => ['getShow']]);
    }

    public function getIndex() {
        //
    }

    public function getCreate() {
        $categories = Category::all();
        return view('topics.create', ['categories' => $categories]);
    }

    public function postCreate(CreateTopicRequest $request) {
        $user_id = Auth::user()->id;
        $date = new Carbon;
        $slug = $date->getTimestamp() . '-' . $request->get('slug');

        Topic::create([
            'category_id' => $request->get('category_id'),
            'user_id' => $user_id,
            'title' => $request->get('title'),
            'slug' => $slug,
            'description' => $request->get('description'),
            'content' => $request->get('content'),
        ]);

        return redirect('topics/' . $slug)->with('message', 'New Topic Created');
    }

    public function getShow($slug = '') {
        if ($slug == '') {
            return redirect('/');
        }

        $topic = Topic::where('slug', $slug)->first();

        if (!$topic) {
            return redirect('/');
        }

        $comments = $topic->comments()->orderBy('created_at', 'desc')->paginate(10);

        return view('topics.show', ['topic' => $topic, 'comments' => $comments]);
    }

    public function getSearch(Request $request) {
        $search = $request->get('search');

        $topics = Topic::where('title', 'LIKE', '%' . $search . '%')->paginate(10);

        return view('topics.search', ['topics' => $topics, 'search' => $search]);
    }

    public function getEdit(EditTopicRequest $request, $id) {
        $topic = Topic::find($id);
        $categories = Category::all();

        return view('topics.edit', ['topic' => $topic, 'categories' => $categories]);
    }

    public function postEdit(UpdateTopicRequest $request, $id) {
        $topic = Topic::find($id);

        $date = new Carbon;

        $topic->category_id = $request->get('category_id');

        $topic->title = $request->get('title');

        if ($topic->slug != $request->get('slug')) {
            $topic->slug = $date->getTimestamp() . '-' . $request->get('slug');
        } 

        $topic->description = $request->get('description');
        $topic->content = $request->get('content');

        $topic->save();

        return redirect('topics/' . $topic->slug)->with('message', 'Topic Updated');
    }


    public function destroy($id) {
        //
    }
}
