<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'countries';
    protected $fillable = ['user_id','type','revenue','time'];
    protected $guarded = [];
}
