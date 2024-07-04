@section('third_party_stylesheets')
    <style>
        .loading-image {
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 10;
        }
        .loader
        {
            display: none;
            width:200px;
            height: 200px;
            position: fixed;
            top: 50%;
            left: 50%;
            text-align:center;
            margin-left: -50px;
            margin-top: -100px;
            z-index:2;
            overflow: auto;
        }
    </style>
@endsection

<div class="loader" id="loader">
    <center>
        <img class="loading-image" src="{{ asset_own('front/img/logo/preloader.svg') }}" alt="loading..">
    </center>
</div>
