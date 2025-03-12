<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $primarykey = 'id';
    protected $fillable = ['name', 'code'];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

}
