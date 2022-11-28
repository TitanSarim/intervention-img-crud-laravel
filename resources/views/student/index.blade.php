@extends('layouts.master')

@section('content')

<div class="container">
    
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Student Image</th>
            <th scope="col">Student Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($students as $student)

            <tr>
                <td>{{ $student->id }}</td>
                <td>
                    <img src="{{ url('/uploads', $student->student_img) }}" alt="{{ $student->id }}" width="60px">
                </td>
                <td>{{ $student->student_name }}</td>
                <td>
                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" href="" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
                
            @endforeach
          
        </tbody>

      </table>
      
    
</div>
    
@endsection