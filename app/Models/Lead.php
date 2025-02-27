<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'address',
        'mobile',
        'email',
        'postcode',
        'address1',
        'address2',
        'address3',
        'city',
        'county',
        'countrylist',
    ];
}
