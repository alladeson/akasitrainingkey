@extends('back.layouts.global')

@section('title', 'User')

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
        <!-- Create user form -->
        <form action="@if(isset($user) && $user->id){{route('users.update', ['id'=>$user->id])}}@else{{route('users.store')}}@endif" method="post" id="about-user-form">
            @csrf
            @isset($user)@method('patch')@endisset
            <!-- Create user card -->
            <div class="card card-primary">
                <div class="card-header" data-card-widget="collapse" style="cursor: pointer; display: flex;flex-direction: row;justify-content: center;">
                    <h1 class="card-title" style="font-size: 20px;">{{ $page_title }}</h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="@isset($user){{ $user->id }}@endisset">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role<span class="text-danger">*</span></label>
                                    <select class="form-control select2" style="width: 100%;" name="roles"
                                        id="role" onchange="hideValidatonMessage(this);">
                                        <option value="">select a role</option>
                                        @foreach ($roles as $role)
                                            <option
                                                @if ( (isset($userRole) && $role['name'] == $userRole->name) || $role['name'] == old('roles')) @selected(true) @endif>
                                                {{ $role['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('role')" class="text-danger" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label htmlFor="name">Full Name</label>
                                        <input type="text" class="form-control" placeholder="full name"
                                            id="name" name="name"
                                            value="@if(isset($user)){{ old('name', $user->name) }}@else{{ old('name') }}@endif" required autofocus
                                            autocomplete="name">
                                        <x-input-error :messages="$errors->get('first_tname')"
                                            class="text-danger mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                        <label htmlFor="Email">Email</label>
                                        <input type="email" class="form-control" placeholder="Email" id="email"
                                            name="email" value="@if(isset($user)){{ old('email', $user->email) }}@else{{ old('email') }}@endif" required
                                            autocomplete="email">
                                        <x-input-error :messages="$errors->get('email')"
                                            class="text-danger mt-2" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label htmlFor="password">Password</label>
                                    <input class="form-control" name="password" type="password"
                                        autocomplete="password" placeholder="password" required />
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="text-danger mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label htmlFor="password_confirmation">Confirm Password</label>
                                    <input class="form-control" id="confirm-password" name="confirm-password"
                                        type="password" autocomplete="password" placeholder="confirm password" required />
                                    <x-input-error :messages="$errors->updatePassword->get( 'password_confirmation')" class="text-danger mt-2" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->

                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="display: flex; flex-direction: row; justify-content: flex-end;">
                    <button type="submit" class="btn btn-primary">@if (isset($user)) Edit User @else Create User @endif</button>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </form>
        <!-- /.form -->
        <!-- User metadata -->
            <!-- User goals card -->
            <div class="card card-default">
            </div>
            <!-- /.User goals card -->
        <!-- /.User metadat -->
    </div>
    <!-- /.container-fluid -->
@endsection

@section('third_party_scripts')
    <script>
        $(document).ready(function() {

        });

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

            $('#about-user-form').validate({
                rules: {
                    role: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    email: {
                        required: true
                    },

                },
                messages: {
                    role: {
                        required: "Please select a role",
                    },
                    name: {
                        required: "Please enter the user firstname",
                    },
                    email: {
                        required: "Please enter the user email",
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
