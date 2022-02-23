<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'color'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relacion mucho a mucho
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
