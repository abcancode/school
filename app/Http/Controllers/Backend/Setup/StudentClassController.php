<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function ViewStudent(){
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }
    
    public function CreateStudentClass() {
       return view('backend.setup.student_class.create_class');         
    }

    public function SaveStudentClass(Request $request){
            $validatedData = $request->validate([
            'name' => 'required|unique:student_classes', 
            ]);          

            $data = new StudentClass();
            $data->name = $request->name;
            $data->save();

            
        $notification = array(
            'message' => 'New Student Class Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function EditStudentClass($id){
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class', compact('editData'));
    }

    public function UpdateStudentClass(Request $request, $id){
        $data = StudentClass::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name,'.$data->id 
            ]);          

            $data->name = $request->name;
            $data->save();

            
        $notification = array(
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function DeleteStudentClass($id){
        $user = StudentClass::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.class.view')->with($notification);
    }
}
