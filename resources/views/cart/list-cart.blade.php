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
                    <td style="display: flex ; padding: 47px 0">
                        <select name="id_type_details" class="form-control" id="exampleFormControlSelect1">
                            <option>-size-</option>
                        </select>
                        <select name="id_type_details" class="form-control" id="exampleFormControlSelect1">
                            <option>-color-</option>
                        </select>
                    </td>
                    <td class="p-price first-row">{{number_format($sp['productInfo']->price - $sp['productInfo']->price * $sp['productInfo']->sale / 100)}}đ</td>
                    <td class="qua-col first-row">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" id="quantity-iteam-{{$sp['productInfo']->id}}"  value="{{$sp['quantity']}}">
                            </div>
                        </div>
                    </td>
                    <td class="total-price first-row">{{number_format($sp['price'])}}</td>
                    <td class="close-td first-row" onclick="SaveListCart({{$sp['productInfo']->id}})" ><i class="ti-save"></i></td>
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
                <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
            </div>
        </div>
    </div>
@endif
