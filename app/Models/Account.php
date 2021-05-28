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
        'previous_id',
        'newbu_id',
        'technology_id',
        'job_range_id',
        'language',
        'ob_day',
        'transfer_day',
        'source_id',
        'status_id',
        'forecast_customer_code',
        'forecast_bu_id',
        'note',
    ];

    public function previous()
    {
        return $this->belongsTo(Department::class, 'previous_id', 'id');
    }

    public function newbu()
    {
        return $this->belongsTo(Department::class, 'newbu_id', 'id');
    }
    public function forecast_bu()
    {
        return $this->belongsTo(Department::class, 'forecast_bu_id', 'id');
    }
    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }
    public function technology()
    {
        return $this->belongsTo(technology::class, 'technology_id', 'id');
    }
    public function job_range()
    {
        return $this->belongsTo(JobRank::class, 'job_range_id', 'id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
