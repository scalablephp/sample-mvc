<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use App\GeoMunicipality;
use App\GeoPlace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeoMunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('admin/geography');
    }
    public function getjson(Request $r)
    {
        $search = $r->input('search');
        $data = GeoMunicipality::whereRaw('LOWER(NameEn) LIKE ?',strtolower("{$search}%"))->select('NameEn AS value','GeoMunicipalityId AS title')->get();
        return response()->json($data);
    }
    public function verifymunicipality(Request $r)
    {
        $search = $r->input('mname');
        if($r->input('_mname') == $r->input('mname')) {
            return 'true';
        } else {
            $municipality = GeoMunicipality::where('GeoProvinceId', $r->input('_provid'))->whereRaw('LOWER(`NameEn`) = ?', [strtolower($search)])->first();
            if($municipality) {
                return 'false';
            } else {
                return 'true';
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = "")
    {
        if($id == ""){
            return __('muncplt_sel_prov');
        }
        $data['province'] = Common::provinceDropdown();
        $lastsort = GeoMunicipality::where('GeoProvinceId',$id)->orderBy('SortID', 'desc')->take(1)->first();
        if($lastsort == ""){
            $lastsort = 1;
        }else {
            $lastsort = $lastsort->SortID + 1;
        }
        $data['lastsort'] = $lastsort;
        $data['provinceID'] = $id;
        return view('admin.municipality_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $municipality = new GeoMunicipality;
        $municipality->GeoProvinceId = $r->input('_provid');
        $municipality->NameEn = $r->input('mname');
        $municipality->SortID = $r->input('sortid');
        if($r->input('publish')){
            $municipality->IsPublished = "1";
        }else {
            $municipality->IsPublished = "0";
        }
        $municipality->CreatedOn = Carbon::now();
        $municipality->save();
        if($municipality->GeoMunicipalityId){
            Common::addLogData(array("tableID"=>'5',"value"=>$r->input('mname'),"ID"=>$municipality->GeoMunicipalityId,"userID"=>'1',"logType"=>'1'));
            return response()->json(array("sucess"=>"true","message"=>__('muncplt_add_success')));
        }else {
            return response()->json(array("sucess"=>"false","message"=>__('error_ajax')));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['province'] = Common::provinceDropdown();
        $data['municipality'] = GeoMunicipality::findOrFail($id);
        return view('admin.municipality_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $municipality = GeoMunicipality::findOrFail($id);
        $municipality->GeoProvinceId = $r->input('_provid');
        $municipality->NameEn = $r->input('mname');
        $municipality->SortID = $r->input('sortid');
        if($r->input('publish')){
            $municipality->IsPublished = "1";
        }else {
            $municipality->IsPublished = "0";
        }
        $municipality->UpdatedOn = Carbon::now();
        if($municipality->save()){
            Common::addLogData(array("tableID"=>'5',"value"=>$r->input('mname'),"ID"=>$id,"userID"=>'1',"logType"=>'2'));
            return response()->json(array("sucess"=>"true","message"=>__('muncplt_edit_success')));
        }else {
            return response()->json(array("sucess"=>"false","message"=>__('error_ajax')));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipality = GeoMunicipality::findOrFail($id);
        $places = GeoMunicipality::find($id)->geoplaces()->count();
        if($places > 0){
            return response()->json(array("sucess"=>"true","message"=>__('muncplt_rel_msg'),"method"=>""));
        }else {
            if(GeoMunicipality::destroy($id)){
                Common::addLogData(array("tableID"=>'5',"value"=>$municipality->NameEn,"ID"=>$id,"userID"=>'1',"logType"=>'3'));
                return response()->json(array("sucess"=>"true","message"=>__('muncplt_delete_success'),"method"=>'app_datatables.table_municipality('.$municipality->GeoProvinceId.')'));
            }else {
                return response()->json(array("sucess"=>"false","message"=>__('error_ajax'),"method"=>""));
            }
        }
    }
}
