<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolios extends Model
{
    protected $fillable = ['tittle','sub_tittle','big_img','small_img','description','clint','category'];
}
