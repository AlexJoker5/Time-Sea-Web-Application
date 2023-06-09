<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = ['id','user_id', 'watch_id','quantity','totalCost'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
