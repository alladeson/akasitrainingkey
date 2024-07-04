<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Akasi Learning Key - @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset_own('front/img/customized/favicon.png') }}">
    <!-- CSS here -->


    @yield('third_party_stylesheets')

    @yield('loader_stylesheets')

    @stack('page_css')
    <style>
        /**
            Set the margins of the page to 0, so the footer and the header
            can be of the full height and width !
         **/
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }
        body {
            font-family: "Nunito Sans", sans-serif;
            font-size: 16px;
            font-weight: normal;
            color: #575757;
            line-height: 26px;
        }

        /** Define the header rules **/
        .header {
            position: fixed;
            top: 0cm;
            left: 2cm;
            right: 2cm;
            height: 3cm;
        }

        /** Define the footer rules **/
        .footer {
            position: fixed;
            bottom: 0cm;
            left: 2cm;
            right: 2cm;
            height: 2cm;
            text-align: right;
        }
        .pagenum:before {
            content: counter(page);
        }
    </style>

</head>

<body>

    <div class="header">
        {{-- Page <span class="pagenum"></span> --}}
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('front/img/customized/logo/alek-logo-pdf.png'))) }}"/>
    </div>
    <div class="footer">
        <hr>
        Page <span class="pagenum"></span>
    </div>


    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

    <main>
        @yield('main')
    </main>


    <!-- JS here -->

    @yield('third_party_scripts')
    @stack('page_scripts')
</body>

</html>
