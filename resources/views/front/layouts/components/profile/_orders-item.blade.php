<td class="product-name">
    <a class="course-title" href="{{route('course', ['url_tag' => $order->course_url_tag])}}">{{$order->course_name_en}}</a>
    <br>
    <i class="flaticon-calendar schedule-icon"></i> <small><strong class="primary-color">
        {{ date('M d, Y', strtotime("$order->started_date")) }} - {{ date('M d, Y', strtotime("$order->end_date")) }}
    </strong></small>
    <br>
    <i class="flaticon-clock-1 schedule-icon"></i>
    <small>
        {{ date('h:i A', strtotime("$order->started_time")) }} - {{ date('h:i A e', strtotime("$order->end_time")) }}
    </small>
    <br>
    <i class="flaticon-pin schedule-icon"></i><small>{{ $order->{'location_'.app()->getLocale()} }}</small>

</td>
<td class="product-quantity text-center">{{$order->course_code}}</td>
<td class="product-price"><span class="amount">{{ date('F d, Y h:i:s A e', strtotime("$order->payment_date")) }}</span></td>
<td class="product-quantity text-center">{{$order->quantity}}</td>
<td class="product-subtotal"><span class="amount">{{ format_amount($order->amount_total_euro) }}</span></td>

