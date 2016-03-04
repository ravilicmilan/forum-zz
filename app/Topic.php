<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model {
    protected $table = 'topics';
	protected $fillable = ['title', 'slug', 'description', 'content', 'category_id', 'user_id'];

	public function comments() {
		return $this->hasMany('App\Comment');
	}

	public function user() {
        return $this->belongsTo('App\User');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function dateCreated() {
        return $this->created_at->diffForHumans();
    }
}
