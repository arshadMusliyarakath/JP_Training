<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class UserAddress extends Model
{
    use HasFactory;
    //use Cachable;

    protected $primaryKey = 'address_id';

    public function userPersonal()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
