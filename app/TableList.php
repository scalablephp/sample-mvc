<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TableList extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $table = "tablelist";
    protected $primaryKey = "TableID";

    public function logs()
    {
        return $this->hasMany('App\Log','TableID');
    }

}
