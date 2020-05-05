<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentUpdateRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

//Package for datatable
use Yajra\Datatables\Datatables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::debug("Index function");
        return view('students.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {
        Log::debug("datatable function");
        $getdata = [];
        try {
            $getdata =  Student::get();
        } catch (\Throwable $th) {
            report($th);
        }
        return Datatables::of($getdata)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::debug("Crate function");
        return view('students.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        Log::debug("Store function");
        Log::debug("Request Data:");
        Log::debug($request->all());
        Log::debug("=============");
        $input = $request->all();
        try {
            $file_path = 'public/user/'.'/'.$input['name']; //create name of file and path of file
            $file_name = Storage::disk('local')->put($file_path, $input['photo']); // Store image in particular folder
            $input['photo'] = $file_name;
            Students::create($input); // This is only insert data which is added in fillable proparty of Student Model
        } catch (\Throwable $th) {
            report($th);
            return  back()->withInput()->with('error', 'Student not added! please try again after sometime.');
        }
        return redirect('/student')->with('status', 'Student Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit')->with('form', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        Log::debug("Update function");
        Log::debug("Request Data:");
        Log::debug($request->all());
        Log::debug("Student Data:");
        Log::debug($student);
        Log::debug("=============");
        $input = $request->all();

        try {
            //check if new photo uploaded
            if(!empty($input['photo'])){
                Storage::delete($student->photo); // delete old photo
                $file_path = 'public/user/'.'/'.$input['name']; //create name of file and path of file
                $file_name = Storage::disk('local')->put($file_path, $input['photo']); // Store image in particular folder get name
                $input['photo'] = $file_name;
            }
            $student->update($input);
        } catch (\Throwable $th) {
            report($th); // this will also log error data in laravel.log file
            return  back()->withInput()->with('error', 'Student not updated! please try again after sometime.');
        }
        return redirect('/student')->with('status', 'Student Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        try {
            Storage::delete($student->photo);
            $student->delete();
        } catch (\Throwable $th) {
            report($th); // this will also log error data in laravel.log file
            return  response()->json(['message' => 'Student not deleted'],400);
        }
        return  response()->json(['message' => 'Student deleted'],200);

    }
}
