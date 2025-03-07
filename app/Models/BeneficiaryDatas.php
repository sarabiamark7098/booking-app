<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiaryDatas extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'extensionName',
        'contactNumber',
        'sex',
        'date_of_birth',
        'occupation',
        'salary',
        'status_report'
    ];

    public function beneficiary_user(){
        return $this->belongsTo(User::class);
    }
}
