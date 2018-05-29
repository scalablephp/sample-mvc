<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use App\TableList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tablelist'] = Common::importListDropdown();
        return view('admin.import',$data);
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
        $filename = "";
        if($request->hasFile('filexls')){
            $filename = $request->filexls->store('import');
            if($request->input('importTable') == "1"){
                $result = app('App\Http\Controllers\Admin\AttributeController')->import($filename);
            }elseif ($request->input('importTable') == "2"){
                $result = app('App\Http\Controllers\Admin\SubAttributeController')->import($filename);
            }
            if(count($result) == 0){
                $request->session()->flash('import_summary', '<p>'.__('error_import').'<p>');
            }else {
                $skipped = 0;
                $added = 0;
                if(count($result['skipped']) > 0){
                    $skipped = implode(',', $result['skipped']);
                }
                if(count($result['added']) > 0){
                    $added = implode(',', $result['added']);
                }
                $request->session()->flash('import_summary', '<p>'.__('import_rows').$added.__('import_rows_add_success').'</p><p>'.__('import_rows').$skipped.__('import_rows_skip_success').'</p>');
            }
            return redirect('admin/import');
        }
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
    public function destroy($id)
    {
        //
    }

    /**
     * Download Sample File.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sample_file($id)
    {
        $table = TableList::findOrFail($id);
        $filename = strtolower($table->Name).'_sample.xls';
        $storagePath = \Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix()."samples/".$filename;
        $filename = pathinfo($filename,PATHINFO_FILENAME)."_".date("dmYHis").".".pathinfo($filename, PATHINFO_EXTENSION);
        return response()->download($storagePath, $filename, ['Content-Type: application/vnd.ms-excel']);
        // $file = \Storage::disk('samples')->get(strtolower($table->Name).'_sample.xls');
        // return (new Response($storagePath, 200))->header('Content-Type', 'application/vnd.ms-excel');
    }
}
