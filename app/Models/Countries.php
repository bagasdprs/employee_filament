<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_code'
    ];

    public function employees()
    {
        return $this->hasMany(Employees::class, 'country_id');
    }

    public function states()
    {
        return $this->hasMany(States::class, 'country_id');
    }
}
