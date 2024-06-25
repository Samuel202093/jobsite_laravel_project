<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Listings extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'company',
        'location',
        'email',
        'website',
        'tags',
        'description',
        'logo',
        'user_id'
    ];


    public function scopeFilter($query, array $filters){
       //$querying based on location, title, tags and description
        if (isset($filters['search']) && $filters['search']) {
            $query->where('title', 'like', '%' . $filters['search'] . '%')
            ->orwhere('description', 'like', '%' . $filters['search'] . '%')
            ->orwhere('tags', 'like', '%' . $filters['search'] . '%')
            ->orwhere('location', 'like', '%' . $filters['search'] . '%');
        }
    }

    // creating a user relationship: here we will create a relationship between the user and the listings
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
