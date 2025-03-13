<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['psgc_code', 'name', 'region_id', 'field_office_id'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }


    public function fieldOffice()
    {
        return $this->hasMany(FieldOffice::class);
    }

}
