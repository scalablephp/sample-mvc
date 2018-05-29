<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\SubAttribute;
use App\Common;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.attributes');
    }
    /**
     * Get a listing of the resource by ajax method.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchall(Request $r)
    {
        $columns = array(
            0 =>'AttributeId',
            1 =>'NameEn'
        );
        $order = $columns[$r->input('order.0.column')];
        $dir = $r->input('order.0.dir');
        $limit = $r->input('length');
        $start = $r->input('start');

        $totalData = Attribute::count();
        $totalFiltered = $totalData;
        if(empty($r->input('search.value'))){
            $attributes = Attribute::offset($start)->limit($limit)->orderBy($order,$dir)->get();
        }else {
            $search = $r->input('search.value'); 
            $attributes =  Attribute::whereRaw('LOWER(NameEn) LIKE ?',strtolower("%{$search}%"))
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
            $totalFiltered = Attribute::whereRaw('LOWER(NameEn) LIKE ?',strtolower("%{$search}%"))
                             ->count();
        }
        $data = array();
        if(!empty($attributes))
        {
            foreach ($attributes as $val)
            {
                $edit = route('attributes.edit',$val->AttributeId);
                $del = route('attributes.destroy',$val->AttributeId);
                $nestedData=array();
                $nestedData[] = $val->AttributeId;
                $nestedData['DT_RowId'] = $val->AttributeId;
                $nestedData[] = $val->NameEn;
                $nestedData[] = '<a href="javascript:void(0);" data-uk-tooltip="{cls:\'uk-tooltip-small\',pos:\'bottom\'}" title="'.__('edit').'" onclick="showAjaxModal(\''.$edit.'\',\''.__('attr_edit').'\');"><i class="md-icon material-icons">&#xE3C9;</i></a><a href="javascript:void(0);" data-uk-tooltip="{cls:\'uk-tooltip-small\',pos:\'bottom\'}" title="'.__('select').'" class="selectID"><i class="icon icon-select-icon"></i></a><a href="javascript:void(0);" data-uk-tooltip="{cls:\'uk-tooltip-small\',pos:\'bottom\'}" title="'.__('delete').'" onclick="showConfirmModal(\''.$del.'\');"><i class="md-icon material-icons">&#xE872;</i></a>';
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
    public function fetchallsubattr(Request $r)
    {
        $columns = array(
            0 =>'SubAttributeId',
            1 =>'NameEn',
            2 =>'IsPublished',
            3 =>'SortID',
        );
        $order = $columns[$r->input('order.0.column')];
        $dir = $r->input('order.0.dir');
        $limit = $r->input('length');
        $start = $r->input('start');

        $totalData = Attribute::find($r->input('attr'))->subattributes()->count();
        $totalFiltered = $totalData;
        if(empty($r->input('search.value'))){
            $subattributes = Attribute::find($r->input('attr'))->subattributes()->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        }else {
            $search = $r->input('search.value'); 
            $subattributes =  Attribute::find($r->input('attr'))->subattributes()
                            ->whereRaw('LOWER(NameEn) LIKE ?',strtolower("%{$search}%"))
                            ->orWhere('IsPublished', strtolower("%{$search}%"))
                            ->orWhere('SortID', strtolower("%{$search}%"))
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
            $totalFiltered = Attribute::find($r->input('attr'))->subattributes()
                            ->whereRaw('LOWER(NameEn) LIKE ?',strtolower("%{$search}%"))
                            ->orWhere('IsPublished', strtolower("%{$search}%"))
                            ->orWhere('SortID', strtolower("%{$search}%"))
                            ->count();
        }
        $data = array();
        if(!empty($subattributes))
        {
            foreach ($subattributes as $val)
            {
                $edit = route('subattributes.edit',$val->SubAttributeId);
                $del = route('subattributes.destroy',$val->SubAttributeId);
                $nestedData=array();
                $nestedData[] = $val->SubAttributeId;
                $nestedData[] = $val->NameEn;
                $nestedData[] = ($val->IsPublished == "1") ? "<i class='material-icons'>&#xE876;</i>" : "<i class='material-icons'>&#xE5CD;</i>";
                $nestedData[] = $val->SortID;
                $nestedData[] = '<a href="javascript:void(0);" data-uk-tooltip="{cls:\'uk-tooltip-small\',pos:\'bottom\'}" title="'.__('edit').'" onclick="showAjaxModal(\''.$edit.'\',\''.__('sattr_edit').'\');"><i class="md-icon material-icons">&#xE3C9;</i></a><a href="javascript:void(0);" data-uk-tooltip="{cls:\'uk-tooltip-small\',pos:\'bottom\'}" title="'.__('delete').'" onclick="showConfirmModal(\''.$del.'\');"><i class="md-icon material-icons">&#xE872;</i></a>';
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
    public function verifyattr(Request $r)
    {
        $search = $r->input('aname');
        if($r->input('_aname') == $r->input('aname')) {
            return 'true';
        } else {
            $attribute = Attribute::whereRaw('LOWER(`NameEn`) = ?', [strtolower($search)])->first();
            if($attribute) {
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
        return view('admin.attributes_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $attr = new Attribute;
        $attr->NameEn = $r->input('aname');
        $attr->CreatedOn = Carbon::now();
        $attr->save();
        if($attr->AttributeId){
            Common::addLogData(array("tableID"=>'1',"value"=>$r->input('aname'),"ID"=>$attr->AttributeId,"userID"=>'1',"logType"=>'1'));
            return response()->json(array("sucess"=>"true","message"=>__('attr_add_success')));
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
        $data['attribute'] = Attribute::findOrFail($id);
        return view('admin.attributes_edit',$data);
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
        $attr = Attribute::findOrFail($id);
        $attr->NameEn = $r->input('aname');
        $attr->UpdatedOn = Carbon::now();
        if($attr->save()){
            Common::addLogData(array("tableID"=>'1',"value"=>$r->input('aname'),"ID"=>$id,"userID"=>'1',"logType"=>'2'));
            return response()->json(array("sucess"=>"true","message"=>__('attr_edit_success')));
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
        $attr = Attribute::findOrFail($id);
        $sattr = Attribute::find($id)->subattributes()->count();
        if($sattr > 0){
            return response()->json(array("sucess"=>"true","message"=>__('attr_rel_msg'),"method"=>""));
        }else {
            if(Attribute::destroy($id)){
                Common::addLogData(array("tableID"=>'1',"value"=>$attr->NameEn,"ID"=>$id,"userID"=>'1',"logType"=>'3'));
                return response()->json(array("sucess"=>"true","message"=>__('attr_delete_success'),"method"=>"app_datatables.table_attr()"));
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
            $attribute = Attribute::findOrFail($id);
            $subattribute = SubAttribute::with('attribute')->where('AttributeId',$id)->get();
            \Excel::create('D-Support Attributes'.date('dmYHis'), function($excel) use($attribute,$subattribute) {
                $excel->sheet(__('attr'), function($sheet) use($attribute) {
                    $sheet->cells('A1:E1', function($cells) {$cells->setBackground('#0b9a24');});
                    $sheet->cells('A1:E1', function($cells) {$cells->setFontWeight('bold');});
                    $sheet->cell('A1', function($cell) {$cell->setValue(__('export_id'));});
                    $sheet->cell('B1', function($cell) {$cell->setValue(__('export_name'));});
                    $sheet->cell('C1', function($cell) {$cell->setValue(__('publish'));});
                    $sheet->cell('D1', function($cell) {$cell->setValue(__('created'));});
                    $sheet->cell('E1', function($cell) {$cell->setValue(__('updated'));});

                    $sheet->cell('A2', function($cell) use($attribute) {$cell->setValue($attribute->AttributeId);});
                    $sheet->cell('B2', function($cell) use($attribute) {$cell->setValue($attribute->NameEn);});
                    $sheet->cell('C2', function($cell) use($attribute) {
                        $publish = __('pub_yes');
                        if($attribute->IsPublished == "0"){
                            $publish = __('pub_no');
                        }
                        $cell->setValue($publish);
                    });
                    $sheet->cell('D2', function($cell) use($attribute) {
                        if($attribute->CreatedOn != ""){
                            $cell->setValue(date("d M, Y H:i", strtotime($attribute->CreatedOn)));
                        }else {
                            $cell->setValue("-");
                        }
                    });
                    $sheet->cell('E2', function($cell) use($attribute) {
                        if($attribute->UpdatedOn != ""){
                            $cell->setValue(date("d M, Y H:i", strtotime($attribute->UpdatedOn)));
                        }else {
                            $cell->setValue("-");
                        }
                    });
                });
                $excel->sheet(__('sattr'), function($sheet) use($subattribute) {
                    $sheet->cells('A1:G1', function($cells) {$cells->setBackground('#0b9a24');});
                    $sheet->cells('A1:G1', function($cells) {$cells->setFontWeight('bold');});
                    $sheet->cell('A1', function($cell) {$cell->setValue(__('export_id'));});
                    $sheet->cell('B1', function($cell) {$cell->setValue(__('export_name'));});
                    $sheet->cell('C1', function($cell) {$cell->setValue(__('attr'));});
                    $sheet->cell('D1', function($cell) {$cell->setValue(__('sort_order'));});
                    $sheet->cell('E1', function($cell) {$cell->setValue(__('publish'));});
                    $sheet->cell('F1', function($cell) {$cell->setValue(__('created'));});
                    $sheet->cell('G1', function($cell) {$cell->setValue(__('updated'));});
                    $cellno = 2;
                    foreach ($subattribute as $v) {
                        $sheet->cell('A'.$cellno, function($cell) use($v) {$cell->setValue($v->SubAttributeId);});
                        $sheet->cell('B'.$cellno, function($cell) use($v) {$cell->setValue($v->NameEn);});
                        $sheet->cell('C'.$cellno, function($cell) use($v) {$cell->setValue($v->attribute->NameEn);});
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
            $attribute = Attribute::all();
            $subattribute = SubAttribute::with('attribute')->get();
            \Excel::create('D-Support Attributes'.date('dmYHis'), function($excel) use($attribute,$subattribute) {
                $excel->sheet(__('attr'), function($sheet) use($attribute) {
                    $sheet->cells('A1:E1', function($cells) {$cells->setBackground('#0b9a24');});
                    $sheet->cells('A1:E1', function($cells) {$cells->setFontWeight('bold');});
                    $sheet->cell('A1', function($cell) {$cell->setValue(__('export_id'));});
                    $sheet->cell('B1', function($cell) {$cell->setValue(__('export_name'));});
                    $sheet->cell('C1', function($cell) {$cell->setValue(__('publish'));});
                    $sheet->cell('D1', function($cell) {$cell->setValue(__('created'));});
                    $sheet->cell('E1', function($cell) {$cell->setValue(__('updated'));});

                    $cellno = 2;
                    foreach ($attribute as $v) {
                        $sheet->cell('A'.$cellno, function($cell) use($v) {$cell->setValue($v->AttributeId);});
                        $sheet->cell('B'.$cellno, function($cell) use($v) {$cell->setValue($v->NameEn);});
                        $sheet->cell('C'.$cellno, function($cell) use($v) {
                            $publish = __('pub_yes');
                            if($v->IsPublished == "0"){
                                $publish = __('pub_no');
                            }
                            $cell->setValue($publish);
                        });
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
                $excel->sheet(__('sattr'), function($sheet) use($subattribute) {
                    $sheet->cells('A1:G1', function($cells) {$cells->setBackground('#0b9a24');});
                    $sheet->cells('A1:G1', function($cells) {$cells->setFontWeight('bold');});
                    $sheet->cell('A1', function($cell) {$cell->setValue(__('export_id'));});
                    $sheet->cell('B1', function($cell) {$cell->setValue(__('export_name'));});
                    $sheet->cell('C1', function($cell) {$cell->setValue(__('attr'));});
                    $sheet->cell('D1', function($cell) {$cell->setValue(__('sort_order'));});
                    $sheet->cell('E1', function($cell) {$cell->setValue(__('publish'));});
                    $sheet->cell('F1', function($cell) {$cell->setValue(__('created'));});
                    $sheet->cell('G1', function($cell) {$cell->setValue(__('updated'));});
                    $cellno = 2;
                    foreach ($subattribute as $v) {
                        $sheet->cell('A'.$cellno, function($cell) use($v) {$cell->setValue($v->SubAttributeId);});
                        $sheet->cell('B'.$cellno, function($cell) use($v) {$cell->setValue($v->NameEn);});
                        $sheet->cell('C'.$cellno, function($cell) use($v) {$cell->setValue($v->attribute['NameEn']);});
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
        return redirect('admin/attributes');
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
        if(count($filedata->first()->keys()->toArray()) == 1){
            $i = 2;
            foreach ((object)$filedata as $row) {
                $attribute = Attribute::whereRaw('LOWER(`NameEn`) = ?', [strtolower($row->name)])->first();
                if($attribute) {
                    $skipedrows[] = $i;
                } else {
                    $id = Attribute::insertGetId(array("NameEn"=>$row->name,"CreatedOn"=>Carbon::now()));
                    Common::addLogData(array("tableID"=>'1',"value"=>$row->name,"ID"=>$id,"userID"=>'1',"logType"=>'1'));
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
