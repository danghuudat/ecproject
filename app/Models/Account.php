<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'accounts';

    protected $fillable = [
        'fullname',
        'account',
        'previous',
        'newbu',
        'technology',
        'job_range',
        'language',
        'ob_day',
        'transfer_day',
        'source',
        'status',
        'forecast_customer_code',
        'forecast_bu',
        'note',
    ];

    public function previous()
    {
        return $this->belongsTo(Department::class, 'previous', 'id');
    }

    public function newbu()
    {
        return $this->belongsTo(Department::class, 'newbu', 'id');
    }
    public function forecast_bu()
    {
        return $this->belongsTo(Department::class, 'newbu', 'id');
    }
    public function source()
    {
        return $this->belongsTo(Source::class, 'source', 'id');
    }
    public function technology()
    {
        return $this->belongsTo(technology::class, 'technology', 'id');
    }
    public function job_range()
    {
        return $this->belongsTo(jobRange::class, 'job_range', 'id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status', 'id');
    }
}