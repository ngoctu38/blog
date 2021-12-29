@if(session('cart') != null)
    <div class="cart-table">
        <table>
            <thead>
            <tr>
                <th>Image</th>
                <th class="p-name">Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Save</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach(session('cart')->products as $sp)
                <tr>
                    <td class="cart-pic first-row"><img src="images/{{$sp['productInfo']->avatar}}" alt=""></td>
                    <td class="cart-title first-row">
                        <h5>{{$sp['productInfo']->name}}</h5>
                    </td>
                    <td class="p-price first-row">{{number_format($sp['productInfo']->price - $sp['productInfo']->price * $sp['productInfo']->sale / 100)}}đ</td>
                    <td class="qua-col first-row">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" id="quantity-item-{{$sp['productInfo']->id}}"  value="{{$sp['quantity']}}">
                            </div>
                        </div>
                    </td>
                    <td class="total-price first-row">{{number_format($sp['price'])}}</td>
                    <td class="close-td first-row" data-id="{{$sp['productInfo']->id}}" onclick="SaveList({{$sp['productInfo']->id}})" id="save-cart-item{{$sp['productInfo']->id}}"><i class="ti-save"></i></td>
                    <td class="close-td first-row"  onclick="DeleteList({{$sp['productInfo']->id}})"><i class="ti-close"></i></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-4 offset-lg-8">
            <div class="proceed-checkout">
                <ul>
                    <li class="cart-total">Total <span>{{number_format(session('cart')->totalPrice)}}đ</span></li>
                </ul>
                <div id="paypal-button"></div>
                <button type="button"   data-bs-toggle="modal" data-bs-target="#exampleModal" class="proceed-btn" style="width: 100%">PROCEED TO CHECK OUT</button>
            </div>
        </div>
    </div>
    <script>
        var proQty = $('.pro-qty');
        proQty.prepend('<span class="dec qtybtn">-</span>');
        proQty.append('<span class="inc qtybtn">+</span>');
        proQty.on('click', '.qtybtn', function () {
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent().find('input').val(newVal);
        });
    </script>
@endif
