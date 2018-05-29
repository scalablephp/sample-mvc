<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubAttribute extends Model
{
	use SoftDeletes;
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $table = "subattribute";
    protected $primaryKey = "SubAttributeId";
    protected $dates = ['deleted_at'];

    public function attribute()
    {
        return $this->belongsTo('App\Attribute','AttributeId');
    }
}
