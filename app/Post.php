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

    public function scopeGuests($query) {
        $query->where('members_only', 0);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function getAuthorAttribute()
    {
        $author = User::findOrFail($this->author_id);
        return $author->name;
    }

    public function getPublishedAttribute()
    {
        return $this->published_at->toDayDateTimeString();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
