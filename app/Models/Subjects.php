<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectsFactory> */
    protected $table = 'subjects';
    protected $fillable = [
        'name',
    ];
    public function teachers()
    {
        return $this->hasMany(Teachers::class, 'subjects_id');
    }
    use HasFactory;
}
