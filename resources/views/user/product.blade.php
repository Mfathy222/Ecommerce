
<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                    <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input type="search" name="search" class=" form-control" >
                        <input type="submit"  class="btn btn-primary" value="search" >
                    </form>
                </div>
            </div>
          @foreach ($products as  $product)
          <div class="col-md-4">
            <div class="product-item">
                <a href="#"><img src="{{asset("storage/$product->image")}}" class=" w-100 max-h-32" alt="" ></a>
                <div class="down-content">
                    <a href="#">
                        <h4>{{$product->title}}</h4>
                    </a>
                    <h6>{{$product->price}}</h6>
                    <p>{{$product->description}}</p>
                    <ul class="stars">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>quantity ({{$product->quantity}})</span>
                </div>
            </div>
        </div>
        @endforeach

        @if (method_exists($products,'linkS'))
        <div class="d-flex justify-content-center mx-auto">

            {{$products->links()}}
        </div>
        @endif

        </div>
    </div>
</div>
