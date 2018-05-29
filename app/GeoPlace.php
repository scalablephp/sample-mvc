<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeoPlace extends Model
{
    use SoftDeletes;
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $table = "geoplace";
    protected $primaryKey = "GeoPlaceId";
    protected $dates = ['deleted_at'];

    public function geomunicipality()
    {
        return $this->belongsTo('App\GeoMunicipality','GeoMunicipalityId');
    }
}
