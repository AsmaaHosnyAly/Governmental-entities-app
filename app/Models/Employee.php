<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $guarded=[];


    public function specializations()
    {
        return $this->belongsTo('App\models\Specialization', 'Specialization_id');
    }

    
    public function genders()
    {
        return $this->belongsTo('App\models\Gender', 'Gender_id');
    }


    public function entities()
    {
        return $this->belongsTo('App\Entity', 'Entity_id');
    }
}
