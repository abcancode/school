<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function ViewYear(){
        $data['allData'] = StudentYear::all();
        return view('backend.setup.student_year.view_year', $data);
    }
    
    public function CreateStudentYear() {
       return view('backend.setup.student_year.create_year');         
    }

    public function SaveStudentYear(Request $request){
            $validatedData = $request->validate([
            'name' => 'required|unique:student_years', 
            ]);          

            $data = new StudentYear();
            $data->name = $request->name;
            $data->save();

            
        $notification = array(
            'message' => 'New Student Year Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function EditStudentYear($id){
        $editData = StudentYear::find($id);
        return view('backend.setup.student_year.edit_year', compact('editData'));
    }

    public function UpdateStudentYear(Request $request, $id){
        $data = StudentYear::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name,'.$data->id 
            ]);          

            $data->name = $request->name;
            $data->save();

            
        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function DeleteStudentYear($id){
        $user = StudentYear::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Year Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.year.view')->with($notification);
    }
}