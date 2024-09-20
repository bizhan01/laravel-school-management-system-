<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\MainClass;
use App\SubClass;
use App\ClassMembers;
use App\Student;
use DB;


class SubClassController extends Controller
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
      // $departements = SubClass::latest()->get();

      $departements = DB::table('sub_classes as scls')
       ->leftJoin('main_classes as mcls', 'scls.main_class_id', '=', 'mcls.id')
       ->select("scls.*", "mcls.grade as grade")
       ->get();
      return view('class.addSubClass', compact('classes','departements'));
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
            'grade'=>'required',
            'group'=>'required',
            'shift'=>'required',
            'year'=>'required',

    ]);
      SubClass::create([
          'main_class_id' => request('grade'),
          'group' => request('group'),
          'shift' => request('shift'),
          'year' => request('year'),
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
          $members = DB::table('class_members as mbr')
           ->leftJoin('students as std', 'mbr.student_id', '=', 'std.id')
           ->where('mbr.sub_class_id', $id)
           ->select("mbr.*", "std.name", "std.lastName", "std.id as student_id",)
           ->get();

            $students = Student::latest()->get();

            $departement = DB::table('sub_classes as scls')
             ->rightJoin('main_classes as mcls', 'scls.main_class_id', '=', 'mcls.id')
             ->where('scls.id', $id)
             ->select("scls.*", "mcls.grade", "mcls.id as mainClassID")
             ->get();

            return view('member.addMember', [
              'departement' => $departement,
              'members' => $members,
              'students' => $students
            ]);
        }
    }


    public function edit($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $departement = SubClass::find($id)->toArray();
            return view('class.editSubClass', [
                'departement' => $departement
            ]);
        }
    }




     public function update(Request $req) {
       $this->validate($req, [
         'grade'=>'required',
         'group'=>'required',
         'shift'=>'required',
         'year'=>'required',
       ]);

       $departement = SubClass::find($req->id);
       $departement->main_class_id = $req->grade;
       $departement->group = $req->group;
       $departement->shift = $req->shift;
       $departement->year = $req->year;

         try {
             $departement->save();
             return redirect('/subClass');
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
     DB::delete('delete from sub_classes where id = ?',[$id]);
     return back();
   }

}
