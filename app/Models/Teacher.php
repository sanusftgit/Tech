<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $primarykey = 'id';
    protected $fillable = ['name', 'dob', 'gender',  'address', 'email', 'phonenumber'];

    public function students()
    {
        return $this->hasMany(Student::class);
        return $this->belongsToMany(Student::class, 'student_subjects');
    }

}
