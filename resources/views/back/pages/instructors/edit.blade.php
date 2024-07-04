@extends('back.layouts.global')

@section('title', 'Pre-Requisites')

@section('third_party_stylesheets')
    <style>
        .primary-color {
            color: #ff0e0d !important;
        }

        .secondary-color {
            color: #005dae !important;
        }
    </style>
@endsection

@section('main-content')
<div class="container-fluid">
    <div class="row">
      {{-- <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{ asset_own('front/img/customized/profile/user-placeholder.png') }}"
                   alt="User profile picture">
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div> --}}
      <!-- /.col -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
              <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="settings">
                <form method="post" action="{{ route('instructors.update') }}" class="">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label htmlFor="first_name">{{__("profil.key29") }}</label>
                                    <input type="text" class="form-control" placeholder="First Name"
                                        id="first_name" name="first_name"
                                        value="{{ $profile->first_name }}" required autofocus
                                        autocomplete="first_name">
                                    <x-input-error :messages="$errors->get('firs_tname')"
                                        class="text-danger mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label htmlFor="LastName">{{__("profil.key30") }}</label>
                                    <input type="text" class="form-control" placeholder="Last Name"
                                        id="last_name" name="last_name"
                                        value="{{ $profile->last_name }}" required autofocus
                                        autocomplete="last_name">
                                    <x-input-error :messages="$errors->get('last_name')"
                                        class="text-danger mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label htmlFor="Email">{{__("profil.key31") }}</label>
                                    <input type="text" class="form-control" placeholder="Email" id="email"
                                        name="email" value="{{ $user->email }}" required
                                        autocomplete="email">
                                    <x-input-error :messages="$errors->get('email')"
                                        class="text-danger mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label htmlFor="Phone">{{__("profil.key32") }} </label>
                                    <input type="text" class="form-control" placeholder="Phone" id="phone"
                                        name="phone" value="{{ $profile->phone }}"
                                        autocomplete="phone">
                                    <x-input-error :messages="$errors->get('phone')"
                                        class="text-danger mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label htmlFor="occupation_en">Occupation In English</label>
                                    <input type="text" class="form-control" placeholder="Occupation in English"
                                        id="occupation_en" name="occupation_en"
                                        value="{{ $profile->occupation_en }}"
                                        autocomplete="occupation_en">
                                    <x-input-error :messages="$errors->get('occupation_en')"
                                        class="text-danger mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label htmlFor="occupation_fr">Occupation In French</label>
                                    <input type="text" class="form-control" placeholder="Occupation in French"
                                        id="occupation_fr" name="occupation_fr"
                                        value="{{ $profile->occupation_fr }}"
                                        autocomplete="occupation_fr">
                                    <x-input-error :messages="$errors->get('occupation_fr')"
                                        class="text-danger mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label htmlFor="biography_en">Biography In English</label>
                                    <textarea id='biography_en' name="biography_en" class="form-control" placeholder="Biography in English">{{ $profile->biography_en }}</textarea>
                                    <x-input-error :messages="$errors->get('biography_en')"
                                        class="text-danger mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label htmlFor="biography_fr">Biography In French</label>
                                    <textarea id='biography_fr' name="biography_fr" class="form-control" placeholder="Biography in French">{{ $profile->biography_fr }}</textarea>
                                    <x-input-error :messages="$errors->get('biography_fr')"
                                        class="text-danger mt-2" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <div class="">
                                  <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                              </div>
                        </div>
                    </div>
                </form>
              </div>
              <div class="tab-pane" id="password">
                <form method="post" action="{{ route('password.update') }}"
                    class="mt-6 space-y-6">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label htmlFor="current_password">{{__("profil.key35") }}</label>
                                <input class="form-control" id='current_password' type="password"
                                    id="current_password" name="current_password"
                                    type="password" autocomplete="current-password"
                                    placeholder="Type password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class=" text-danger mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label htmlFor="password">{{__("profil.key36") }}</label>
                                <input class="form-control" name="password" type="password"
                                    autocomplete="new-password" placeholder="new password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="text-danger mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label htmlFor="password_confirmation">{{__("profil.key37") }}</label>
                                <input class="form-control" id="password_confirmation" name="password_confirmation"
                                    type="password" autocomplete="new-password" placeholder="confirm new password" />
                                <x-input-error :messages="$errors->updatePassword->get( 'password_confirmation')" class="text-danger mt-2" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <div class="">
                                  <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
    <!-- /.container-fluid -->
@endsection

@section('third_party_scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
    <script>
        function hideValidatonMessage(el) {
            if ($(el).val()) {
                $('span#' + $(el).attr('id') + '-error').hide();
            } else {
                $('span#' + $(el).attr('id') + '-error').show();
            }
        }

        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            $('#about-course-form').validate({
                rules: {
                    course_id: {
                        required: true
                    },
                    description_en: {
                        required: true
                    },
                    description_fr: {
                        required: true
                    },
                },
                messages: {
                    course_id: {
                        required: "Please select a course to continue",
                    },
                    description_en: {
                        required: "Please enter the course pre-requisite description in English",
                    },
                    description_fr: {
                        required: "Please enter the course pre-requisite description in French",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
