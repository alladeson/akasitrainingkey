@extends('front.layouts.global')

@section('title', 'Contact')

@section('third_party_stylesheets')
    <style>

    </style>
@endsection

@section('main')
  <div class="hero-arera course-item-height" data-background="{{ asset_own('front/img/slider/course-slider.jpg') }}">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="hero-course-1-text">
                     <h2>{{__("contact.key1") }}</h2>
                  </div>
                  <div class="course-title-breadcrumb">
                     <nav>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{route('home')}}">{{__("contact.key2") }}</a></li>
                           <li class="breadcrumb-item"><span>{{__("contact.key3") }}</span></li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- hero-area-end -->


      <!-- contact-area-start -->
      <div class="contact-area pt-120 pb-90">
         <div class="container">
            <div class="row">
               <div class="col-xl-8 col-lg-7 col-md-12">
                  <form id="contact-form" method="POST" action="{{ route('contact.message') }}" onsubmit="contactFormSubmit(event, this)">
                    @csrf
                     <div class="contact-area-wrapper">
                        <div class="section-title mb-50">
                           <h2>{{__("contact.key4") }}</h2>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xl-6">
                           <div class="contact-from-input mb-20">
                              <input type="text" name="name" value="{{$user ? $user->name : ''}}" required placeholder="{{__("contact.key5") }}">
                           </div>
                        </div>
                        <div class="col-xl-6">
                           <div class="contact-from-input mb-20">
                              <input type="text" name="phone" value="{{$profile ? $profile->phone : ''}}" required  placeholder="{{__("contact.key6") }}">
                           </div>
                        </div>
                        <div class="col-xl-6">
                           <div class="contact-from-input mb-20">
                              <input type="text" name="email" value="{{$user ? $user->email : ''}}" required  placeholder="{{__("contact.key7") }}">
                           </div>
                        </div>
                        <div class="col-xl-6">
                           <div class="contact-select">
                              <select class="mb-20" name="course" id="select-box">
                                 <option value=""> {{__("contact.key8") }}</option>
                                 @foreach ($courses as $course)
                                    <option value="{{$course->name_en}}">{{substr($course->name_en, 0, 45) . "..."}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-xl-12">
                           <div class="contact-from-input mb-20">
                              <textarea placeholder="{{__("contact.key9") }}" name="message" required></textarea>
                           </div>
                        </div>
                        <div class="colxl-2 ">
                           <div class="cont-btn mb-20">
                              <button type="submit" class="cont-btn has-spinner" data-btn-text="Submit">{{__("contact.key10") }}</button>
                           </div>
                        </div>
                        <div class="google-map-area contact-map pt-100 mb-30">
                           {{-- <iframe
                              src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d25617.295747478598!2d-73.69385403215021!3d40.752382720949164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1646544470201!5m2!1sen!2sbd"></iframe> --}}
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-xl-4 col-lg-5 col-md-8">
                  <div class="sidebar-widget-wrapper">
                     <div class="support-contact mb-30">
                        <div class="support-tittle">
                           <h4>{{__("contact.key11") }}</h4>
                        </div>
                        <div class="support-contact-inner">
                           <div class="support-item">
                              <div class="support-icon">
                                 <svg id="Layer_6" data-name="Layer 3" xmlns="http://www.w3.org/2000/svg" width="21.375"
                                    height="21.375" viewBox="0 0 21.375 21.375">
                                    <path id="Path_8" data-name="Path 8"
                                       d="M1.688,16.386c.038-.031,4.3-3.085,5.463-2.885.556.1.875.477,1.513,1.238.1.123.35.415.541.624a8.877,8.877,0,0,0,1.176-.479,9.761,9.761,0,0,0,4.5-4.5A8.876,8.876,0,0,0,15.363,9.2c-.209-.192-.5-.439-.628-.544-.756-.634-1.135-.953-1.233-1.51C13.3,6,16.354,1.725,16.386,1.687A1.631,1.631,0,0,1,17.6,1c1.238,0,4.774,4.586,4.774,5.359,0,.045-.065,4.608-5.691,10.331C10.966,22.31,6.4,22.375,6.359,22.375,5.586,22.375,1,18.84,1,17.6A1.629,1.629,0,0,1,1.688,16.386Zm4.75,4.56c.623-.051,4.452-.556,9.239-5.26,4.727-4.813,5.22-8.653,5.269-9.248a19.276,19.276,0,0,0-3.353-3.962c-.028.029-.066.071-.115.127a25.216,25.216,0,0,0-2.546,4.32,8.469,8.469,0,0,0,.724.649,7.149,7.149,0,0,1,1.077,1.013l.173.242-.051.293A8.135,8.135,0,0,1,16.166,11,11.193,11.193,0,0,1,11,16.166a8.115,8.115,0,0,1-1.882.688l-.293.051-.242-.173A7.209,7.209,0,0,1,7.568,15.65c-.223-.266-.522-.622-.634-.722A25.054,25.054,0,0,0,2.6,17.477c-.059.05-.1.088-.128.113a19.259,19.259,0,0,0,3.962,3.354Z"
                                       transform="translate(-1 -1)" fill="#2467ec" />
                                 </svg>
                              </div>
                              <div class="support-info-phone">
                                 <span>{{__("contact.key12") }}</span>
                                 <p>{{__("contact.key3") }}<a href="tel:(603)8527935"> tel:(603)8527935</a></p>
                              </div>
                           </div>
                           <div class="support-item">
                              <div class="support-icon">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="22.57" height="16.271"
                                    viewBox="0 0 22.57 16.271">
                                    <g id="email_3_" data-name="email (3)" transform="translate(-1.25 -4.25)">
                                       <path id="Path_10" data-name="Path 10"
                                          d="M20.933,20.521H4.137A2.9,2.9,0,0,1,1.25,17.634V7.137A2.9,2.9,0,0,1,4.137,4.25h16.8A2.9,2.9,0,0,1,23.82,7.137v10.5A2.9,2.9,0,0,1,20.933,20.521Zm-16.8-14.7A1.312,1.312,0,0,0,2.825,7.137v10.5a1.312,1.312,0,0,0,1.312,1.312h16.8a1.312,1.312,0,0,0,1.312-1.312V7.137a1.312,1.312,0,0,0-1.312-1.312Z"
                                          transform="translate(0 0)" fill="#2467ec" />
                                       <path id="Path_11" data-name="Path 11"
                                          d="M12.534,13.7a3.412,3.412,0,0,1-1.732-.472L1.638,7.778a.8.8,0,0,1-.283-1.05A.777.777,0,0,1,2.4,6.455l9.175,5.438a1.774,1.774,0,0,0,1.848,0L22.6,6.455a.777.777,0,0,1,1.05.273.8.8,0,0,1-.283,1.05l-9.1,5.448a3.412,3.412,0,0,1-1.732.472Z"
                                          transform="translate(0.001 0.105)" fill="#2467ec" />
                                    </g>
                                 </svg>

                              </div>
                              <div class="support-info-email">
                                 <span>{{__("contact.key14") }}</span>
                                 <a href="mailto:Info@example.com">akasi-commercial@akasigroup.com</a>
                              </div>
                           </div>
                           <div class="support-item">
                              <div class="support-icon">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="17.41" height="21.729"
                                    viewBox="0 0 17.41 21.729">
                                    <g id="pin" transform="translate(-50.885)">
                                       <g id="Group_2184" data-name="Group 2184" transform="translate(55.556 4.671)">
                                          <g id="Group_2183" data-name="Group 2183">
                                             <path id="Path_3602" data-name="Path 3602"
                                                d="M164.981,110.062a4.034,4.034,0,1,0,4.034,4.034A4.039,4.039,0,0,0,164.981,110.062Zm0,6.369a2.335,2.335,0,1,1,2.335-2.335A2.338,2.338,0,0,1,164.981,116.431Z"
                                                transform="translate(-160.947 -110.062)" fill="#2467ec" />
                                          </g>
                                       </g>
                                       <g id="Group_2186" data-name="Group 2186" transform="translate(50.885)">
                                          <g id="Group_2185" data-name="Group 2185">
                                             <path id="Path_3603" data-name="Path 3603"
                                                d="M59.59,0a8.715,8.715,0,0,0-8.7,8.7v.241c0,2.428,1.392,5.256,4.137,8.408A35.783,35.783,0,0,0,59.056,21.3l.534.431.534-.431a35.775,35.775,0,0,0,4.035-3.944c2.745-3.151,4.137-5.98,4.137-8.408V8.705A8.715,8.715,0,0,0,59.59,0ZM66.6,8.946c0,4.1-5.286,9.068-7.006,10.576-1.721-1.508-7.006-6.474-7.006-10.576V8.705a7.006,7.006,0,0,1,14.013,0Z"
                                                transform="translate(-50.885)" fill="#2467ec" />
                                          </g>
                                       </g>
                                    </g>
                                 </svg>
                              </div>
                              <div class="support-info-location">
                                 <span>{{__("contact.key15") }}</span>
                                 <a href="#">1045 Elm St Suite 204, Manchester, NH 03101 USA</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
@endsection

@section('third_party_scripts')
    <script>
        function contactFormSubmit(event, form) {
            if (event)
                event.preventDefault();
                //
                $('button.has-spinner').buttonLoader('start');
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                success: function(result) {
                    // Success message
                    var success_message = 'Message sent successfully!';

                    // Show success message
                    Toast.fire({
                        icon: 'success',
                        title: success_message
                    });

                    $('button.has-spinner').buttonLoader('stop');
                    $('button.has-spinner').text('{{__("contact.key10") }}')

                    $(form)[0].reset();

                    setTimeout(function() {
                        location.href = '{{route('contact')}}';
                    }, 3000);

                },
                error: function(error) {
                    // to do with error
                    console.log(error);
                    // Show message error
                    Toast.fire({
                        icon: 'error',
                        title: 'An error occurred while sending the message. Please try again!'
                    });
                    $('button.has-spinner').buttonLoader('stop');
                },
            });
        }
    </script>
@endsection
