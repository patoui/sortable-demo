<?php

namespace App;

use App\Sortable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sortable;

    public $sortables = ['id', 'views', 'published_at'];
}
