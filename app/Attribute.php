<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
	use SoftDeletes;
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $table = "attribute";
    protected $primaryKey = "AttributeId";
    protected $dates = ['deleted_at'];

    public function subattributes()
    {
        return $this->hasMany('App\SubAttribute','AttributeId');
    }

	/**
	* Override parent boot and Call deleting event
	*
	* @return void
	*/
	protected static function boot() 
	{
		parent::boot();

		static::deleting(function($attributes) {
			foreach ($attributes->subattributes()->get() as $attribute) {
				$attribute->delete();
			}
		});
	}
}
