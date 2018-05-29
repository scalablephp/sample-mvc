<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeoMunicipality extends Model
{
    use SoftDeletes;
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $table = "geomunicipality";
    protected $primaryKey = "GeoMunicipalityId";
    protected $dates = ['deleted_at'];

    public function geoprovince()
    {
        return $this->belongsTo('App\GeoProvince','GeoProvinceId');
    }

    public function geoplaces()
    {
        return $this->hasMany('App\GeoPlace','GeoMunicipalityId');
    }

    public function scopeMunicipalityCheck($query, $search)
    {
        if($search != "") {
            return $query->whereRaw('LOWER(NameEn) LIKE ?',strtolower("%{$search}%"));
        }
        return $query;
    }
}
