<?php
    namespace App\Models;

    class Listing_Basic{
        public static function all(){
            return[
                    [
                        'id' => 1,
                        'title' => 'Listing 1',
                        'description' => 'Lorem Ipsum'
                    ],
                    [
                        'id' => 2,
                        'title' => 'Listing 2',
                        'description' => 'Lorem Ipsum'
                    ]
            ];
        }

        public static function find($id){
            $listings = self::all();
            foreach($listings as $listing){
                if($listing['id'] == $id){
                    return $listing;
                }
            }
        }
    }