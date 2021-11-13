<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

	protected $fillable = [
		'category_id', 'title', 'description', 'status', 'author', 'image'
	];

	public function category(): BelongsTo
	{
		return  $this->belongsTo(Category::class, 'category_id', 'id');
	}
}
