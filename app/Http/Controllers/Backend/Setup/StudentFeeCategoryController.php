<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentFeeCategory;

class StudentFeeCategoryController extends Controller
{
    public function ViewFeeCategory(){
        $data['allData'] = StudentFeeCategory::all();
        return view('backend.setup.student_fee_cat.view_fee_cat', $data);
    }
    
    public function CreateStudentFeeCategory() {
       return view('backend.setup.student_fee_cat.create_fee_cat');         
    }

    public function SaveStudentFeeCategory(Request $request){
            $validatedData = $request->validate([
            'name' => 'required|unique:student_fee_categories', 
            ]);          

            $data = new StudentFeeCategory();
            $data->name = $request->name;
            $data->save();

            
        $notification = array(
            'message' => 'New Fee Category Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.fee_cat.view')->with($notification);
    }

    public function EditStudentFeeCategory($id){
        $editData = StudentFeeCategory::find($id);
        return view('backend.setup.student_fee_cat.edit_fee_cat', compact('editData'));
    }

    public function UpdateStudentFeeCategory(Request $request, $id){
        $data = StudentFeeCategory::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_fee_categories,name,'.$data->id 
            ]);          

            $data->name = $request->name;
            $data->save();

            
        $notification = array(
            'message' => 'Student Fee Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.fee_cat.view')->with($notification);
    }

    public function DeleteStudentFeeCategory($id){
        $user = StudentFeeCategory::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Fee Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.fee_cat.view')->with($notification);
    }
}
