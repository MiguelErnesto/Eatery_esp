<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section7 extends Model
{
    use HasFactory;

    protected $table = 'section7s';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = [
        'fu_description',

        'rv_number1',
        'rv_number2',
        'rv_email',
        'rv_text',

        'oh_closed',
        'oh_days1',
        'oh_hours1',
        'oh_days2',
        'oh_hours2',
        'oh_bg_image',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
