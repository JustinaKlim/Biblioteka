<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function bookAuthor()
   {
       return $this->belongsTo('App\Author', 'author_id', 'id');
   }

}
