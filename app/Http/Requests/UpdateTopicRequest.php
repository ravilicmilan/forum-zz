<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use App\Topic;
use Auth;

class UpdateTopicRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()	{
		$topic = Topic::find($this->route()->parameter('id'));

		return Auth::user()->id == $topic->user_id;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()	{
		return [
			'title' => 'required|min:6',
            'slug' => 'required|min:6|unique:topics,slug,' . $this->id,
            'description' => 'required',
            'content' => 'required'
		];
	}

	public function forbiddenResponse() {
        return response(view('errors.403'), 403);
    }
}
