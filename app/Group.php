<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    //
    protected $table = 'group';
    protected $fillable = [
        'gr_name', 'br_id', 'gr_satus','created_at','updated_at',
    ];
    public $timestamps = false;

}
