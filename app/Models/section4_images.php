<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section4_images extends Model
{
    use HasFactory;
    protected $table = 'section4_images';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = [
        'image',
        'title',
        'description',
        'text_popup',
        'price',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
