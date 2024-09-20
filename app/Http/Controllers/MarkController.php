<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mark;
use App\Departement;
use App\Student;
use App\Subject;
use App\Classes;
use DB;


class MarkController extends Controller
{

      public function index()
      {
        $marks = Mark::latest()->get();
        return view('mark.test', compact('marks'));
      }

      public function studentMarkInfo($id)
      {
        $studentInfo = Student::where('id', $id)->get();


        $mark1 = Mark::where('student_id', $id)->where('sub_grade', '=', 'اول')->get();
        $mark2 = Mark::where('student_id', $id)->where('sub_grade', '=', 'دوم')->get();
        $mark3 = Mark::where('student_id', $id)->where('sub_grade', '=', 'سوم')->get();
        $mark4 = Mark::where('student_id', $id)->where('sub_grade', '=', 'چهارم')->get();
        $mark5 = Mark::where('student_id', $id)->where('sub_grade', '=', 'پنجم')->get();
        $mark6 = Mark::where('student_id', $id)->where('sub_grade', '=', 'ششم')->get();
        $mark7 = Mark::where('student_id', $id)->where('sub_grade', '=', 'هفتم')->get();
        $mark8 = Mark::where('student_id', $id)->where('sub_grade', '=', 'هشتم')->get();
        $mark9 = Mark::where('student_id', $id)->where('sub_grade', '=', 'نهم')->get();
        $mark10 = Mark::where('student_id', $id)->where('sub_grade', '=', 'دهم')->get();
        $mark11 = Mark::where('student_id', $id)->where('sub_grade', '=', 'یازدهم')->get();
        $mark12 = Mark::where('student_id', $id)->where('sub_grade', '=', 'دوازدهم')->get();
        return view('mark.test', compact(
        'studentInfo',
        'mark1',
        'mark2',
        'mark3',
        'mark4',
        'mark5',
        'mark6',
        'mark7',
        'mark8',
        'mark9',
        'mark10',
        'mark11',
        'mark12',
      ));
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
            'student_id'=>'required',
            'sub_grade'=>'required',
            'subject'=>'required',
            'midterm_score'=>'required',
            'final_score'=>'required',

    ]);
      Mark::create([
          'student_id' => request('student_id'),
          'sub_grade' => request('sub_grade'),
          'subject' => request('subject'),
          'midterm_score' => request('midterm_score'),
          'final_score' => request('final_score'),
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


    public function edit($id='') {
        if ($id == '') {
            return back();
        }
        else {

          $subjects = DB::table('subjects as sub' )
           ->leftJoin('main_classes as cls', 'sub.class_id', '=', 'cls.id')
           ->where('sub.class_id',  $id)
           ->select("sub.*")
           ->get();


            $mark = Mark::find($id)->toArray();
            return view('mark.editMark', [
                'subjects' => $subjects,
                'mark' => $mark
            ]);
        }
    }




     public function update(Request $req) {
       $this->validate($req, [
         'student_id'=>'required',
         'sub_grade'=>'required',
         'subject'=>'required',
         'midterm_score'=>'required',
         'final_score'=>'required',
       ]);

       $member = Mark::find($req->id);
       $member->student_id = $req->student_id;
       $member->sub_grade = $req->sub_grade;
       $member->subject = $req->subject;
       $member->midterm_score = $req->midterm_score;
       $member->final_score = $req->final_score;
         try {
             $member->save();
             session()->flash('success', 'تغییرات موفقانه ذخیره گردید');
             return back();
         } catch (Exception $e) {
             session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
             return back();
         }
     }

     public function printTranscript(Request $request, $id)
        {
          $studentInfo = Student::where('id', $id)->get();
          $mark10 = Mark::where('student_id', $id)->where('sub_grade', '=', 'دهم')->get();
          $mark11 = Mark::where('student_id', $id)->where('sub_grade', '=', 'یازدهم')->get();
          $mark12 = Mark::where('student_id', $id)->where('sub_grade', '=', 'دوازدهم')->get();
          return view('mark.printTranscript', compact('studentInfo', 'mark10', 'mark11', 'mark12'));
        }

      public function printMark(Request $request, $id, $sub_grade)
         {
           $studentInfo = Student::where('id', $id)->get();
           $marks = Mark::where('student_id', $id)->where('sub_grade', $sub_grade)->get();
           return view('mark.printMark', compact('studentInfo', 'marks'));
         }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from marks where id = ?',[$id]);
     return back();
   }

}
