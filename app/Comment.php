<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    protected $table = 'comments';
	protected $fillable = ['comment', 'topic_id', 'user_id'];


	public function user() {
        return $this->belongsTo('App\User');
    }

    public function topic() {
        return $this->belongsTo('App\Topic');
    }

    public function dateCreated() {
        return $this->created_at->diffForHumans();
    }
}
