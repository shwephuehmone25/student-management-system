<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rollno', 
        'class', 
        'name', 
        'DOB', 
        'nrc', 
        'father_name', 
        'address', 
        'phone_numbers', 
        'role_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'DOB' => 'date',
        'phone_numbers' => 'array',
    ];

    /**
     * Get the role that is assigned to the student.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
