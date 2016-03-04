<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\EditProfileRequest;

use Auth;
use App\User;
use App\Topic;
use Carbon\Carbon;

class UsersController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function getShow($id) {
		$user = User::find($id);
		$topics = $user->topics()->orderBy('created_at', 'desc')->take(5)->get();
		return view('users.show', ['user' => $user, 'topics' => $topics]);
	}

	public function getEdit() {
		$user = Auth::user();
		return view('users.edit', ['user' => $user]);
	}

	public function postEdit(EditProfileRequest $request) {
		$user = Auth::user();
		$user->name = $request->get('name');
		$user->email = $request->get('email');

		if ($request->has('password')) {
			$user->password = bcrypt($request->get('password'));
		}

		if ($request->hasFile('avatar')) {
			$user->avatar = $this->uploadImage($request->file('avatar'));
		} else {
			$user->avatar = null;
		}
		
		$user->save();

		return redirect('users/me')->with('message', 'Your profile has been successfully updated.');
	}

	protected function uploadImage($image) {
		$path = '/img/users/';
		$name = sha1(Carbon::now()) . '.' . $image->guessExtension();

		$image->move(getcwd() . $path, $name);

		return $path . $name;
	}

	protected function deleteImage($oldPath) {
		$oldPath = getcwd() . $oldPath;

		if (is_file($oldPath)) {
			unlink(realpath($oldPath));			
		}
	}
}
