<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
	use SoftDeletes;
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $table = "log";
    protected $primaryKey = "LogID";
    protected $dates = ['deleted_at'];

    public function tablelist()
    {
        return $this->belongsTo('App\TableList','TableID');
    }
    public function scopeTableCheck($query, $tableID)
    {
        if($tableID != "0") {
           return $query->where("TableID",$tableID);
        }
        return $query;
    }

}
