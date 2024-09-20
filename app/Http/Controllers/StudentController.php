<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class StudentController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function addStudent() {
    	return view('student.addStudent');
    }

    // save student
    public function saveStudent(Request $req) {
        $config = [
            'table' => 'students',
            'length' => 6,
            'prefix' => date('y'),
            'reset_on_prefix_change' => true
        ];
        $student_id = IdGenerator::generate($config);
    	$this->validate($req, [
    		'name' => 'required|String|max:20',
    		'lastName' => 'required|String|max:20',
    		'fatherName' => 'required|string',
    		'gfName' => 'required|string',
    		'address' => 'required|string',
    		'phone' => 'required|string',
    		'year' => 'required|string',
    		'photo' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999'
    	]);


        $photo_name = '';
		if($image = $req->file('photo')){
			$photo_name = date('YmdHis') . '.' . $image-> getClientOriginalExtension();
			$image -> move("UploadedImages/student", $photo_name);
      }
      else {
        $photo_name = 'noImange.jpg';
      }

    	  $student = new Student();
        $student->id = $student_id;
        $student->name = $req->name;
        $student->lastName = $req->lastName;
      	$student->fatherName = $req->fatherName;
      	$student->gfName = $req->gfName;
      	$student->address = $req->address;
      	$student->phone = $req->phone;
      	$student->year = $req->year;
      	$student->photo = $photo_name;

    	try {
    		$student->save();
            session()->flash('success', 'موفقانه ثبت شد');
    		session()->flash('student_id', $student_id);
    		return back();
    	} catch (Exception $e) {
    		session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
    		return back();
    	}
    }

    public function studentList() {
        $students = Student::all();
        return view('student.studentList', [
            'students' => $students
        ]);
    }



    public function editStudent($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $student = Student::find($id)->toArray();
            return view('student.editStudent', [
                'student' => $student
            ]);
        }
    }

    public function updateStudent(Request $req) {
      $this->validate($req, [
        'name' => 'required|string',
        'lastName' => 'required|string',
        'fatherName' => 'required|string',
        'gfName' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required|string',
        'year' => 'required|string',
        'photo' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999'
      ]);

        $photo_name = '';
    if($image = $req->file('photo')){
      $photo_name = date('YmdHis') . '.' . $image-> getClientOriginalExtension();
      $image -> move("UploadedImages/student", $photo_name);
      }

        $student = Student::find($req->id);
        $student->name = $req->name;
        $student->lastName = $req->lastName;
      	$student->fatherName = $req->fatherName;
      	$student->gfName = $req->gfName;
      	$student->address = $req->address;
      	$student->phone = $req->phone;
      	$student->year = $req->year;
        if ($photo_name != '') {
            $student->photo = $photo_name;
        }

        try {
            $student->save();
            session()->flash('success', 'موفقانه ثبت شد');
            return back();
        } catch (Exception $e) {
            session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
            return back();
        }
    }


    public function deleteStudent($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $s = Student::FindOrFail($id);
            if(file_exists('UploadedImages/student/'.$s->photo) AND !empty($s->photo)) {
                unlink('UploadedImages/student/'.$s->photo);
            }
            try{
                $s->delete();
                session()->flash('success', 'موفقانه حذف شد');
                return back();
            }
            catch(\Exception $e){
                $bug = $e->errorInfo[1];
                session()->flash('failed', 'حذف نشد لطفا دوباره کوشش کنید');
                return back();
            }

        }
    }



}
