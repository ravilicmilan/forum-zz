<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\DeleteUserRequest;
use App\User;

class UsersController extends Controller {


	public function index()	{
		$users = User::paginate(10);
        return view('backend.users.index', ['users' => $users]);
	}

	public function create(User $user){
		return view('backend.users.form', ['user' => $user]);
	}

	public function store(StoreUserRequest $request)	{
		User::create([
			'name' => $request->get('name'), 
			'email' => $request->get('email'), 
			'password' => bcrypt($request->get('password')), 
			'admin' => $request->get('admin')
		]);

		return redirect(route('backend.users.index'))->with('message', 'New User Successfully Added');
	}


	public function show($id) {
		//
	}

	public function edit($id) {
		$user = User::findOrFail($id);
		return view('backend.users.form', ['user' => $user]);
	}

	public function update(UpdateUserRequest $request, $id)	{
		$user = User::findOrFail($id);
		$user->name = $request->get('name');
		$user->email = $request->get('email');

		if ($request->get('password')) {
			$user->password = bcrypt($request->get('password'));
		}

		if ($request->get('admin')) {
			$user->admin = $request->get('admin');
		}

		$user->save();

		return redirect(route('backend.users.index'))->with('message', 'Current User Successfully Updated');
	}


	public function destroy(DeleteUserRequest $request, $id) {
		$user = User::findOrFail($id);

        $user->delete();

        return redirect(route('backend.users.index'))->with('message', 'User Successfully Deleted');
	}

}
