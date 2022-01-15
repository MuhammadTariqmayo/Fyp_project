<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Request;
use App\Models\User;
use App\Models\Idea;
use View;
use Hash;
use DB;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        // return date('Y-m-d', strtotime(Student::find(1)->created_at));

        $view = View::make('/student');
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
    public function create(Request $request ,$id)
    {

        $admins=User::where('id', $id)->first();
        // return $admins;
        $view = View::make('student_request', ['admin'=>$admins]);
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
       $admins=User::get();


        $view = View::make('mylist', ['admins'=>$admins]);
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

        $student = DB::table('users')->select('id','name','email','type')->where('type', 'student')->where('id', '!=', Auth::id())->get();
        // return  $student;
        $view = View::make('student_list', ['admins'=>$student]);
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
        $admins=Student::where('id', $id)->first();

        $view = View::make('student_edit', ['admins'=>$admins]);
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
    public function send(Request $request, $id)
    {
        // return $id;

        Request::create([
            'from_id'=> Auth::id(),
             'to_id'=>$id,
            ]);

        return redirect()->back();
    }



    public function accept($id)
    {


        Request::where('to_id',Auth::id())->where('from_id', $id)->update(['status' => 'accept']);




             return redirect()->back();

    }



    public function reject($id)
    {
        Request::where('to_id', Auth::id())->where('from_id', $id)->update(['status' => 'reject']);

             return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        // return $id;

        $student = Request::where([
            'from_id'=> Auth::id(),
             'to_id'=>$id,
        ]);
        $student->delete();
        return redirect()->back();
    }

    public function ideas()
    {
        $view = View::make('superviser_adviser_ideas');
        $view->nest('sidebar','adminpanel/partials/sidebar');
        $view->nest('header','adminpanel/partials/header');
        $view->nest('footer','adminpanel/partials/footer');
        return $view;

    }

    public function allideas()
    {
        $students=Idea::all();
        $view = View::make('superviser_adviser_ideas',['admins'=>$students]);
        $view->nest('sidebar','adminpanel/partials/sidebar');
        $view->nest('header','adminpanel/partials/header');
        $view->nest('footer','adminpanel/partials/footer');
        return $view;

    }
}
