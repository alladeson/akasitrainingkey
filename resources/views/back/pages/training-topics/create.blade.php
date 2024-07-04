@extends('back.layouts.global')

@section('title', 'Training Topics')

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
        <!-- Create topic form -->
        <form action="@if(isset($topic) && $topic->id){{route('training_topics.update', ['id'=>$topic->id])}}@else{{route('training_topics.store')}}@endif" method="post" id="about-topic-form">
            @csrf
            @isset($topic)@method('patch')@endisset
            <!-- Create topic card -->
            <div class="card card-primary">
                <div class="card-header" data-card-widget="collapse" style="cursor: pointer; display: flex;flex-direction: row;justify-content: center;">
                    <h1 class="card-title" style="font-size: 20px;">{{ $page_title }}</h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="@isset($topic){{ $topic->id }}@endisset">
                            <div class="col-md-12">
                                <div class="form-group">
                                        <label htmlFor="name_en">Topic Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="enter the topic name"
                                            id="name_en" name="name_en"
                                            value="@if(isset($topic)){{ old('name_en', $topic->name_en) }}@else{{ old('name_en') }}@endif" required autofocus
                                            autocomplete="name_en">
                                        <x-input-error :messages="$errors->get('name_en')"
                                            class="text-danger mt-2" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->
                        <div class="row d-none">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="url_tag">Tag Url <code>(tag url)</code></label>
                                    <input type="text"
                                        value="@if(isset($topic)){{ old('url_tag', $topic->url_tag) }}@else{{ old('url_tag') }}@endif"
                                        class="form-control form-control-border" name="url_tag" id="url_tag"
                                        placeholder="topic tag url" required>
                                    <x-input-error :messages="$errors->get('url_tag')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description_en">Description (About Topic)</code></label>
                                    <textarea class="form-control" name="description_en" id="description_en" rows="5"
                                        placeholder="Enter description about topic">@if(isset($topic)){{ old('description_en', $topic->description_en) }}@else{{ old('description_en') }}@endif</textarea>
                                    <x-input-error :messages="$errors->get('description_en')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->

                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="display: flex; flex-direction: row; justify-content: flex-end;">
                    <button type="submit" class="btn btn-primary">@if (isset($topic)) Edit Topic @else Create Topic @endif</button>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </form>
        <!-- /.form -->
        <!-- Topic metadata -->
            <!-- Topic goals card -->
            <div class="card card-default">
            </div>
            <!-- /.Topic goals card -->
        <!-- /.Topic metadat -->
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
            $('#about-topic-form').validate({
                rules: {
                    name_en: {
                        required: true,
                    },
                },
                messages: {
                    name_en: {
                        required: "Please enter the topic name",
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

            $('input#name_en').on('change', function(event) {
                var topic_name = $(this).val();
                $.ajax({
                    url: "{{ route('training_topics.url_tag') }}",
                    method: "post",
                    data: {
                        'topic_name': topic_name,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(result) {
                        // to do with result
                        $('input#url_tag').val(result.url_tag);
                        $('input#url_tag').removeAttr('readonly');
                        $('input#url_tag').attr('required', 'required');
                    },
                    error: function(error) {
                        // to do with error
                        console.log(error);
                    },
                    beforeSend: function() {
                        // Show message info
                        // Toast.fire({
                        //     icon: 'info',
                        //     title: 'The system is formatting the course url tag. please wait!'
                        // })
                    },
                    complete: function(data) {
                        // Code to hide spinner.
                        // Show message info
                        // Toast.fire({
                        //     icon: 'success',
                        //     title: 'Formatting of the course tag url was successful. You can modify it as you wish!'
                        // })
                    },
                });
            });
        });

    </script>
@endsection
