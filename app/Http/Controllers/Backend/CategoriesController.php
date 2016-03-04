<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Category;

class CategoriesController extends Controller {

	
	public function index()	{
		$categories = Category::orderBy('name', 'asc')->paginate(10);
		return view('backend.categories.index', ['categories' => $categories]);
	}

	
	public function create(Category $category) {
		return view('backend.categories.form', ['category' => $category]);
	}

	public function store(StoreCategoryRequest $request) {

		Category::create($request->only('name', 'slug'));

		return redirect(route('backend.categories.index'))->with('message', 'Category Created');
	}

	public function show($id){
		//
	}

	public function edit($id) {
		$category = Category::findOrFail($id);
		return view('backend.categories.form', ['category' => $category]);
	}

	public function update($id)	{
		//
	}

	public function destroy($id) {
		$category = Category::findOrFail($id);
		$category->delete();
		return redirect(route('backend.categories.index'))->with('message', 'Category Deleted');
	}

}
