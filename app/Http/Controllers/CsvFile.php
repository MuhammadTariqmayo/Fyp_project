<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\csvImport;
use App\Exports\CsvExport; 
use Maatwebsite\Excel\Facades\Excel;  
use App\Models\User;
use View;

class CsvFile extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      
         $view = view::make('csv_file');
        $view->nest('sidebar','adminpanel/partials/sidebar');
        $view->nest('header','adminpanel/partials/header');
        $view->nest('footer','adminpanel/partials/footer');
        return $view;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function csv_export()
    {
        return Excel::download(new CsvExport,'sample.csv');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function csv_import(Request $request)
    {
        // dd($request->all());
            Excel::import(new csvImport, request()->file('file'));
        
        
            // dd('weyru');

            
            return redirect()-> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
        $data= User::where('type', 'adviser')->orwhere('type','student' )->orwhere('type','superviser' )->get();
        // return $data;    
        $view = view::make('csv_file_pagination', ['datas'=> $data]);
        $view->nest('sidebar','adminpanel/partials/sidebar');
        $view->nest('header','adminpanel/partials/header');
        $view->nest('footer','adminpanel/partials/footer');
        return $view;
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
}
