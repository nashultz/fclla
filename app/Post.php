<?php

namespace FCLLA;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['author_id','title','slug','excerpt','body','published_at'];

    protected $dates = ['published_at'];

    public function scopeLatest($query)
    {
        $query->orderBy('published_at','desc');
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function getAuthorAttribute()
    {
        return 'Nathon Shultz';
    }

    public function getPublishedAttribute()
    {
        return $this->published_at->toDayDateTimeString();
    }
}
