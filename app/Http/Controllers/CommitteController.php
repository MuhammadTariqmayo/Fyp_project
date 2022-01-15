<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Http\Requests\CommiteValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use View;
use DB;


use App\Models\User;


class CommitteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=User::where('id','!=',Auth::id())->get();
        // return $admins;

        $view = View::make('adminpanel/pages/list-committe', ['admins'=>$admins]);
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
    public function create()
    {
    //    Auth::user();
        $view = view::make('adminpanel/pages/create-committe');
        $view->nest('sidebar','adminpanel/partials/sidebar');
        $view->nest('header','adminpanel/partials/header');
        $view->nest('footer','adminpanel/partials/footer');
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user =  User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->Password),
            'type'=>$request->type,
         ]);

         return $user;

        // return redirect()->route('committe.create')->with('success',
        // 'data added sucessfuly.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        return $id;
        $admins=User::where('id', $id)->first();
        // return $admins;

        $view = View::make('adminpanel/pages/committe_edit', ['admins'=>$admins]);
        $view->nest('sidebar','adminpanel/partials/sidebar');
        $view->nest('header','adminpanel/partials/header');
        $view->nest('footer','adminpanel/partials/footer');
        return $view;
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
        $admin = admin::find($id);
        // return $admin;
        $admin->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        User::find($id)->delete();
        return redirect()->back();

    }



}
