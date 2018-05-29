<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use App\GeoPlace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeoPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.places');
    }
    /**
     * Get a listing of the resource by ajax method.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchall(Request $r)
    {
        $columns = array(
            0 =>'GeoPlaceId',
            1 =>'NameEn',
            2 => '',
            3 =>'SortID'
        );
        $order = $columns[$r->input('order.0.column')];
        $dir = $r->input('order.0.dir');
        $limit = $r->input('length');
        $start = $r->input('start');

        $totalData = GeoPlace::count();
        $totalFiltered = $totalData;
        if(empty($r->input('search.value'))){
            if($r->input('order.0.column') == "2"){
                $place = GeoPlace::with(['geomunicipality'=>function ($query)use ($dir){
                    $query->orderBy('NameEn',$dir);
                }])->orderBy('NameEn',$dir)->offset(0)->limit(10)->get();
            }else {
                $place = GeoPlace::with('geomunicipality')->offset($start)->limit($limit)->orderBy($order,$dir)->get();
            }
        }else {
            $search = $r->input('search.value'); 
            if($r->input('order.0.column') == "2"){
                $place =  GeoPlace::with(['geomunicipality'=>function ($query)use ($dir){
                                $query->orderBy('NameEn',$dir);
                            }])->orderBy('NameEn',$dir)
                            ->whereRaw('LOWER(NameEn) LIKE ?',strtolower("%{$search}%"))
                            ->orWhereHas('geomunicipality', function($q) use ($search){$q->MunicipalityCheck($search);})
                            ->orWhere('SortID', strtolower("%{$search}%"))
                            ->offset($start)
                            ->limit($limit)
                            ->get();
            }else {
                $place =  GeoPlace::with('geomunicipality')
                            ->whereRaw('LOWER(NameEn) LIKE ?',strtolower("%{$search}%"))
                            ->orWhereHas('geomunicipality', function($q) use ($search){$q->MunicipalityCheck($search);})
                            ->orWhere('SortID', strtolower("%{$search}%"))
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
            }
            $totalFiltered = GeoPlace::with('geomunicipality')
                            ->whereRaw('LOWER(NameEn) LIKE ?',strtolower("%{$search}%"))
                            ->orWhereHas('geomunicipality', function($q) use ($search){$q->MunicipalityCheck($search);})
                            ->orWhere('SortID', strtolower("%{$search}%"))
                            ->count();
        }
        $data = array();
        if(!empty($place))
        {
            foreach ($place as $val)
            {
                $edit = route('place.edit',$val->GeoPlaceId);
                $del = route('place.destroy',$val->GeoPlaceId);
                $nestedData=array();
                $nestedData[] = $val->GeoPlaceId;
                $nestedData['DT_RowId'] = $val->GeoPlaceId;
                $nestedData[] = $val->NameEn;
                $nestedData[] = $val->geomunicipality->NameEn;
                $nestedData[] = $val->SortID;
                $nestedData[] = '<a href="javascript:void(0);" data-uk-tooltip="{cls:\'uk-tooltip-small\',pos:\'bottom\'}" title="'.__('edit').'" onclick="showAjaxModal(\''.$edit.'\',\''.__('place_edit').'\');"><i class="md-icon material-icons">&#xE3C9;</i></a><a href="javascript:void(0);" data-uk-tooltip="{cls:\'uk-tooltip-small\',pos:\'bottom\'}" title="'.__('delete').'" onclick="showConfirmModal(\''.$del.'\');"><i class="md-icon material-icons">&#xE872;</i></a>';
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($r->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
        );
        return response()->json($json_data);
    }
    public function verifyplace(Request $r)
    {
        $search = $r->input('plname');
        if($r->input('_plname') == $r->input('plname')) {
            return 'true';
        } else {
            $place = GeoPlace::where('GeoMunicipalityId', $r->input('_mid'))->whereRaw('LOWER(`NameEn`) = ?', [strtolower($search)])->first();
            if($place) {
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
    public function create()
    {
        $data['municipality'] = Common::municipalityDropdown();
        return view('admin.place_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $place = new GeoPlace;
        $place->GeoMunicipalityId = $r->input('_mid');
        $place->NameEn = $r->input('plname');
        $place->SortID = $r->input('sortid');
        if($r->input('publish')){
            $place->IsPublished = "1";
        }else {
            $place->IsPublished = "0";
        }
        $place->CreatedOn = Carbon::now();
        $place->save();
        if($place->GeoMunicipalityId){
            Common::addLogData(array("tableID"=>'6',"value"=>$r->input('plname'),"ID"=>$place->GeoMunicipalityId,"userID"=>'1',"logType"=>'1'));
            return response()->json(array("sucess"=>"true","message"=>__('place_add_success')));
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
        $data['place'] = GeoPlace::where("GeoPlaceId",$id)->with('geomunicipality')->get();
        return view('admin.place_edit',$data);
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
        $place = GeoPlace::findOrFail($id);
        $place->GeoMunicipalityId = $r->input('_mid');
        $place->NameEn = $r->input('plname');
        $place->SortID = $r->input('sortid');
        if($r->input('publish')){
            $place->IsPublished = "1";
        }else {
            $place->IsPublished = "0";
        }
        $place->UpdatedOn = Carbon::now();
        if($place->save()){
            Common::addLogData(array("tableID"=>'6',"value"=>$r->input('plname'),"ID"=>$id,"userID"=>'1',"logType"=>'2'));
            return response()->json(array("sucess"=>"true","message"=>__('place_edit_success')));
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
        $place = GeoPlace::findOrFail($id);
        if(GeoPlace::destroy($id)){
            Common::addLogData(array("tableID"=>'6',"value"=>$place->NameEn,"ID"=>$id,"userID"=>'1',"logType"=>'3'));
            return response()->json(array("sucess"=>"true","message"=>__('place_delete_success'),"method"=>'app_datatables.table_place()'));
        }else {
            return response()->json(array("sucess"=>"false","message"=>__('error_ajax'),"method"=>""));
        }
    }

    /**
     * Export 
     *
     * @return Download xls file.
     */
    public function export()
    {
        $place = GeoPlace::with('geomunicipality')->get();
        \Excel::create('D-Support Place'.date('dmYHis'), function($excel) use($place) {
            $excel->sheet(__('place'), function($sheet) use($place) {
                $sheet->cells('A1:G1', function($cells) {$cells->setBackground('#0b9a24');});
                $sheet->cells('A1:G1', function($cells) {$cells->setFontWeight('bold');});
                $sheet->cell('A1', function($cell) {$cell->setValue(__('export_id'));});
                $sheet->cell('B1', function($cell) {$cell->setValue(__('export_name'));});
                $sheet->cell('C1', function($cell) {$cell->setValue(__('muncplt'));});
                $sheet->cell('D1', function($cell) {$cell->setValue(__('sort_order'));});
                $sheet->cell('E1', function($cell) {$cell->setValue(__('publish'));});
                $sheet->cell('F1', function($cell) {$cell->setValue(__('created'));});
                $sheet->cell('G1', function($cell) {$cell->setValue(__('updated'));});
                $cellno = 2;
                foreach ($place as $v) {
                    $sheet->cell('A'.$cellno, function($cell) use($v) {$cell->setValue($v->GeoPlaceId);});
                    $sheet->cell('B'.$cellno, function($cell) use($v) {$cell->setValue($v->NameEn);});
                    $sheet->cell('C'.$cellno, function($cell) use($v) {$cell->setValue($v->geomunicipality['NameEn']);});
                    $sheet->cell('D'.$cellno, function($cell) use($v) {$cell->setValue($v->SortID);});
                    $sheet->cell('E'.$cellno, function($cell) use($v) {
                        $publish = __('pub_yes');
                        if($v->IsPublished == "0"){
                            $publish = __('pub_no');
                        }
                        $cell->setValue($publish);
                    });
                    $sheet->cell('F'.$cellno, function($cell) use($v) {
                        if($v->CreatedOn != ""){
                            $cell->setValue(date("d M, Y H:i", strtotime($v->CreatedOn)));
                        }else{
                            $cell->setValue("-");
                        }
                    });
                    $sheet->cell('G'.$cellno, function($cell) use($v) {
                        if($v->UpdatedOn != ""){
                            $cell->setValue(date("d M, Y H:i", strtotime($v->UpdatedOn)));
                        }else{
                            $cell->setValue("-");
                        }
                    });
                    $cellno++;
                }
            });
        })->export('xls');
        return redirect('admin/place');
    }
}
