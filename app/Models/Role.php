<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

	protected $guarded = [];

	public function users(): BelongsToMany
	{
		$this->belongsToMany(User::class);
	}
}
