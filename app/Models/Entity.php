<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;
    protected $fillable=['Name','Notes'];
    // protected $guarded;
     // protected $guarded=['email '];
     public $timestamps = true;

    
}
