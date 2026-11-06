<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // Isso diz ao Laravel o que PODE ser gravado. O '_token' será ignorado automaticamente.
    protected $fillable = ['title', 'icon', 'description'];
}