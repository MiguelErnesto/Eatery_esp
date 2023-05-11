<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section2 extends Model
{
    use HasFactory;

    protected $table = 'section2s';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = ['small_text', 'large_text', 'description', 'image'];

    protected $hidden = ['created_at', 'updated_at'];
}
