@extends("layouts.FrontendLay")
@section("missing")
    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                            </ul>
                            <h1 class="title">Explore All Products</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="inner">
                            <div class="bradcrumb-thumb">
                                <img src="assets/images/product/product-45.png" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="axil-shop-sidebar">
                            <div class="d-lg-none">
                                <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                            </div>
                            <div class="toggle-list product-categories active">
                                <h6 class="title">CATEGORIES</h6>
                                <div class="shop-submenu">
                                    <ul>
                                        @foreach ($categories as $category)

                                        <li class="current-cat">
                                            <input type="checkbox" value="{{ $category->slug }}" id="category" name="categories">
                                            <label for="category{{$category->id}}">{{str($category->category)->headline()}}</label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            {{--<div class="toggle-list product-categories product-gender active">
                                <h6 class="title">GENDER</h6>
                                <div class="shop-submenu">
                                    <ul>
                                        <li class="chosen"><a href="shop-sidebar.html#">Men (40)</a></li>
                                        <li><a href="shop-sidebar.html#">Women (56)</a></li>
                                        <li><a href="shop-sidebar.html#">Unisex (18)</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="toggle-list product-color active">
                                <h6 class="title">COLORS</h6>
                                <div class="shop-submenu">
                                    <ul>
                                        <li class="chosen"><a href="shop-sidebar.html#" class="color-extra-01"></a></li>
                                        <li><a href="shop-sidebar.html#" class="color-extra-02"></a></li>
                                        <li><a href="shop-sidebar.html#" class="color-extra-03"></a></li>
                                        <li><a href="shop-sidebar.html#" class="color-extra-04"></a></li>
                                        <li><a href="shop-sidebar.html#" class="color-extra-05"></a></li>
                                        <li><a href="shop-sidebar.html#" class="color-extra-06"></a></li>
                                        <li><a href="shop-sidebar.html#" class="color-extra-07"></a></li>
                                        <li><a href="shop-sidebar.html#" class="color-extra-08"></a></li>
                                        <li><a href="shop-sidebar.html#" class="color-extra-09"></a></li>
                                        <li><a href="shop-sidebar.html#" class="color-extra-10"></a></li>
                                        <li><a href="shop-sidebar.html#" class="color-extra-11"></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="toggle-list product-size active">
                                <h6 class="title">SIZE</h6>
                                <div class="shop-submenu">
                                    <ul>
                                        <li class="chosen"><a href="shop-sidebar.html#">XS</a></li>
                                        <li><a href="shop-sidebar.html#">S</a></li>
                                        <li><a href="shop-sidebar.html#">M</a></li>
                                        <li><a href="shop-sidebar.html#">L</a></li>
                                        <li><a href="shop-sidebar.html#">XL</a></li>
                                        <li><a href="shop-sidebar.html#">XXL</a></li>
                                        <li><a href="shop-sidebar.html#">3XL</a></li>
                                        <li><a href="shop-sidebar.html#">4XL</a></li>
                                    </ul>
                                </div>
                            </div>--}}
                            <div class="toggle-list product-price-range active">
                                <h6 class="title">PRICE</h6>
                                <div class="shop-submenu">
                                    {{--<ul>
                                        <li class="chosen"><a href="shop-sidebar.html#">30</a></li>
                                        <li><a href="shop-sidebar.html#">5000</a></li>
                                    </ul>--}}
                                    <form action="shop-sidebar.html#" class="mt--25">
                                        <div id="slider-range"></div>
                                        <div class="flex-center mt--20">
                                            <span class="input-range">Price: </span>
                                            <input type="text" id="amount" class="amount-range" readonly>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <button class="axil-btn btn-bg-primary">All Reset</button>
                        </div>
                        <!-- End .axil-shop-sidebar -->
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="axil-shop-top mb--40">
                                    <div class="category-select align-items-center justify-content-lg-end justify-content-between">
                                        <!-- Start Single Select  -->
                                        <span class="filter-results">Showing 1-12 of 84 results</span>
                                        <select class="single-select" name="sorting">
                                            <option value="created_at.desc">Short by Latest</option>
                                            <option value="created_at.asc">Short by Oldest</option>
                                            <option value="price.asc">Short by Name</option>
                                            <option value="price.desc">Short by Price</option>
                                        </select>
                                        <!-- End Single Select  -->
                                    </div>
                                    <div class="d-lg-none">
                                        <button class="product-filter-mobile filter-toggle"><i class="fas fa-filter"></i> FILTER</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .row -->
                        <div class="row row--15  productArea">

                            @forelse ($products as $product)


                            <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="{{ route("product.show",$product->slug) }}">
                                            @if($product->featured_img)
                                            <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" class="main-img"  src="{{ asset("storage/".$product->featured_img)}}" alt="{{ $product->title }}">
                                            @endif
                                            @if ($product->galleries && count($product->galleries)> 0)
                                            <img class="hover-img" src="{{ asset("storage/".$product->galleries[0]->title)}}" alt="{{ $product->title }}">


                                            @endif
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">{{ ceil((($product->price - $product->selling_price)/$product->price ) * 100) }} % off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="index-1.html#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                <li class="select-option">
                                                    <a href="{{ route("product.show",$product->slug) }}">
                                                        Add to Cart
                                                    </a>
                                                </li>
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <div class="product-rating">
                                                <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                                <span class="rating-number">(64)</span>
                                            </div>
                                            <h5 class="title"><a href="{{ route("product.show",$product->slug) }}">
                                                {{ $product->title }}</a></h5>
                                            <div class="product-price-variant">
                                                @if ($product->selling_price)<span class="price current-price">{{ $product->selling_price }}TK</span>

                                                <span class="price old-price">{{ $product->price }}TK</span>

                                                   @else
                                                   <span class="price current-price">{{ $product->price }}TK</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @empty
                               <h4>no products found</h4>
                            @endforelse

                            <!-- End Single Product  -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="axil-product product-style-one mb--30">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="assets/images/product/electric/product-02.png" alt="Product Images">
                                        </a>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="shop-sidebar.html#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Media remote</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$40</span>
                                                <span class="price old-price">$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="axil-product product-style-one mb--30">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="assets/images/product/electric/product-03.png" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">25% OFF</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="shop-sidebar.html#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">HD camera</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$45</span>
                                                <span class="price old-price">$60</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="axil-product product-style-one mb--30">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="assets/images/product/electric/product-04.png" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">5% OFF</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="shop-sidebar.html#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Guys Bomber Jacket</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$50</span>
                                                <span class="price old-price">$60</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="axil-product product-style-one mb--30">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="assets/images/product/electric/product-05.png" alt="Product Images">
                                        </a>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="shop-sidebar.html#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Level 20 RGB Cherry</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$38</span>
                                                <span class="price old-price">$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--
                            <!-- End Single Product  -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="axil-product product-style-one mb--30">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="assets/images/product/electric/product-06.png" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">5% OFF</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="shop-sidebar.html#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Level 20 RGB Cherry</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$25</span>
                                                <span class="price old-price">$40</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="axil-product product-style-one mb--30">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="assets/images/product/electric/product-07.png" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">15% OFF</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="shop-sidebar.html#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Logitech Streamcam</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$15</span>
                                                <span class="price old-price">$20</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="axil-product product-style-one mb--30">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="assets/images/product/electric/product-08.png" alt="Product Images">
                                        </a>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="shop-sidebar.html#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Bass Meets Clarity</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$60</span>
                                                <span class="price old-price">$80</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="axil-product product-style-one mb--30">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img src="assets/images/product/electric/product-02.png" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">30% OFF</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="shop-sidebar.html#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Media remote</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$40</span>
                                                <span class="price old-price">$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            --}}
                        </div>
                        <div class="text-center pt--20">
                            <a href="shop-sidebar.html#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End Shop Area  -->

    </main>
@endsection
@push("customJs")
    <script>
        const categoryValues=[]
        const priceValue={
            min:0,
            max:99999999999,
        }const orderValue={
            order:"created_at",
            sort:"desc"
        }
        $("input[name="categories"]").change(function()
        {


              if($(this).is(":checked"))
              {categoryValues.push($(this).val())
              }else
              {categoryValues.splice(categoryValues.indexOf($(this).val()),1)
              }
             // console.log(categoryValues);
             getFilteredProduct(categoryValues,priceValue,orderValue)
        })
        $('#slider-range').slider({
            range: true,
            min: 0,
            max: 5000,
            values: [0, 5000],
            change:function(event,ui)
            {priceValue.mini=ui.values[0]
                priceValue.max=ui.values[1]
                getFilteredProduct(categoryValues,priceValue,orderValue)
            },
            slide: function(event, ui) {
               $('#amount').val('TK' + ui.values[0] + '  TK' + ui.values[1]);
            }
        });
         $("select[name="sorting"]").change(function()
            {let value=$(this).val()
                orderValue.order=value.split(".")[0]
                orderValue.sort=value.split(".")[1]
                getFilteredProduct(categoryValues,priceValue,orderValue)
            }
         )

      function getFilteredProduct(category=null,price=null,ordering=null)
      {$.ajax(
        {url:"{{ route("filter.shop") }}",
         method:"get",
         data:
         {categories:category,
            price:price,
            ordering:ordering
         },
         success: function(res)
         {//*pRoducT foReacH/mapconsole.log(res);return false;
            const productLists = []
            res.map(product=>
            {let url="{{ route("product.show","::slug") }}";
            url=url.replace("::slug",product.slug);
            console.log(url);
              let productHtml=`
                          <div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="${url}">

                                            ${product.featured_img ? (`<img   class="main-img" src="{{ asset("storage/")}}/${product.featured_img}" alt="${product.title}" >`
                                            ) : null}{{----}}

                                               ${product.galleries ? (`<img class="hover-img" src="{{ asset("storage/")}}/${product.galleries[0].title}"
                                               alt="${product.title}">`
                                               ) : null}

                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">${Math.ceil(((product.price - product.selling_price)/product.price) * 100)}% off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="index-1.html#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                <li class="select-option">
                                                    <a href="${url}">
                                                        Add to Cart
                                                    </a>
                                                </li>
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <div class="product-rating">
                                                <span class="icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                                <span class="rating-number">(64)</span>
                                            </div>
                                            <h5 class="title"><a href="${url}">
                                                ${product.title}</a></h5>
                                            <div class="product-price-variant">

                                                      ${product.selling_price ? (
                                                        `<span class="price current-price">${product.selling_price }TK</span>

                                                <span class="price old-price">${product.price}TK</span>`
                                                      ) : (
                                                        `<span class="price current-price">${product.price}</span>`
                                                      )}


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
              `
                productLists.push(productHtml)

       })
         $(".productArea").html(productLists)





         }
        })

      }

    </script>
@endpush
