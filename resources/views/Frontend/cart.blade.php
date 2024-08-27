@extends("layouts.FrontendLay")
@section("missing")
    <main class="main-wrapper">

        <!-- Start Cart Area  -->
        <div class="axil-product-cart-area axil-section-gap">
            <div class="container">
                <form action="{{ route("cart.update") }}" method="POST">
                    @csrf
                    @method("PUT")
                <div class="axil-product-cart-wrap">
                    <div class="product-table-heading">
                        <h4 class="title">Your Cart</h4>
                        <a href="cart.html#" class="cart-clear">Clear Shoping Cart</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table axil-product-table axil-cart-table mb--40">
                            <thead>
                                <tr>
                                    <th scope="col" class="product-remove"></th>
                                    <th scope="col" class="product-thumbnail">Product</th>
                                    <th scope="col" class="product-title"></th>
                                    <th scope="col" class="product-price">Price</th>
                                    <th scope="col" class="product-quantity">Quantity</th>
                                    <th scope="col" class="product-subtotal">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total=0;
                                @endphp
                                  @foreach ($carts as $cart)
                                <tr>
                                    <td class="product-remove"><a href="{{ route("cart.delete",$cart->id) }}" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                    <td class="product-thumbnail">
                                        <a href="{{ route("product.show",$cart->product->slug) }}"><img
                                            src="{{ asset("storage/".$cart->product->featured_img) }}" alt="Digital Product"></a></td>
                                    <td class="product-title"><a href="{{ route("product.show",$cart->product->slug) }}">{{ $cart->product->title }}</a></td>
                                    <td class="product-price" data-title="Price">{{ $cart->product->selling_price ??  $cart->product->price}}<span class="currency-symbol">TK</span></td>
                                    <td class="product-quantity" data-title="Qty">
                                        <div class="pro-qty">
                                            <input type="number" class="quantity-input" value="{{ $cart->qty }}" name="qty[{{ $cart->product->id }}]">
                                        </div>
                                    </td>
                                    <td class="product-subtotal" data-title="Subtotal">{{ ($cart->product->selling_price ??  $cart->product->price) * $cart->qty }}<span class="currency-symbol">TK</span></td>
                                </tr>
                                @php
                                    $total+=($cart->product->selling_price ??  $cart->product->price) * $cart->qty
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <h4>total price</h4>
                                    </td><td align="right">
                                        <h4>{{ $total }}TK</h4>
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>{{--<div class="input-group product-cupon">
                            <input placeholder="Enter coupon code" type="text">
                            <div class="product-cupon-btn">
                                <button type="submit" class="axil-btn btn-outline">Apply</button>
                            </div>
                        </div>
                        --}}<div class="update-btn">
                            <a href="{{ route("order.checkout") }}" class="axil-btn btn-outline">proceed to check</a>
                            <button style="display:inline-block;width:fit-content;" class="axil-btn btn-outline">Update Cart</button>
                        </div>{{--<div class="row">
                        <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                            <div class="axil-order-summery mt--80">
                                <h5 class="title mb--20">Order Summary</h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table mb--30">
                                        <tbody>
                                            <tr class="order-subtotal">
                                                <td>Subtotal</td>
                                                <td>$117.00</td>
                                            </tr>
                                            <tr class="order-shipping">
                                                <td>Shipping</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="radio" id="radio1" name="shipping" checked>
                                                        <label for="radio1">Free Shippping</label>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="radio" id="radio2" name="shipping">
                                                        <label for="radio2">Local: $35.00</label>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="radio" id="radio3" name="shipping">
                                                        <label for="radio3">Flat rate: $12.00</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="order-tax">
                                                <td>State Tax</td>
                                                <td>$8.00</td>
                                            </tr>
                                            <tr class="order-total">
                                                <td>Total</td>
                                                <td class="order-total-amount">$125.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="checkout.html" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</a>
                            </div>
                        </div>
                    </div>
                    --}}
                </div>
            </form>
            </div>
        </div>
        <!-- End Cart Area  -->

    </main>
@endsection



