<?php

namespace App\Http\Controllers\Admin;

use App\GeoProvince;
use App\GeoMunicipality;
use App\Common;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeoProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.province');
    }
    /**
     * Get a listing of the resource by ajax method.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchall(Request $r)
    {
        $columns = array(
            0 =>'GeoProvinceId',
            1 =>'NameEn',
            2 =>'SortID'
        );
        $order = $columns[$r->input('order.0.column')];
        $dir = $r->input('order.0.dir');
        $limit = $r->input('length');
        $start = $r->input('start');

        $totalData = GeoProvince::count();
        $totalFiltered = $totalData;
        if(empty($r->input('search.value'))){
            $province = GeoProvince::offset($start)->limit($limit)->orderBy($order,$dir)->get();
        }else {
            $search = $r->input('search.value'); 
            $province =  GeoProvince::whereRaw('LOWER(NameEn) LIKE ?',strtolower("%{$search}%"))
                            ->orWhere('IsPublished', strtolower("%{$search}%"))
                            ->orWhere('SortID', strtolower("%{$search}%"))
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
            $totalFiltered = GeoProvince::whereRaw('LOWER(NameEn) LIKE ?',strtolower("%{$search}%"))
                            ->orWhere('IsPublished', strtolower("%{$search}%"))
                            ->orWhere('SortID', strtolower("%{$search}%"))
                            ->count();
        }
        $data = array();
        if(!empty($province))
        {
            foreach ($province as $val)
            {
                $edit = route('geography.edit',$val->GeoProvinceId);
                $del = route('geography.destroy',$val->GeoProvinceId);
                $nestedData=array();
                $nestedData[] = $val->GeoProvinceId;
                $nestedData['DT_RowId'] = $val->GeoProvinceId;
                $nestedData[] = $val->NameEn;
                $nestedData[] = $val->SortID;
                $nestedData[] = '<a href="javascript:void(0);" data-uk-tooltip="{cls:\'uk-tooltip-small\',pos:\'bottom\'}" title="'.__('edit').'" onclick="showAjaxModal(\''.$edit.'\',\''.__('province_edit').'\');"><i class="md-icon material-icons">&#xE3C9;</i></a><a href="javascript:void(0);" data-uk-tooltip="{cls:\'uk-tooltip-small\',pos:\'bottom\'}" title="'.__('select').'" class="selectID"><i class="icon icon-select-icon"></i></a><a href="javascript:void(0);" data-uk-tooltip="{cls:\'uk-tooltip-small\',pos:\'bottom\'}" title="'.__('delete').'" onclick="showConfirmModal(\''.$del.'\');"><i class="md-icon material-icons">&#xE872;</i></a>';
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
    public function fetchallmunicipality(Request $r)
    {
        $columns = array(
            0 =>'GeoMunicipalityId',
            1 =>'NameEn',
            2 =>'IsPublished',
            3 =>'SortID',
        );
        $order = $columns[$r->input('order.0.column')];
        $dir = $r->input('order.0.dir');
        $limit = $r->input('length');
        $start = $r->input('start');

        $totalData = GeoProvince::find($r->input('province'))->geomunicipalities()->count();
        $totalFiltered = $totalData;
        if(empty($r->input('search.value'))){
            $municipality = GeoProvince::find($r->input('province'))->geomunicipalities()->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        }else {
            $search = $r->input('search.value'); 
            $municipality =  GeoProvince::find($r->input('province'))->geomunicipalities()
                            ->whereRaw('LOWER(NameEn) LIKE ?',strtolower("%{$search}%"))
                            ->orWhere('IsPublished', strtolower("%{$search}%"))
                            ->orWhere('SortID', strtolower("%{$search}%"))
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
            $totalFiltered = GeoProvince::find($r->input('province'))->geomunicipalities()
                            ->whereRaw('LOWER(NameEn) LIKE ?',strtolower("%{$search}%"))
                            ->orWhere('IsPublished', strtolower("%{$search}%"))
                            ->orWhere('SortID', strtolower("%{$search}%"))
                            ->count();
        }
        $data = array();
        if(!empty($municipality))
        {
            foreach ($municipality as $val)
            {
                $edit = route('municipality.edit',$val->GeoMunicipalityId);
                $del = route('municipality.destroy',$val->GeoMunicipalityId);
                $nestedData=array();
                $nestedData[] = $val->GeoMunicipalityId;
                $nestedData[] = $val->NameEn;
                $nestedData[] = ($val->IsPublished == "1") ? "<i class='material-icons'>&#xE876;</i>" : "<i class='material-icons'>&#xE5CD;</i>";
                $nestedData[] = $val->SortID;
                $nestedData[] = '<a href="javascript:void(0);" data-uk-tooltip="{cls:\'uk-tooltip-small\',pos:\'bottom\'}" title="'.__('edit').'" onclick="showAjaxModal(\''.$edit.'\',\''.__('muncplt_edit').'\');"><i class="md-icon material-icons">&#xE3C9;</i></a><a href="javascript:void(0);" data-uk-tooltip="{cls:\'uk-tooltip-small\',pos:\'bottom\'}" title="'.__('delete').'" onclick="showConfirmModal(\''.$del.'\');"><i class="md-icon material-icons">&#xE872;</i></a>';
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
    public function verifyprovince(Request $r)
    {
        $search = $r->input('pname');
        if($r->input('_pname') == $r->input('pname')) {
            return 'true';
        } else {
            $province = GeoProvince::whereRaw('LOWER(`NameEn`) = ?', [strtolower($search)])->first();
            if($province) {
                return 'false';
            } else {
                return 'true';
            }
        }
        exit();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastsort = GeoProvince::orderBy('SortID', 'desc')->take(1)->first();
        if($lastsort == ""){
            $lastsort = 1;
        }else {
            $lastsort = $lastsort->SortID + 1;
        }
        $data['lastsort'] = $lastsort;
        return view('admin.province_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $province = new GeoProvince;
        $province->NameEn = $r->input('pname');
        $province->SortID = $r->input('sortid');
        $province->CreatedOn = Carbon::now();
        $province->save();
        if($province->GeoProvinceId){
            Common::addLogData(array("tableID"=>'4',"value"=>$r->input('pname'),"ID"=>$province->GeoProvinceId,"userID"=>'1',"logType"=>'1'));
            return response()->json(array("sucess"=>"true","message"=>__('province_add_success')));
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
        $data['province'] = GeoProvince::findOrFail($id);
        return view('admin.province_edit',$data);
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
        $province = GeoProvince::findOrFail($id);
        $province->NameEn = $r->input('pname');
        $province->SortID = $r->input('sortid');
        $province->UpdatedOn = Carbon::now();
        if($province->save()){
            Common::addLogData(array("tableID"=>'4',"value"=>$r->input('pname'),"ID"=>$id,"userID"=>'1',"logType"=>'2'));
            return response()->json(array("sucess"=>"true","message"=>__('province_edit_success')));
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
        $province = GeoProvince::findOrFail($id);
        $municipality = GeoProvince::find($id)->geomunicipalities()->count();
        if($municipality > 0){
            return response()->json(array("sucess"=>"true","message"=>__('province_rel_msg'),"method"=>""));
        }else {
            if(GeoProvince::destroy($id)){
                Common::addLogData(array("tableID"=>'4',"value"=>$province->NameEn,"ID"=>$id,"userID"=>'1',"logType"=>'3'));
                return response()->json(array("sucess"=>"true","message"=>__('province_delete_success'),"method"=>"app_datatables.table_province()"));
            }else {
                return response()->json(array("sucess"=>"false","message"=>__('error_ajax'),"method"=>""));
            }
        }
    }

    /**
     * Export 
     *
     * @return Download xls file.
     */
    public function export($id = "")
    {
        if($id != ""){
            $province = GeoProvince::findOrFail($id);
            $municipality = GeoMunicipality::with('geoprovince')->where('GeoProvinceId',$id)->get();
            \Excel::create('D-Support Geography'.date('dmYHis'), function($excel) use($province,$municipality) {
                $excel->sheet(__('province'), function($sheet) use($province) {
                    $sheet->cells('A1:E1', function($cells) {$cells->setBackground('#0b9a24');});
                    $sheet->cells('A1:E1', function($cells) {$cells->setFontWeight('bold');});
                    $sheet->cell('A1', function($cell) {$cell->setValue(__('export_id'));});
                    $sheet->cell('B1', function($cell) {$cell->setValue(__('export_name'));});
                    $sheet->cell('C1', function($cell) {$cell->setValue(__('sort_order'));});
                    $sheet->cell('D1', function($cell) {$cell->setValue(__('created'));});
                    $sheet->cell('E1', function($cell) {$cell->setValue(__('updated'));});

                    $sheet->cell('A2', function($cell) use($province) {$cell->setValue($province->GeoProvinceId);});
                    $sheet->cell('B2', function($cell) use($province) {$cell->setValue($province->NameEn);});
                    $sheet->cell('C2', function($cell) use($province) {$cell->setValue($province->SortID);});
                    $sheet->cell('D2', function($cell) use($province) {
                        if($province->CreatedOn != ""){
                            $cell->setValue(date("d M, Y H:i", strtotime($province->CreatedOn)));
                        }else {
                            $cell->setValue("-");
                        }
                    });
                    $sheet->cell('E2', function($cell) use($province) {
                        if($province->UpdatedOn != ""){
                            $cell->setValue(date("d M, Y H:i", strtotime($province->UpdatedOn)));
                        }else {
                            $cell->setValue("-");
                        }
                    });
                });
                $excel->sheet(__('muncplt'), function($sheet) use($municipality) {
                    $sheet->cells('A1:G1', function($cells) {$cells->setBackground('#0b9a24');});
                    $sheet->cells('A1:G1', function($cells) {$cells->setFontWeight('bold');});
                    $sheet->cell('A1', function($cell) {$cell->setValue(__('export_id'));});
                    $sheet->cell('B1', function($cell) {$cell->setValue(__('export_name'));});
                    $sheet->cell('C1', function($cell) {$cell->setValue(__('province'));});
                    $sheet->cell('D1', function($cell) {$cell->setValue(__('sort_order'));});
                    $sheet->cell('E1', function($cell) {$cell->setValue(__('publish'));});
                    $sheet->cell('F1', function($cell) {$cell->setValue(__('created'));});
                    $sheet->cell('G1', function($cell) {$cell->setValue(__('updated'));});
                    $cellno = 2;
                    foreach ($municipality as $v) {
                        $sheet->cell('A'.$cellno, function($cell) use($v) {$cell->setValue($v->GeoMunicipalityId);});
                        $sheet->cell('B'.$cellno, function($cell) use($v) {$cell->setValue($v->NameEn);});
                        $sheet->cell('C'.$cellno, function($cell) use($v) {$cell->setValue($v->geoprovince->NameEn);});
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
        }else {
            $province = GeoProvince::all();
            $municipality = GeoMunicipality::with('geoprovince')->get();
            \Excel::create('D-Support Geography'.date('dmYHis'), function($excel) use($province,$municipality) {
                $excel->sheet(__('province'), function($sheet) use($province) {
                    $sheet->cells('A1:E1', function($cells) {$cells->setBackground('#0b9a24');});
                    $sheet->cells('A1:E1', function($cells) {$cells->setFontWeight('bold');});
                    $sheet->cell('A1', function($cell) {$cell->setValue(__('export_id'));});
                    $sheet->cell('B1', function($cell) {$cell->setValue(__('export_name'));});
                    $sheet->cell('C1', function($cell) {$cell->setValue(__('sort_order'));});
                    $sheet->cell('D1', function($cell) {$cell->setValue(__('created'));});
                    $sheet->cell('E1', function($cell) {$cell->setValue(__('updated'));});

                    $cellno = 2;
                    foreach ($province as $v) {
                        $sheet->cell('A'.$cellno, function($cell) use($v) {$cell->setValue($v->GeoProvinceId);});
                        $sheet->cell('B'.$cellno, function($cell) use($v) {$cell->setValue($v->NameEn);});
                        $sheet->cell('C'.$cellno, function($cell) use($v) {$cell->setValue($v->SortID);});
                        $sheet->cell('D'.$cellno, function($cell) use($v) {
                            if($v->CreatedOn != ""){
                                $cell->setValue(date("d M, Y H:i", strtotime($v->CreatedOn)));
                            }else{
                                $cell->setValue("-");
                            }
                        });
                        $sheet->cell('E'.$cellno, function($cell) use($v) {
                            if($v->UpdatedOn != ""){
                                $cell->setValue(date("d M, Y H:i", strtotime($v->UpdatedOn)));
                            }else{
                                $cell->setValue("-");
                            }
                        });
                        $cellno++;
                    }
                });
                $excel->sheet(__('muncplt'), function($sheet) use($municipality) {
                    $sheet->cells('A1:G1', function($cells) {$cells->setBackground('#0b9a24');});
                    $sheet->cells('A1:G1', function($cells) {$cells->setFontWeight('bold');});
                    $sheet->cell('A1', function($cell) {$cell->setValue(__('export_id'));});
                    $sheet->cell('B1', function($cell) {$cell->setValue(__('export_name'));});
                    $sheet->cell('C1', function($cell) {$cell->setValue(__('province'));});
                    $sheet->cell('D1', function($cell) {$cell->setValue(__('sort_order'));});
                    $sheet->cell('E1', function($cell) {$cell->setValue(__('publish'));});
                    $sheet->cell('F1', function($cell) {$cell->setValue(__('created'));});
                    $sheet->cell('G1', function($cell) {$cell->setValue(__('updated'));});
                    $cellno = 2;
                    foreach ($municipality as $v) {
                        $sheet->cell('A'.$cellno, function($cell) use($v) {$cell->setValue($v->GeoMunicipalityId);});
                        $sheet->cell('B'.$cellno, function($cell) use($v) {$cell->setValue($v->NameEn);});
                        $sheet->cell('C'.$cellno, function($cell) use($v) {$cell->setValue($v->geoprovince['NameEn']);});
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
        }
        return redirect('admin/geography');
    }
}
