<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class technology extends Model
{
    use HasFactory;
    protected $table = 'technologies';


    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
