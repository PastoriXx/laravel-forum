<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['message'];

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
     * User relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Post
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function (self $model) {
            $model->user_id = Auth::id();
        });

    }
}
