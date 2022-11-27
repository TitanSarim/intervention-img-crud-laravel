@extends('layouts.master')


@section('content')

    <div class="container">

        <div class="row">
            <div class="col-lg-8">

                <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    
                    <div class="form-group" >
                      <label for="exampleInputEmail1">Product</label>
                      <input type="text" class="form-control" id="name" name="product_name" title="Product Name" placeholder="Enter Name" required>
                        @error('product_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Price</label>
                        <input type="text" class="form-control" id="price" name="product_price" title="Product Price" placeholder="Enter Price" required>
                        @error('product_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                      
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Image</label>
                        <input type="file" class="form-control" id="image" name="product_image" title="Product Image" placeholder="Select Image" required>
                        @error('product_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>
        </div>

    </div>
    
@endsection