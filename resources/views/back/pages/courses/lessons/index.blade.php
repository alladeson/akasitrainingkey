@extends('back.layouts.global')

@section('title', 'Courses Lessons')

@section('third_party_stylesheets')
    <style>
        .primary-color {
            color: #ff0e0d !important;
        }

        .secondary-color {
            color: #005dae !important;
        }
        .dropdown-toggle::after {
            content: none;
        }
    </style>
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-between" style="margin: 20px 0 20px 0;">
            <div class="col-sm-3 col-md-3">
                <div class="form-group">
                    <label>Course</label>
                    <select class="form-control select2" style="width: 100%;" name="course_id"
                        id="course_id" onchange="hideValidatonMessage(this);">
                        <option value="">select a course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name_en }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('course_id')" class="text-danger" />
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="form-group" id="module-select-view">
                    <label>Module</label>
                    <select class="form-control select2" style="width: 100%;" name="module_id"
                        id="module_id" onchange="hideValidatonMessage(this);">
                        <option value="">select a module</option>
                        @foreach ($modules as $module)
                            <option value="{{ $module->id }}"> {{ $module->title_en }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('module_id')" class="text-danger" />
                </div>
            </div>
            <div class="col-sm-3 col-md-2">
                <label>Create button</label>
                <a href="{{ route('courses.lessons.create') }}" class="">
                    <button type="button" class="btn btn-block btn-primary">Create Lesson</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="lessonsTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Module</th>
                                    <th>Title English</th>
                                    <th>Title French</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Course</th>
                                    <th>Module</th>
                                    <th>Title English</th>
                                    <th>Title French</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection

@if (session('course'))
    @php ($course_id = session('course')->id)
@else
    @php ($course_id = 0)
@endif

@if (session('module'))
    @php ($module_id = session('module')->id)
@else
    @php ($module_id = 0)
@endif

@section('third_party_scripts')
    <script>
        $(document).ready(function() {
            if({{$course_id}})
                $('#course_id').val({{$course_id}});
            if({{$module_id}})
                $('#module_id').val({{$module_id}});
        });
    </script>
    <script>
        let datatable;
        let course_id;
        let module_id;
        let url_tag = "{{route('course', ['url_tag' => 'url_tag'])}}";
        let url_edit = "{{route('courses.lessons.edit', ['id' => 'id'])}}";
        let url_delete = "{{route('courses.lessons.destroy', ['id' => 'id'])}}";
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();

            // Retreive filter data
            course_id = $('#course_id').val();
            module_id = $('#module_id').val();

            datatable =  $("#lessonsTable").DataTable({
                "responsive": true,
                "ordering": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [/*"copy", "csv",*/ "excel", "pdf", /*"print", */"colvis"],
                "ajax": {
                    "type": "POST",
                    "url": "{{route('courses.lessons.datatable')}}",
                    data: function() {
                        return data = {
                            "course_id": course_id,
                            "module_id": module_id,
                            _token: '{{ csrf_token() }}',
                        };
                    },
                    "dataSrc": "",
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        $("#lessonsTable").find('tbody td').html('<span class="text-danger">Failed to load data</span>');
                        // Show message error
                        Toast.fire({
                            icon: 'error',
                            title: 'An error occurred while charging data. Please try again!'
                        })
                    }
                },
                columns: [
                    {
                        data: 'course_name_en',
                        "render": function(data, type, row, meta) {
                            return `<a class="course-title" href="` + url_tag.replace('url_tag', row.course_url_tag) + `" target="_blanck">${data}</a>`;
                        }
                    },
                    {data: 'module_title_en'},
                    {data: 'title_en'},
                    {data: 'title_fr'},
                    {
                        "data": "id",
                        "class": "text-center",
                        "orderable": false,
                        "searchable": false,
                        "render": function(data, type, row, meta) {
                                let html = `
                                <a href="javascript:void(0);" style="color: inherit;" class="dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                      </svg>
                                </a>
                                <div class="dropdown-menu">
                                    ${(row.course_status_en == 'draft') ?
                                        `<a class="dropdown-item" href="${url_edit.replace('id', data)}">Edit</a>
                                        <a class="dropdown-item remove-item" data-item-id="${data}" href="javascript:void(0);">Delete</a>`
                                    :
                                        `<a class="dropdown-item">No actions</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item">Published Course</a>`
                                    }
                                </div>
                                `;
                                return html;
                        },
                    },
                ],
                "deferRender": true,
                // "order": [[1, 'asc']],
                initComplete: function () {
                    datatable.buttons().container().appendTo('#lessonsTable_wrapper .col-md-6:eq(0)');
                    // Delete a record
                    datatable.on('click', '.remove-item', function (e) {
                        e.preventDefault();
                        let item_id = $(this).data('itemId');
                        let modal = $('div#modal-danger');
                        // Update modal form action
                        $(modal).find('form').attr('action', url_delete.replace('id', item_id));
                        $(modal).modal('show');
                    });
                }
            })
        });

        function hideValidatonMessage(el) {
            // Retrieve select id
            var el_id = $(el).attr('id');
            // Retrieve course id
            if(el_id == 'course_id') {
                // Retrieve and update course id
                course_id = $(el).val();
                // Reinitialization of module id
                module_id = '';
                // Reload module select view
                getModuleSelectView(course_id);
            }
            // Retrieve course id
            if(el_id == 'module_id')
                module_id = $(el).val();
            // Reload datatable
            $('#lessonsTable').DataTable().ajax.reload();
        }

        function getModuleSelectView(course_id) {
            $.ajax({
                url: "{{ route('courses.modules.select_view') }}",
                method: "post",
                data: {
                    'course_id': course_id,
                    _token: '{{ csrf_token() }}',
                },
                success: function(result) {
                    // to do with result
                    $('div#module-select-view').replaceWith(result);
                    $('div#module-select-view').find('.select2').select2();
                },
                error: function(error) {
                    // to do with error
                    console.log(error);
                    // Show message error
                    Toast.fire({
                        icon: 'error',
                        title: 'An error occurred while charging the course modules. Please try again!'
                    })
                },
                beforeSend: function() {
                    // Show message info
                    Toast.fire({
                        icon: 'info',
                        title: 'The system is charging the course modules. please wait!'
                    })
                },
                complete: function(data) {
                    // Code to hide spinner.
                    // Show message info
                    Toast.fire({
                        icon: 'success',
                        title: 'Charging of the course modules was successful. You can continue your opération!'
                    })
                },
            });
        }
    </script>
@endsection
