<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeoProvince extends Model
{
    use SoftDeletes;
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $table = "geoprovince";
    protected $primaryKey = "GeoProvinceId";
    protected $dates = ['deleted_at'];

    public function geomunicipalities()
    {
        return $this->hasMany('App\GeoMunicipality','GeoProvinceId');
    }

	/**
	* Override parent boot and Call deleting event
	*
	* @return void
	*/
	// protected static function boot() 
	// {
	// 	parent::boot();

	// 	static::deleting(function($province) {
	// 		foreach ($province->geomunicipalities()->get() as $p) {
	// 			$p->delete();
	// 		}
	// 	});
	// }
}
