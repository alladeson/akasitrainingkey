@extends('front.layouts.global')

@section('title', 'Error 403')

@section('third_party_stylesheets')
    <style>
    </style>
@endsection

@section('main')
    <!-- content-error-area -->
    <div class="content-error-area pt-120 pb-120">
        <div class="container">
           <div class="row justify-content-center">
              <div class="col-xl-8">
                 <div class="content-error-item text-center">
                    <div class="error-thumb">
                       <img src="{{asset_own('front/img/customized/errors/403.png')}}" alt="image not found">
                    </div>
                    <div class="section-title">
                       <h2 class="mb-20">Oops! Restricted Page.</h2>
                       <p>You are not authorized to access this page. Please contact the administrator.</p>
                    </div>
                    <div class="error-btn">
                       <a class="edu-btn" href="{{route('home')}}">Back to homepage</a>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- content-error-end -->
@endsection

@section('third_party_scripts')
    <script>
    </script>
@endsection
