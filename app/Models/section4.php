<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section4 extends Model
{
    use HasFactory;

    protected $table = 'section4s';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = ['title', 'description'];
    protected $hidden = ['created_at', 'updated_at'];
}
