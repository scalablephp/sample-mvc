<?php

namespace App;

use App\Log;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
	public static function tableListDropdown()
	{
		$arr = array("0" => "All");
		$data = \DB::table('tablelist')->get();
		foreach ($data as $value) {
			$arr[$value->TableID] = $value->Name;
		}
		return $arr;
	}
	public static function importListDropdown()
	{
		$data = \DB::table('tablelist')->whereIn('TableID',[1,2])->get();
		foreach ($data as $value) {
			$arr[$value->TableID] = $value->Name;
		}
		return $arr;
	}
    public static function attributeDropdown()
	{
		$arr = array();
		$data = \DB::table('attribute')->select('AttributeId', 'NameEn')->get();
		foreach ($data as $value) {
			$arr[$value->AttributeId] = $value->NameEn;
		}
		return $arr;
	}
	public static function provinceDropdown()
	{
		$arr = array();
		$data = \DB::table('geoprovince')->select('GeoProvinceId', 'NameEn')->get();
		foreach ($data as $value) {
			$arr[$value->GeoProvinceId] = $value->NameEn;
		}
		return $arr;
	}
	public static function municipalityDropdown()
	{
		$arr = array();
		$data = \DB::table('geomunicipality')->select('GeoMunicipalityId', 'NameEn')->get();
		foreach ($data as $value) {
			$arr[$value->GeoMunicipalityId] = $value->NameEn;
		}
		return $arr;
	}
	public static function addLogData($obj)
	{
		$logtype = array(
			"1" => __('record_add'),
			"2" => __('record_update'),
			"3" => __('record_delete'),
		);
		$log = new Log;
        $log->TableID = $obj["tableID"];
        $log->ID = $obj["ID"];
        $log->UserID = $obj["userID"];
		$log->LogDetail = "[".$obj["value"]."] ".$logtype[$obj["logType"]];
        $log->CreatedOn = Carbon::now();
        $log->save();
        return $log->LogID;
	}

	public static function loginLogData($obj)
	{
		$time = Carbon::now();
		$logtype = array(
			"1" => __('log_login'),
			"2" => __('log_loggedout'),
			"3" => __('log_acc_lock'),
			"4" => __('log_fail_attmp'),
			"5" => __('log_fail_attmp1'),
			"6" => __('log_fail_attmp2'),
			"7" => __('log_fail_attmp3'),
		);
		$log = new Log;
        $log->TableID = "3";
        $log->ID = "0";
        $log->UserID = "0";
		$log->LogDetail = $logtype[$obj["logType"]]." : [".$obj["value"]."] : [".$time."] : "."[".$obj["ip"]."]";
        $log->CreatedOn = $time;
        $log->save();
        return $log->LogID;
	}
}
