
@extends('backend.master')
@section('main_content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Product</h3></div>
                        <div class="card-body">
                            <form method="POST" action="{{Route('products.updateProduct',$product_individual->id)}}" enctype="multipart/form-data">
                                @csrf

                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="pro_name">Product Name</label>
                                    <input class="form-control" id="pro_name" type="text" name="pro_name" placeholder="Product Name" value="{{$product_individual->product_name}}" required/>
                                </div>
                                <!-- description -->
                                <div class="mb-3">
                                    <label for="pro_price">Product description</label>
                                    <textarea class="form-control" id="pro_description" name="pro_description" rows="5">{{$product_individual->product_description}}"</textarea>
                                </div>
                                <!-- price -->
                                <div class="mb-3">
                                    <label for="pro_price">Product Price</label>
                                    <input class="form-control" id="pro_price" type="number" name="pro_price" placeholder="Product Price" value="{{$product_individual->product_price}}" required/>
                                </div>
                                <!-- Image -->
                                <div class="mb-3">
                                    <label for="pro_image">Product Image</label>
                                    <input class="form-control" id="pro_image" type="file" name="pro_image" placeholder="Product Image"  />
                                </div>
                                <!-- status -->
                                <div class=" mb-3">
                                    <label for="cars">Status</label>
                                    <select class="form-control" id="pro_status" name="pro_status" required>
                                        <option value="">---select status---</option>
                                        <option value="1" {{ $product_individual->product_status == 1 ? 'selected' : '' }}>Show</option>
                                        <option value="0" {{ $product_individual->product_status == 0 ? 'selected' : '' }}>Hide</option>
                                    </select>
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Update Product</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
