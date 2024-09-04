<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    //retrieve all students
    public function index()
    {
        $students = StudentModel::all();

       if($students->isEmpty()){

        $response = [
            'status' => false,
            'message' => 'No data available',
            'data' => []
        ];

        return response()->json($response,404);
       };

       $total = StudentModel::all()->count(); //fetch total number of data in the table
        return response()->json([
            'status' => true,
            'message' => 'Customers retrieved successfully',
            'total_data'=>$total,
            'data' => $students
        ], 200);
    }


    //create the students
    public function store(Request $request)
    {
         // Validate the incoming request data
         $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'age' => 'required|integer|min:4',
            'address' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:students_info,email',
        ]);

         // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation Error",
                "errors" => $validator->errors()
            ], 422); // 422 Unprocessable Entity status code
        }

        // Create a new student record
        $student = StudentModel::create($validator->validated());


        // Return a success response
        $response = [
            "status" => true,
            "message" => "Student Created Successfully.",
            "data" => $student
        ];
        return response()->json($response,201);
    }



    //to show specific id data
    public function show($id){

        if (!is_numeric($id)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid ID format. ID must be numeric.',
                'data' => []
            ], 400); // 400 Bad Request for invalid input
        }
            $student =StudentModel::find($id);

            if($student){
                return response()->json([
                    'status' => true,
                    'message' => 'Student found successfully',
                    'data' => $student
                ], 200);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "No data found for Id: {$id}",
                    'data' => []
                ], 200);
            }
       
    }


     //to delete specific id data
     public function destroy($id){

        if (!is_numeric($id)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid ID format. ID must be numeric.',
                'data' => []
            ], 400); // 400 Bad Request for invalid input
        }
            $studentinfo =StudentModel::find($id);
            $student =StudentModel::destroy($id);

            if($student){
                return response()->json([
                    'status' => true,
                    'message' => 'Student deleted successfully',
                    'data' => $studentinfo
                ], 200);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "No data found for Id: {$id}",
                    'data' => []
                ], 200);
            }
    }

    public function update(Request $request, $id){
        if (!is_numeric($id)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid ID format. ID must be numeric.',
                'data' => []
            ], 400); // 400 Bad Request for invalid input
        }

        $student =StudentModel::find($id);

        if(!$student){
            return response()->json([
                'status' => false,
                'message' => "No data found for Id: {$id}",
                'data' => []
            ], 200);
         
        }else{
             // Validate the incoming request data
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|min:3|max:255',
                'age' => 'required|integer|min:4',
                'address' => 'required|string|min:3|max:255',
                'email' => 'required|email|unique:students_info,email',
            ]);

         // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    "status" => false,
                    "message" => "Validation Error",
                    "errors" => $validator->errors()
                ], 422); // 422 Unprocessable Entity status code
            }

                $student->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Student updated successfully',
                    'data' => $student
                ], 200);
        }

         // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation Error",
                "errors" => $validator->errors()
            ], 422); // 422 Unprocessable Entity status code
        }

    }
}


