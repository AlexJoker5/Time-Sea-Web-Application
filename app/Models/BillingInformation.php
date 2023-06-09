<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingInformation extends Model
{
    use HasFactory;
    protected $table = 'billing_information';
    protected $fillable = ['id', 'userId','city','state','zipCode','creditCartNo','creditCartExpireDate'];
}
