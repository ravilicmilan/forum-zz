<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Topic;

class ForumController extends Controller {
    
    public function getIndex($slug = '') {
    	if (!$slug) {
	    	$categories = Category::orderBy('name', 'asc')->get();

	    	return view('home', ['categories' => $categories]);    		
    	} else {
    		$category = Category::where('slug', $slug)->first();

	        if (!$category) {
	            return redirect('/');
	        }

        	$topics = $category->topics()->orderBy('created_at', 'desc')->paginate(10);
	
        	return view('topics.index', ['topics' => $topics, 'category' => $category]);	        
    	}
    }

    
}
