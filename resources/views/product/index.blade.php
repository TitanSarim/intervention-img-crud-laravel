@extends('layouts.master')

@section('content')

<div class="container">
    
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Product Image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Prodct Price (Rs)<th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)

            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    <img src="{{ url('/uploads', $product->product_image) }}" alt="{{ $product->id }}" width="60px">
                </td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_price }}</td>
                <td>
                    <a href="{{ route('image.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('image.destroy', $product->id) }}" method="POST">
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