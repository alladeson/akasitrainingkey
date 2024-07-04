<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>invoice - Akasi Learning Key</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        body {
            /* margin: 20px; */
            /* background-color: #eee; */
            font-family: "Nunito Sans", sans-serif;
            font-size: 16px;
            font-weight: normal;
            /* color: #575757; */
            line-height: 20px;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .card {
            /* padding: 20px; */
            /* position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box; */
            /* border: 0 solid rgba(0, 0, 0, .125);
            border-radius: 1rem; */
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            vertical-align: top;
            border-color: #dee2e6;
        }

        .table th {
            text-align: left;
        }
        .table td {
            text-align: left;
            border-bottom: #e0d6d6 1px solid;
        }

        .table thead {
            text-align: left;
            border-bottom: #212529 1px solid;
        }

        .text-end {
            text-align: right!important;
        }
        .border-0 {
            border: none!important;
        }

        table {
            caption-side: bottom;
            /* border: #eee 1px solid; */
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('front/img/customized/logo/alek-logo.png'))) }}" class="" style="float: right;" alt="logo">
                            <div class="">
                                <h2 class="mb-1 ">Invoice</h2>
                            </div>
                            <div class="">
                                <p class="" style="font-weight: bold; margin-bottom: 0px;">
                                    <span style="display: inline-flex; width: 130px;">Invoice number</span>
                                    <span style="display: inline-flex; width: 260px;">{{$invoice_number}}</span>
                                </p>
                                <p class="" style="margin: 5px 0 0 0;">
                                    <span style="display: inline-flex; width: 130px;">Date of issue</span>
                                    <span style="display: inline-flex; width: 260px;">{{$date}}</span>
                                </p>
                                <p class="" style="margin: 5px 0 0 0;">
                                    <span style="display: inline-flex; width: 130px;">Date due</span>
                                    <span style="display: inline-flex; width: 260px;">{{$date}}</span>
                                </p>
                            </div>
                        </div>
                        <hr class="" style="margin: 15px 0 0px 0; opacity: 0.5;">
                        <table class="row" style="width:100%">
                            <tr>
                                <td class="" style="width: 50%; vertical-align: top;">
                                    <div class=" text-sm-start">
                                        <div>
                                            <h3 class="font-size-15 mb-1" style="margin-bottom: -11px;">Akasi Learning Key</h3>
                                            <p>1045 Elm St Suite 204 <br>
                                                Manchester, NH 03101 <br>
                                                United States <br>
                                                <a href="mailto:akasi-commercial@akasigroup.com" class="" style="text-decoration: none; color: inherit;">akasi-commercial@akasigroup.com</a>
                                                <br>
                                                <a href="tel:(603)8527935" class="" style="text-decoration: none; color: inherit;">(603) 852 79 35</a>
                                            </p>
                                            <p></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="" style="width: 50%; vertical-align: top;">
                                    <div class="">
                                        <h3 class="font-size-16 mb-3">Billed To:</h3>
                                        <h4 class="font-size-15 mb-2" style="margin: 5px 0 0 0;">{{$user_name}}</h4>
                                        <p class="mb-1" style="margin: 5px 0 0 0;">{{$user_email}}</p>
                                        <p class="mb-1" style="margin: 5px 0 0 0;">{{$user_address}}</p>
                                        <p style="margin: 5px 0 0 0;">{{$user_phone}}</p>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <div class="py-2" style="padding: 0px 0 0px 0;">
                            <h3 class="font-size-15" style="font-size: 24px; margin: 5px 0px;">{{ $total_amount }} due {{$date}}</h3>
                            <p style="margin-bottom: 20px;">
                                <a href="{{route('cart.show').'#cart-page-checkout-section'}}" style="font-size: larger;">Pay online</a>
                            </p>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr style="">
                                            {{-- <th style="width: 70px;">No.</th> --}}
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th style="text-align:center;">Qty</th>
                                            <th class="text-end" style="width: 120px;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                {{-- <th scope="row">01</th> --}}
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14 mb-1" style="margin: 5px 0 0px 0;">
                                                            {{ $order->course_name_en }}
                                                        </h5>
                                                        <p class=" mb-0" style="margin: 0px 0 0px 0;">
                                                            @if ($order->started_date != $order->end_date)
                                                                {{ date('M d, Y', strtotime("$order->started_date")) }} - {{ date('M d, Y', strtotime("$order->end_date")) }}
                                                            @else
                                                                {{ date('M d, Y', strtotime("$order->started_date")) }}
                                                            @endif
                                                        </p>
                                                        <p class=" mb-0" style="margin: 0px 0 0px 0;">
                                                            {{ date('h:i A', strtotime("$order->started_time")) }}
                                                            -
                                                            {{ date('h:i A e', strtotime("$order->end_time")) }}
                                                        </p>
                                                        <p class=" mb-0" style="margin: 0px 0 10px 0;">{{ $order->{'location_en'} }} on site</p>
                                                    </div>
                                                </td>
                                                <td style="max-width:100%; white-space:nowrap;">{{ format_amount($order->amount_euro, true) }}</td>
                                                <td style="max-width:100%; white-space:nowrap; text-align:center;">{{ $order->quantity }}</td>
                                                <td class="text-end" style="max-width:100%; white-space:nowrap;">{{ format_amount($order->amount_total_euro, true) }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th scope="row" colspan="3" class="border-0 text-end" style="padding-top: 15px;">Sub Total :</th>
                                            <td colspan="1" style="max-width:100%; white-space:nowrap;" class="border-0 text-end" style="padding-top: 15px;">{{ $total_amount }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row" colspan="3" class="border-0 text-end">
                                                Total :</th>
                                            <td colspan="1" style="max-width:100%; white-space:nowrap;" class="border-0 text-end">{{ $total_amount }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row" colspan="3" class="border-0 text-end">Amount due :</th>
                                            <td colspan="1" style="max-width:100%; white-space:nowrap;" class="border-0 text-end">
                                                <h4 class="m-0 fw-semibold" style="margin: 0px 0px;">{{ $total_amount }}</h4>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
