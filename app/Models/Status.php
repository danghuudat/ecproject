<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Status extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'statuses';
    protected $fillable = [
        'id',
        'name',
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
