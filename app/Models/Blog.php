<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    protected $fillable = [
        'title',
        'description',
        'content',
        'post_date',
        'img_cover_name',
        'category_id',
    
    ];
    
    
    protected $dates = [
        'post_date',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/blogs/'.$this->getKey());
    }
}
