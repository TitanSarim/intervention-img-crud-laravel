@extends('layouts.master')


@section('content')

    <div class="container">

        <div class="row">
            <div class="col-lg-8">

                <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    
                    <div class="form-group" >
                      <label for="exampleInputEmail1">Student Name</label>
                      <input type="text" class="form-control" id="student_name" name="student_name" title="Student Name" placeholder="Enter Name" required>
                        @error('student_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                      
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student Image</label>
                        <input type="file" class="form-control" id="student_name" name="student_img" title="Student Image" placeholder="Select Image" required>
                        @error('student_img')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>
        </div>

    </div>
    
@endsection