<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'course',
        'user_id',
        'date',
        'pay',
        'status',
        'comment',

        ];


}
