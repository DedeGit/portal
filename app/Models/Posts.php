<?php

namespace App\Models;

use App\Http\Controllers\Categories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
  use HasFactory;
  protected $fillable = [
    'post_author_id',
    'post_title',
    'post_url',
    'post_description',
    'post_content',
    'post_status',
    'main_categories',
    'sub_categories',
    'more',
    'post_image',
    'views'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function categories()
  {
    return $this->belongsToMany(Categories::class, 'categories_post', 'post_id', 'categories_id');
  }
}
