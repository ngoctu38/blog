@if(session('cart') != null)
<div class="select-items">
    <table>
        <tbody>
        @foreach($newCart->products as $sp)
        <tr>
            <td class="si-pic"><img src="images/{{$sp['productInfo']->avatar}}" alt=""></td>
            <td class="si-text">
                <div class="product-selected">
                    <p>{{number_format($sp['productInfo']->price - $sp['productInfo']->price * $sp['productInfo']->sale / 100)}}đ x {{$sp['quantity']}}</p>
                    <h6>{{$sp['productInfo']->name}}</h6>
                </div>
            </td>
            <td class="si-close">
                <a  onclick="DeleteCart({{$sp['productInfo']->id}})" href="javascript:"><i class="ti-close"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="select-total">
    <span>total:</span>
    <h5>{{number_format($newCart->totalPrice)}}</h5>
    <br>
    <input style="display: none" type="number" id="total-quantity" value="{{$newCart->totalQuantity}}"  >


</div>
@endif
