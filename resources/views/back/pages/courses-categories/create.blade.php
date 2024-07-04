@extends('back.layouts.global')

@section('title', 'Courses Categories')

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
        <!-- Create category form -->
        <form action="@if(isset($category) && $category->id){{route('courses.categories.update', ['id'=>$category->id])}}@else{{route('courses.categories.store')}}@endif" method="post" id="about-category-form">
            @csrf
            @isset($category)@method('patch')@endisset
            <!-- Create category card -->
            <div class="card card-primary">
                <div class="card-header" data-card-widget="collapse" style="cursor: pointer; display: flex;flex-direction: row;justify-content: center;">
                    <h1 class="card-title" style="font-size: 20px;">{{ $page_title }}</h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="@isset($category){{ $category->id }}@endisset">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Training Topic</label>
                                    <select class="form-control select2" style="width: 100%;" name="training_topic_id"
                                        id="training_topic_id" onchange="hideValidatonMessage(this);">
                                        <option value="">select a topic</option>
                                        @foreach ($topics as $topic)
                                            <option value="{{ $topic->id }}"
                                                @if ((isset($category) && $topic->id == $category->training_topic_id) || $topic->id == old('training_topic_id')) @selected(true) @endif>
                                                {{ $topic->name_en }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('training_topic_id')" class="text-danger" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label htmlFor="name_en">Category Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="enter the category name"
                                            id="name_en" name="name_en"
                                            value="@if(isset($category)){{ old('name_en', $category->name_en) }}@else{{ old('name_en') }}@endif" required autofocus
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
                                        value="@if(isset($category)){{ old('url_tag', $category->url_tag) }}@else{{ old('url_tag') }}@endif"
                                        class="form-control form-control-border" name="url_tag" id="url_tag"
                                        placeholder="category tag url" required>
                                    <x-input-error :messages="$errors->get('url_tag')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description_en">Description (About Category)</code></label>
                                    <textarea class="form-control" name="description_en" id="description_en" rows="5"
                                        placeholder="Enter description about category">@if(isset($category)){{ old('description_en', $category->description_en) }}@else{{ old('description_en') }}@endif</textarea>
                                    <x-input-error :messages="$errors->get('description_en')" class="text-danger" />
                                </div>
                            </div>
                        </div>
                        <!--/.row -->

                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="display: flex; flex-direction: row; justify-content: flex-end;">
                    <button type="submit" class="btn btn-primary">@if (isset($category)) Edit Category @else Create Category @endif</button>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </form>
        <!-- /.form -->
        <!-- Category metadata -->
            <!-- Category categorys card -->
            <div class="card card-default">
            </div>
            <!-- /.Category categorys card -->
        <!-- /.Category metadat -->
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
            $('#about-category-form').validate({
                rules: {
                    training_topic_id: {
                        required: true,
                    },
                    name_en: {
                        required: true,
                    },
                },
                messages: {
                    training_topic_id: {
                        required: "Please select a topic",
                    },
                    name_en: {
                        required: "Please enter the category name",
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
                var category_name = $(this).val();
                $.ajax({
                    url: "{{ route('courses.categories.url_tag') }}",
                    method: "post",
                    data: {
                        'category_name': category_name,
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
