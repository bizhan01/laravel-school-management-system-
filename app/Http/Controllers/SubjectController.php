<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Subject;
use App\Classes;
use DB;


class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
            'class_id'=>'required',
            'subject'=>'required',
    ]);
      Subject::create([
          'class_id' => request('class_id'),
          'subjectName' => request('subject'),
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
            $subject = Subject::find($id)->toArray();
            return view('subject.editSubject', [
                'subject' => $subject
            ]);
        }
    }




     public function update(Request $req) {
       $this->validate($req, [
         'class_id'=>'required',
         'subject'=>'required',
       ]);

       $subject = Subject::find($req->id);
       $subject->class_id = $req->class_id;
       $subject->subjectName = $req->subject;
         try {
             $subject->save();
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
     DB::delete('delete from subjects where id = ?',[$id]);
     return back();
   }

}
