<li>
    <div class="cartmini__content">
        <h5><a href="{{route('course', ['url_tag' => $order->course_url_tag])}}">{{$order->course_name_en}}</a></h5>
        <div class="event-detalis d-flex align-items-center">
            <div class="event-time d-flex align-items-center">
                <i class="flaticon-calendar schedule-icon"></i> <small><strong class="primary-color">
                    @if ($order->started_date != $order->end_date)
                        {{ date('M d, Y', strtotime("$order->started_date")) }} - {{ date('M d, Y', strtotime("$order->end_date")) }}
                    @else
                        {{ date('M d, Y', strtotime("$order->started_date")) }}
                    @endif
                </strong></small>
            </div>
            <div class="event-time d-flex align-items-center">
                <i class="flaticon-clock-1 schedule-icon"></i>
                <small>
                    {{ date('h:i A', strtotime("$order->started_time")) }} - {{ date('h:i A e', strtotime("$order->end_time")) }}
                </small>
            </div>
            <div class="event-location d-flex align-items-centere">
                <i class="flaticon-pin schedule-icon"></i><small>{{ $order->{'location_'.app()->getLocale()} }}</small>
            </div>
        </div>
        <div class="product-quantity mt-10 mb-10">
            <span class="cart-minus cart-mini-minus">-</span>
            <input class="cart-input cart-mini-input" type="text" pattern="[0-9]+" value="{{$order->quantity}}" data-order-id="{{$order->id}}">
            <span class="cart-plus cart-mini-plus">+</span>
        </div>
        <div class="product__sm-price-wrapper">
            <span class="product__sm-price">{{ format_amount($order->amount_total_euro) }}</span>
        </div>
    </div>
    <a href="javascript:void(0);" class="cartmini__del cart-mini-del" data-order-id="{{$order->id}}"><i class="fal fa-times"></i></a>
</li>
