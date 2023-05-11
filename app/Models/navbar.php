<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class navbar extends Model
{
    use HasFactory;

    protected $table = 'navbars';
    protected $primaryKey = 'id';

    protected $fillable = [
        'item1',
        'item2',
        'item3',
        'item4',
        'item5',
        'item6',
        'item7',
        'chk1',
        'chk2',
        'chk3',
        'chk4',
        'chk5',
        'chk6',
        'chk7',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
