<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldOffice extends Model
{
    use HasFactory;

    protected $fillable = ['office_name', 'office_description', 'office_acronym', 'parent_id'];

    public function provinces()
    {
        return $this->belongsTo(Province::class);
    }

    public function parentOffice()
    {
        return $this->belongsTo(FieldOffice::class, 'parent_id');
    }

    public function satelliteOffices()
    {
        return $this->hasMany(FieldOffice::class, 'parent_id');
    }
}
