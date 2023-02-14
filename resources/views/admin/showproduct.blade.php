<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css');
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
@include('admin.sidebar');
      <!-- partial -->
      @include('admin.nav');
        <!-- partial -->
        <div class=" container-fluid bg-body-wrapper">

            <div class=" d-flex flex-column align-items-center w-75 mx-auto mt-10 text-light">
                @if (session()->has('success'))
                <strong class="text-light mt-5" > {{session()->get('success')}}</strong>


                @endif
                <table class="table table-bordered border-primary mt-5">
                    <thead >
                        <th class="text-light">Title</th>
                        <th class="text-light">Price</th>
                        <th class="text-light">description</th>
                        <th class="text-light">Quantity</th>
                        <th class="text-light">image</th>
                        <th class="text-light">Delete</th>
                        <th class="text-light">Update</th>

                    </thead>
                    <tbody class="text-light">
                        @foreach ($products as $product)

                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->quantity}}</td>
                            <td><img class="w-100 h-16" style=" border-radius: 0% " src="{{asset("storage/$product->image")}}" alt=""></td>
                            <td><a href="{{(url('deleteproduct',$product->id))}}" class=" btn btn-danger">Delete</a> </td>
                            <td> <a href="{{(url('editproduct',$product->id))}}" class=" btn btn-primary">Update</a> </td>
                        </tr>
                        @endforeach
                    </tbody>



                  </table>
            </div>
        </div>
    <!-- plugins:js -->
    @include('admin.script');
    <!-- End custom js for this page -->
  </body>
</html>
