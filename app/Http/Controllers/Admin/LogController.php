<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use App\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tablelist'] = Common::tableListDropdown();
        return view('admin.log',$data);
    }
    /**
     * Get a listing of the resource by ajax method.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchall(Request $r)
    {
        $columns = array(
            0 =>'LogID',
            1 =>'TableID',
            2 =>'LogDetail',
            3 =>'CreatedOn',
        );
        $order = $columns[$r->input('order.0.column')];
        $dir = $r->input('order.0.dir');
        $limit = $r->input('length');
        $start = $r->input('start');

        $totalData = Log::with('tablelist')->TableCheck($r->input('tID'))->count();
        $totalFiltered = $totalData;
        if(empty($r->input('search.value'))){
            $logs = Log::with('tablelist')->TableCheck($r->input('tID'))->offset($start)->limit($limit)->orderBy($order,$dir)->get();
        }else {
            $search = $r->input('search.value');
            $logs =  Log::with('tablelist')->TableCheck($r->input('tID'))
                            ->whereRaw(\DB::raw('LOWER(LogDetail) LIKE "%'.$search.'%"'))
                            ->orWhereRaw(\DB::raw('CAST(LogID as CHAR(50)) = "'.$search.'"'))
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
            $totalFiltered = Log::with('tablelist')->TableCheck($r->input('tID'))
                            ->whereRaw(\DB::raw('LOWER(LogDetail) LIKE "%'.$search.'%"'))
                            ->orWhereRaw(\DB::raw('CAST(LogID as CHAR(50)) = "'.$search.'"'))
                            ->count();
        }
        $data = array();
        if(!empty($logs))
        {
            foreach ($logs as $val)
            {
                $del = url('admin/logs/delete/'.$val->LogID.'/'.$r->input('tID'));
                $nestedData=array();
                $nestedData[] = $val->LogID;
                $nestedData[] = $val->tablelist->Name;

                $nestedData[] = ($val->TableID != 3) ? "[".$val->ID."]"." ".$val->LogDetail : $val->LogDetail;
                $nestedData[] = date('d M, Y H:i', strtotime($val->CreatedOn));
                $nestedData[] = '<a href="javascript:void(0);" data-uk-tooltip="{cls:\'uk-tooltip-small\',pos:\'bottom\'}" title="'.__('delete').'" onclick="showConfirmModal(\''.$del.'\');"><i class="md-icon material-icons">&#xE872;</i></a>';
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$tableID)
    {
        if($tableID != "0"){
            $log = Log::findOrFail($id);
            $tableID = $log->TableID;
        }
        if(Log::destroy($id)){
            return response()->json(array("sucess"=>"true","message"=>__('log_delete_success'),"method"=>"app_datatables.table_log(".$tableID.")"));
        }else {
            return response()->json(array("sucess"=>"false","message"=>__('error_ajax'),"method"=>""));
        }
    }
}
