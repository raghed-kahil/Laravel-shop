<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
//    public string $name,$img1,$img2;
//    public float $sale;
//    public int $price;
    protected $fillable = ['name', 'sale', 'price', 'img1', 'img2','color','brand','details'];

    protected $attributes = ['sale' => 0];
}
