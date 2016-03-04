<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateTopicRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicUpdateRequest;
use App\Topic;
use App\Category;
use Auth;

class TopicsController extends Controller {


	public function index()	{
		$topics = Topic::orderBy('created_at', 'desc')->paginate('10');
		return view('backend.topics.index', ['topics' => $topics]);
	}


	public function create(Topic $topic) {
		$categories = Category::orderBy('name', 'asc')->lists('name','id');
		return view('backend.topics.form', ['topic' => $topic, 'categories' => $categories]);
	}


	public function store(CreateTopicRequest $request)	{
		Topic::create([
			'category_id' => $request->get('category_id'),
			'user_id' => Auth::user()->id,
			'title' => $request->get('title'),
			'slug' => $request->get('slug'),
			'description' => $request->get('description'),
			'content' => $request->get('content')
		]);

		return redirect(route('backend.topics.index'))->with('message', 'New Topic Created');
	}

	public function show($id) {
		//
	}


	public function edit($id) {
		$topic = Topic::findOrFail($id);
		$categories = Category::orderBy('name', 'asc')->lists('name','id');

		return view('backend.topics.form', ['topic' => $topic, 'categories' => $categories]);
	}

	public function update(TopicUpdateRequest $request, $id)	{
		$topic = Topic::findOrFail($id);

		$topic->category_id = $request->get('category_id');
		$topic->title = $request->get('title');

		if ($topic->slug != $request->get('slug')) {
            $topic->slug = $date->getTimestamp() . '-' . $request->get('slug');
        }

        $topic->description = $request->get('description');
        $topic->content = $request->get('content');

        $topic->save();

        return redirect(route('backend.topics.index'))->with('message', 'Topic Updated');
	}


	public function destroy($id) {
		$topic = Topic::findOrFail($id);

		$topic->delete();

		return redirect(route('backend.topics.index'))->with('message', 'Topic Deleted');
	}

}
