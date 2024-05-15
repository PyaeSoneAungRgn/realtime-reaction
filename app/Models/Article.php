<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Qirolab\Laravel\Reactions\Contracts\ReactableInterface;
use Qirolab\Laravel\Reactions\Traits\Reactable;

class Article extends Model implements ReactableInterface
{
    use HasFactory, Reactable;

    protected $fillable = [
        'title',
        'description',
    ];
}
