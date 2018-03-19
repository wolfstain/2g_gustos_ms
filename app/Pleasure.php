<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pleasure extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'category_id',
      'user_id',
      'name',
      'description',  
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
