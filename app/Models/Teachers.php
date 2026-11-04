<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    /** @use HasFactory<\Database\Factories\TeachersFactory> */
    protected $with = ['subjects'];
    protected $fillable = [
        'name',
        'niy',
        'subjects_id',
        'start_date',
    ];
    use HasFactory;
    public function subjects()
    {
        return $this->belongsTo(Subjects::class, 'subjects_id');
    }
}
