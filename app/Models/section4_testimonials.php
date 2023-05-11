<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section4_testimonials extends Model
{
    use HasFactory;
    protected $table = 'section4_testimonials';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = ['testimonial_text', 'name', 'name_description'];
    protected $hidden = ['created_at', 'updated_at'];
}
