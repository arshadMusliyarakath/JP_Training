<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';

    public function getStatusTextAttribute(){
        if($this->status == 1) return 'Placed';
        else return "Delivered";
    }

    protected $appends = ['status_text'];
    
}
