<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\ClassMembers;
use App\Departement;
use App\Student;
use App\Subject;
use App\Classes;
use App\Mark;
use DB;


class ClassMembersController extends Controller
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



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate(request(),[
            'sub_class_id'=>'required',
            'main_class_id'=>'required',
            'student_id'=>'required',
    ]);
      ClassMembers::create([
          'sub_class_id' => request('sub_class_id'),
          'main_class_id' => request('main_class_id'),
          'student_id' => request('student_id'),
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



    public function studentMarks($id='') {
        if ($id == '') {
            return back();
        }
        else {

          $subjects = DB::table('subjects as sub' )
           ->leftJoin('main_classes as cls', 'sub.class_id', '=', 'cls.id')
           ->where('sub.class_id',  $id)
           ->select("sub.*")
           ->get();

          // $marks = Mark::latest()->get();
          // $marks = Mark::where('student_id', $id)->get();

          $marks  = DB::table('marks as mrk' )
           ->leftJoin('class_members as clsmbr', 'mrk.student_id', '=', 'clsmbr.student_id')
           ->where('clsmbr.id',  $id)
           ->select("mrk.*")
           ->get();


          $member = DB::table('class_members as clsmbr' )
           ->leftJoin('main_classes as mcls', 'clsmbr.main_class_id', '=', 'mcls.id')
           ->where('clsmbr.id',  $id)
           ->select("clsmbr.*", "mcls.grade as grade")
           ->get();

            return view('mark.addMark', [
                'member' => $member,
                'subjects' => $subjects,
                'marks' => $marks
            ]);
        }
    }


        public function studentSubjectMarks($id, $idd){
          $subjects = DB::table('subjects as sub' )
           ->leftJoin('main_classes as cls', 'sub.class_id', '=', 'cls.id')
           ->where('sub.class_id',  $idd)
           ->select("sub.*")
           ->get();

           $marks  = DB::table('marks as mrk' )
            ->leftJoin('class_members as clsmbr', 'mrk.student_id', '=', 'clsmbr.student_id')
            ->where('clsmbr.id',  $id)
            ->select("mrk.*")
            ->get();


           $member = DB::table('class_members as clsmbr' )
            ->leftJoin('main_classes as mcls', 'clsmbr.main_class_id', '=', 'mcls.id')
            ->where('clsmbr.id',  $id)
            ->select("clsmbr.*", "mcls.grade as grade")
            ->get();

            return view('mark.addMark', [
                'member' => $member,
                'subjects' => $subjects,
                'marks' => $marks
            ]);
    }





    public function edit($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $students = Student::latest()->get();
            $member = ClassMembers::find($id)->toArray();
            return view('member.editMember', [
                'students' => $students,
                'member' => $member
            ]);
        }
    }




     public function update(Request $req) {
       $this->validate($req, [
         'sub_class_id'=>'required',
         'main_class_id'=>'required',
         'student_id'=>'required',
       ]);

       $member = ClassMembers::find($req->id);
       $member->sub_class_id = $req->sub_class_id;
       $member->main_class_id = $req->main_class_id;
       $member->student_id = $req->student_id;
         try {
             $member->save();
            //  return redirect('/departement');
             session()->flash('success', 'تغییرات موفقانه ذخیره گردید');
             return back();
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
     DB::delete('delete from class_members where id = ?',[$id]);
     return back();
   }

}
