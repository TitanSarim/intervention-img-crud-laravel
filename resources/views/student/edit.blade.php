@extends('layouts.master')


@section('content')

    <div class="container">

        <div class="row">
            <div class="col-lg-8">

                <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    
                    <div class="form-group" >
                      <label for="exampleInputEmail1">student</label>
                      <input type="text" class="form-control" id="name" name="student_name" value="{{ $student->student_name }}" title="Student Name" placeholder="Enter Name" required>
                        @error('student_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <img src="{{ url('/uploads', $student->student_img) }}" alt="{{ $student->id }}" width="70px">
                    </div>
                      
                    <div class="form-group">
                        <label for="exampleInputEmail1">student Image</label>
                        <input type="file" class="form-control" id="image" name="student_img" title="student Image" placeholder="Select Image" required>
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