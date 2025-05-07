<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'city_id',
        'country_id',
        'state_id',
        'department_id',
        'zip_code',
        'birth_date',
        'date_hired',
    ];

    public function country()
    {
        return $this->belongsTo(Countries::class);
    }

    public function city()
    {
        return $this->belongsTo(Cities::class);
    }

    public function state()
    {
        return $this->belongsTo(States::class);
    }

    public function department()
    {
        return $this->belongsTo(Departments::class);
    }
}
