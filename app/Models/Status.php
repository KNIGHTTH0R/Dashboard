<?php

namespace Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $table = 'statuses';

	protected $fillable = [
		'body'
	];

	public function user()
	{
		return $this->belongsTo('Dashboard\Models\User', 'user_id');
	}

	public function scopeNotReply($query)
	{
		return $query->whereNull('parent_id');
	}

	public function replies()
	{
		return $this->hasMany('Dashboard\Models\Status', 'parent_id');
	}
}