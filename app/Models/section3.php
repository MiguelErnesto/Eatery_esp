<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section3 extends Model
{
    use HasFactory;

    protected $table = 'section3s';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = ['title', 'description'];

    protected $hidden = ['created_at', 'updated_at'];
}
