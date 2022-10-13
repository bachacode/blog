<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $guearded = [];

    public function posts(): belongsToMany
    {
        return $this-> belongsToMany(Post::class);
    }
}
