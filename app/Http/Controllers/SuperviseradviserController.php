<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\SuperviserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use View;
use Auth;

class SuperviseradviserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = View::make('/idea');
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
    public function create(Request $request)
    {
     
        
        $ideas= new Idea();

        $ideas->user_id=Auth::id();
        $ideas->title=$request->input('title');
        $ideas->description=$request->input('description');
        $ideas->save();
        return redirect('/idea')->with('success','data insert succfully');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function shows()
    {
        
        $view = View::make('/myideas');
        $view->nest('sidebar','adminpanel/partials/sidebar');
        $view->nest('header','adminpanel/partials/header');
        $view->nest('footer','adminpanel/partials/footer');
        return $view;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    
    {
        
        
        $users = User::select('id','name','email','type')->where('type', '=', 'superviser')->orWhere('type', '=', 'adviser')->get();
      
        $view = View::make('/supervisor', ['admins'=>$users ]);
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
    public function allideas()
    {
        $ideas=Idea::all();
       
         $view = View::make('/myideas', ['admins'=>$ideas ]);
        $view->nest('sidebar','adminpanel/partials/sidebar');
        $view->nest('header','adminpanel/partials/header');
        $view->nest('footer','adminpanel/partials/footer');
        return $view;

     

    }
    public function send(Request $request, $id)
    {

       SuperviserRequest::create([
            'from_id'=> Auth::id(),
             'to_id'=>$id,
            ]);
       
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        
        $admins = SuperviserRequest::join('users', 'users.id','=', 'superviser_requests.from_id')
        ->where('superviser_requests.to_id','=',Auth::id())->get();

        $view = View::make('adviserlist', ['admins'=>$admins]);
        $view->nest('sidebar','adminpanel/partials/sidebar');
        $view->nest('header','adminpanel/partials/header');
        $view->nest('footer','adminpanel/partials/footer');
        return $view;
    }
    public function accept($id)
    {
        
       
       
        SuperviserRequest::where('to_id',Auth::id())->where('from_id', $id)->update(['status' => 'accept']);
    
      
        
        
             return redirect()->back();

    }


    
    public function reject($id)
    {
        SuperviserRequest::where('to_id', Auth::id())->where('from_id', $id)->update(['status' => 'reject']);

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
       
        $adviser =  SuperviserRequest::where([
            'from_id'=> Auth::id(),
             'to_id'=>$id,
        ]);
        $adviser->delete();
        return redirect()->back();
    }
}
