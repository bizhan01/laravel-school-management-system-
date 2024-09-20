<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\MainClass;
use App\Subject;
use App\Student;
use DB;


class MainClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $classes = MainClass::get();
      return view('class.mainClass', compact('classes',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate(request(),[
            'grade'=>'required|unique:main_classes',
    ]);
      MainClass::create([
          'grade' => request('grade'),
          'created_at'=>carbon::now(),
          'updated_at'=>carbon::now(),
        ]);

        try {
         session()->flash('success', 'عملیات موافقانه اجرا شد ');
         return back();
         } catch(Exception $ex) {
         session()->flash('failed', 'خطا! دوباره کوشش کنید');
         return back();
       }
    }




    public function details($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $subjects = Subject::where('class_id', '=', $id)->get();
            $class = MainClass::find($id)->toArray();
            return view('subject.addSubject', [
                'class' => $class,
                'subjects' => $subjects,
            ]);
        }
    }


    public function edit($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $class = MainClass::find($id)->toArray();
            return view('class.editMainClass', [
                'class' => $class
            ]);
        }
    }




     public function update(Request $req) {
       $this->validate($req, [
         'grade'=>'required',
       ]);

       $class = MainClass::find($req->id);
       $class->grade = $req->grade;
         try {
             $class->save();
             return redirect('/mainClass');
         } catch (Exception $e) {
             session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
             return back();
         }
     }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from main_classes where id = ?',[$id]);
     return back();
   }

}
