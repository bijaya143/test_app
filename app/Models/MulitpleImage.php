<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MulitpleImage extends Model
{
    use HasFactory;
    //protected $table = 'multiple_images_table';
    protected $fillable = ['filenames'];

}
