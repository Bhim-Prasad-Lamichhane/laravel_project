<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'students_info';

    protected $fillable = [
        'name',
        'age',
        'address',
        'email'
    ];
}
