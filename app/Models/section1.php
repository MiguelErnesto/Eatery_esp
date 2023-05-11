<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section1 extends Model
{
    use HasFactory;

    protected $table = 'section1s';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = [
        'image',
        'lb_button',
        'link_button',
        'small_text',
        'large_text',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
