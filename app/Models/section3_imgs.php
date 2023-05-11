<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section3_imgs extends Model
{
    use HasFactory;

    protected $table = 'section3_imgs';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = ['image', 'name', 'role', 'text_social_networks'];

    protected $hidden = ['created_at', 'updated_at'];
}
