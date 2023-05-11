<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'email', 'date', 'hours', 'quantity'];

    protected $hidden = ['created_at', 'updated_at'];
}
