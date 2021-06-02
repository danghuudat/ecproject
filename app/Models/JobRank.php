<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class JobRank extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'job_ranges';
    protected $fillable = [
        'id',
        'name',
    ];
}
