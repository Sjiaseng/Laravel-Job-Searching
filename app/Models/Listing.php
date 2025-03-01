<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory; // Eloquent Listing

    protected $fillable = ['title', 'user_id', 'company', 'location', 'website', 'email', 'description', 'tags', 'logo'];

    public function scopeFilter($query, array $filters){
        //dd($filters['tag']);
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%' );
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%' )
                -> orWhere('description', 'like', '%' . request('search') . '%' )
                -> orWhere('tags', 'like', '%' . request('search') . '%' );
        }

        
    }

    // prefix "scope" for filtering in laravel executed by the "filter" function in controller
    // "query" make a query request


    // Relationship to User
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }




}
