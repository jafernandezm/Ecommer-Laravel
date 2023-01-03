<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'status',
    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    


   




    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }



}
