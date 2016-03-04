<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TopicUpdateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()	{
		return true;
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

}
