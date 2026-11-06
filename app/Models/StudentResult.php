<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    protected $fillable = ['name', 'image_url', 'description', 'instagram_url'];
}