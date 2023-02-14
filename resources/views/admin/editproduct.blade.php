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


      <div class=" container-fluid bg-body-wrapper">

        <div class=" d-flex flex-column align-items-center w-50 mx-auto mt-10">
            @if (session()->has('success'))
            <strong class="text-light mt-5" > {{session()->get('success')}}</strong>


            @endif
        <h1 class=" my-5 fs-2">edit product</h1>
        <form action="{{url("updateproduct/$products->id")}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{$products->title}}" required class=" w-100 my-2 text-black">
        <input type="number" name="price" value="{{$products->price}}" required class=" w-100 my-2 text-black">
        <input type="text" name="description" value="{{$products->description}}" required class=" w-100 my-2 text-black">
        <input type="text" name="quantity" value="{{$products->quantity}}" required class=" w-100 my-2 text-black">
        <td ><img src="{{asset("storage/$products->image")}}" alt="" class=" w-100"></td>
        <input type="file" name="image"required class=" w-100 my-2 text-black">


        <button type="submit" class=" btn btn-info">edit</button>

        </form>
        </div>
        </div>



    <!-- plugins:js -->
    @include('admin.script');
    <!-- End custom js for this page -->
  </body>
</html>
