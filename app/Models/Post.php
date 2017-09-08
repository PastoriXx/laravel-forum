<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'message'];

    /**
     * User relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Comments relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Comment
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Scope a query to only include allowed users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAllowed($query)
    {
        return $query->where($this->getTable() . '.user_id', Auth::id());
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function (self $model) {
            $model->user_id = Auth::id();
        });

    }
}
