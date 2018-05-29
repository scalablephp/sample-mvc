<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnauthorizeUser extends Model
{
    public $timestamps = false;
    protected $table = "unauthorizeuser";
    protected $primaryKey = "ID";
}
