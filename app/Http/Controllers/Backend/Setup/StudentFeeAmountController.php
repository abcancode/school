<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\StudentFeeCategory;
use App\Models\StudentFeeAmount;

class StudentFeeAmountController extends Controller
{
    public function ViewFeeAmount(){
        // $data['allData'] = StudentFeeAmount::all();
        $data['allData'] = StudentFeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.student_fee_amount.view_fee_amount', $data);
    }

    public function CreateFeeAmount(){
        $data['fee_categories'] = StudentFeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.student_fee_amount.create_fee_amount', $data);
    }

    public function SaveFeeAmount(Request $request){
        $countClass = count($request->class_id);
        if ($countClass != NULL) {
            for ($i=0; $i < $countClass; $i++) { 
                $fee_amount = new StudentFeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }
        $notification = array(
            'message' => 'Fee Amount Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.fee_amount.view')->with($notification);
    }

    public function EditFeeAmount($fee_category_id){
        $data['editData'] = StudentFeeAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        //dd($data['editData']->toArray());
        $data['fee_categories'] = StudentFeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.student_fee_amount.edit_fee_amount', $data);
    }

    public function UpdateFeeAmount(Request $request, $fee_category_id){
        if ($request->class_id == NULL) {
            $notification = array(
                'message' => 'Sorry, no class fee amount is selected.',
                'alert-type' => 'error'
            );
    
            return redirect()->route('edit.student.fee_amount', $fee_category_id)->with($notification);
        }else {
            $countClass = count($request->class_id);
            StudentFeeAmount::where('fee_category_id', $fee_category_id)->delete();
                for ($i=0; $i < $countClass; $i++) { 
                    $fee_amount = new StudentFeeAmount();
                    $fee_amount->fee_category_id = $request->fee_category_id;
                    $fee_amount->class_id = $request->class_id[$i];
                    $fee_amount->amount = $request->amount[$i];
                    $fee_amount->save();
                }
        }

        $notification = array(
            'message' => 'Data Updated Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.fee_amount.view')->with($notification);

    }

    public function FeeAmountDetails($fee_category_id){
        $data['detailsData'] = StudentFeeAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        
        return view('backend.setup.student_fee_amount.details_fee_amount', $data);
    }
   
    //ToDo: Implement Delete Function
}
