<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function ViewGroup(){
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.student_group.view_group', $data);
    }
    
    public function CreateStudentGroup() {
       return view('backend.setup.student_group.create_group');         
    }

    public function SaveStudentGroup(Request $request){
            $validatedData = $request->validate([
            'name' => 'required|unique:student_classes', 
            ]);          

            $data = new StudentGroup();
            $data->name = $request->name;
            $data->save();

            
        $notification = array(
            'message' => 'New Student Group Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function EditStudentGroup($id){
        $editData = StudentGroup::find($id);
        return view('backend.setup.student_group.edit_group', compact('editData'));
    }

    public function UpdateStudentGroup(Request $request, $id){
        $data = StudentGroup::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name,'.$data->id 
            ]);          

            $data->name = $request->name;
            $data->save();

            
        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function DeleteStudentGroup($id){
        $user = StudentGroup::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.group.view')->with($notification);
    }
}
