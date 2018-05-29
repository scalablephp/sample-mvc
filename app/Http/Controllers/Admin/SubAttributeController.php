<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use App\SubAttribute;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('admin/attributes');
    }
    public function verifyattr(Request $r)
    {
        $search = $r->input('sname');
        if($r->input('_sname') == $r->input('sname')) {
            return 'true';
        } else {
            $attribute = SubAttribute::where('AttributeId', $r->input('_attrid'))->whereRaw('LOWER(`NameEn`) = ?', [strtolower($search)])->first();
            if($attribute) {
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
            return __('sattr_sel_prov');
        }
        $data['attribute'] = Common::attributeDropdown();
        $lastsort = SubAttribute::where('AttributeId',$id)->orderBy('SortID', 'desc')->take(1)->first();
        if($lastsort == ""){
            $lastsort = 1;
        }else {
            $lastsort = $lastsort->SortID + 1;
        }
        $data['lastsort'] = $lastsort;
        $data['attributeID'] = $id;
        return view('admin.subattributes_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $sattr = new SubAttribute;
        $sattr->AttributeId = $r->input('_attrid');
        $sattr->NameEn = $r->input('sname');
        $sattr->SortID = $r->input('sortid');
        if($r->input('publish')){
            $sattr->IsPublished = "1";
        }else {
            $sattr->IsPublished = "0";
        }
        $sattr->CreatedOn = Carbon::now();
        $sattr->save();
        if($sattr->SubAttributeId){
            Common::addLogData(array("tableID"=>'2',"value"=>$r->input('sname'),"ID"=>$sattr->SubAttributeId,"userID"=>'1',"logType"=>'1'));
            return response()->json(array("sucess"=>"true","message"=>__('sattr_add_success')));
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
        $data['attribute'] = Common::attributeDropdown();
        $data['subattribute'] = SubAttribute::findOrFail($id);
        return view('admin.subattributes_edit',$data);
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
        $sattr = SubAttribute::findOrFail($id);
        $sattr->AttributeId = $r->input('_attrid');
        $sattr->NameEn = $r->input('sname');
        $sattr->SortID = $r->input('sortid');
        if($r->input('publish')){
            $sattr->IsPublished = "1";
        }else {
            $sattr->IsPublished = "0";
        }
        $sattr->UpdatedOn = Carbon::now();
        if($sattr->save()){
            Common::addLogData(array("tableID"=>'2',"value"=>$r->input('sname'),"ID"=>$id,"userID"=>'1',"logType"=>'2'));
            return response()->json(array("sucess"=>"true","message"=>__('sattr_edit_success')));
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
        $attr = SubAttribute::findOrFail($id);
        if(SubAttribute::destroy($id)){
            Common::addLogData(array("tableID"=>'2',"value"=>$attr->NameEn,"ID"=>$id,"userID"=>'1',"logType"=>'3'));
            return response()->json(array("sucess"=>"true","message"=>__('sattr_delete_success'),"method"=>'app_datatables.table_subattr('.$attr->AttributeId.')'));
        }else {
            return response()->json(array("sucess"=>"false","message"=>__('error_ajax'),"method"=>""));
        }
    }

    /**
     * Import 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Import xls file.
     */
    public function import($filename = "")
    {
        if($filename == ""){
            return '';
        }
        $skipedrows = $added = array();
        $storagePath = \Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        $filedata = \Excel::load($storagePath.'/'.$filename)->get();
        if(count($filedata->first()->keys()->toArray()) == 3){
            $i = 2;
            foreach ((object)$filedata as $row) {
                $attribute = SubAttribute::where('AttributeId', $row->attributeid)->whereRaw('LOWER(`NameEn`) = ?', [strtolower($row->name)])->first();
                if($attribute) {
                    $skipedrows[] = $i;
                } else {
                    $id = SubAttribute::insertGetId(array("AttributeId"=>$row->attributeid,"NameEn"=>$row->name,"SortID"=>$row->sortid,"CreatedOn"=>Carbon::now()));
                    Common::addLogData(array("tableID"=>'2',"value"=>$row->name,"ID"=>$id,"userID"=>'1',"logType"=>'2'));
                    $added[] = $i;
                }
                $i++;
            }
            return array('skipped'=>$skipedrows,'added'=>$added);
        }else {
            return [];
        }
    }
}
