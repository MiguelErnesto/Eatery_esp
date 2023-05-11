<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section6 extends Model
{
    use HasFactory;

    protected $table = 'section6s';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = ['phone_number'];

    protected $hidden = ['created_at', 'updated_at'];
}
