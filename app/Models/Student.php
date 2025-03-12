<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $fillable = ['regnumber','name','photo', 'dob', 'email', 'phonenumber', 'address','subject','gender', 'teacher_id'];


    public function  teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subjects()
    {

        return $this->belongsToMany(Subject::class,'student_subject','student_Id','subject_id');
    }
}
