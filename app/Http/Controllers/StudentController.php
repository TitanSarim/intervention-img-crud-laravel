<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required',
            'student_img' => 'required|mimes:jpg,jepg,png,svg|max:1048|image',
        ]);

        if ($request->hasFile('student_img')) {
            $image_name = date('YmdHis').'.'.$request->file('student_img')->extension();
            Image::make($request->file('student_img'))->resize(200, 200)->save(public_path('/uploads/').$image_name);
        }

        $student = new Student();
        $student->student_name = $request->student_name;
        $student->student_img = $image_name;
        $student->save();

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'student_name' => 'required',
        ]);

        

        if ($request->hasFile('student_img')) {

            if (file_exists(public_path('/uploads/').$student->student_img)) {
                unlink(public_path('/uploads/').$student->student_img);
            }

            $request->validate([
                'student_img' => 'required|mimes:jpg,jepg,png,svg|max:1048|image',
            ]);

            // todo to insert watermark => ->insert->('directory_name/image_name.png', 'bottom')
            $image_name = date('YmdHis').'.'.$request->file('student_img')->extension();
            Image::make($request->file('student_img'))->resize(200, 200)->save(public_path('/uploads/').$image_name);

            $student->student_img = $image_name;
        }

        $student->student_name = $request->student_name;
        
        $student->update();

        return redirect()->route('student.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student  = Student::findOrFail($id);

        if (file_exists(public_path('/uploads/').$student->student_img)) {
            unlink(public_path('/uploads/').$student->student_img);
        }

        $student->delete();

        return redirect()->route('student.index');
    }
}
