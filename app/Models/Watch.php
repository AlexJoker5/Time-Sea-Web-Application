<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    use HasFactory;
    protected $table = 'watches';
    protected $fillable = ['id','serialName','category','featured','price','shortDescription','image','madeIn','company','releasedDate'];

    
}
