<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItrStatus extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'itr_status';
    
}
