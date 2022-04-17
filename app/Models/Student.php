<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "tbl_registered_students";
    protected $primaryKey = "Student_ID";
    public $timestamps = false;


    public function getRouteKeyName(){
        return 'szRegistrationNumber';
    }
}
