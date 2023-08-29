<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class, 'idCategory');
    }

    // public function user(): BelongsTo{
    //     return $this->belongsTo(User::class, 'idUser');
    // }

    public function tags(): BelongsToMany{
        return $this->belongsToMany(Tag::class, 'post_tags','idPost', 'idTag');
    }

    public function images() : MorphMany {
        return $this->morphMany(Image::class, 'imageable', 'typeImageable', 'idImageable');
    }

}
