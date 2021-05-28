<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRank extends Model
{
    use HasFactory;
    protected $table = 'job_ranges';
    protected $fillable = [
        'id',
        'name',
    ];
}
