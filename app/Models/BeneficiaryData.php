<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryData extends Model
{
    protected $fillable = [
        "civil_status",
        "sex",
        "date_of_birth",
        "occupation",
        "salary",
        "contact",
        "status",
    ];
}
