<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        "first_name",
        "middle_name",
        "last_name",
        "extra_name",
    ];

    public function profile_user(){
        return $this->belongsTo(User::class);
    }
}
