<td class="product-name">
        <a class="course-title" href="{{route('course', ['url_tag' => $order->course_url_tag])}}">{{$order->course_name_en}}</a>
        <br>
        <i class="flaticon-calendar schedule-icon"></i> <small><strong class="primary-color">
            @if ($order->started_date != $order->end_date)
                {{ date('M d, Y', strtotime("$order->started_date")) }} - {{ date('M d, Y', strtotime("$order->end_date")) }}
            @else
                {{ date('M d, Y', strtotime("$order->started_date")) }}
            @endif
        </strong></small>
        <br>
        <i class="flaticon-clock-1 schedule-icon"></i>
        <small>
            {{ date('h:i A', strtotime("$order->started_time")) }} - {{ date('h:i A e', strtotime("$order->end_time")) }}
        </small>
        <br>
        <i class="flaticon-pin schedule-icon"></i><small>{{ $order->{'location_'.app()->getLocale()} }}</small>

</td>
<td class="product-price"><span class="amount">{{format_amount($order->amount_euro)}}</span></td>
<td class="product-quantity text-center">
    <div class="product-quantity mt-10 mb-10">
        <div class="product-quantity-form">
            <form action="#">
                <button class="cart-minus cart-page-minus"><i class="far fa-minus"></i></button>
                <input class="cart-input cart-page-input" type="text" pattern="[0-9]+" value="{{$order->quantity}}" data-order-id="{{$order->id}}">
                <button class="cart-plus cart-page-plus"><i class="far fa-plus"></i></button>
            </form>
        </div>
    </div>
</td>
<td class="product-subtotal"><span class="amount">{{ format_amount($order->amount_total_euro) }}</span></td>
<td class="product-remove"><a href="javascript:void(0);" class="cart__del cart-page-del" data-order-id="{{$order->id}}"><i class="fa fa-times"></i></a></td>

