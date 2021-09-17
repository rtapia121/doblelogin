<?php

namespace App\Models;

use Brackets\AdminUI\Traits\HasWysiwygMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\DB;

class Post extends Model implements HasMedia
{
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use HasWysiwygMediaTrait;

    protected $table = 'post';

    protected $fillable = [
        'title',
        'content',
        'published_at',
        'description',
        'url_cover_img'
    ];


    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/posts/'.$this->getKey());
    }

    public function registerMediaCollections(): void{
        $this->addMediaCollection('url_cover_img')
        ->accepts('image/*')
        ->maxFileSize(2*1024*1024)
        ->canView('media.view') // Set the ability (Gate) which is required to view the medium (in most cases you would want to call private())
        ->canUpload('media.upload');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->autoRegisterThumb200();
    }

    public function searchMedia(){
        return   DB::table('media')
        ->where('model_id', '=', $this->id)
        ->where('collection_name', '=', 'url_cover_img')
        ->where('model_type', '=', 'App\Models\Biography')
        ->first();
    }
}
