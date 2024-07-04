@extends('back.layouts.global')

@section('title', 'Courses Catalog')

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
        <div class="row d-flex justify-content-between">
            <div class="col-sm-3 col-md-3">
                <div class="form-group">
                    <label>Show list by Category</label>
                    <select class="form-control select2" style="width: 100%;" name="category_id"
                        id="category_id" onchange="reloadDatatable(this);">
                        <option value="">select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="text-danger" />
                </div>
            </div>
            {{-- <div class="col-sm-3 col-md-3">
                <div class="form-group">
                    <label>Show list by Certification</label>
                    <select class="form-control select2" style="width: 100%;" name="certification_id"
                        id="certification_id" onchange="reloadDatatable(this);">
                        <option value="">select a certification</option>
                        @foreach ($certifications as $certification)
                            <option value="{{ $certification->id }}">{{ $certification->name_en }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('certification_id')" class="text-danger" />
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="form-group">
                    <label>Show list by Vendor</label>
                    <select class="form-control select2" style="width: 100%;" name="vendor_id"
                        id="vendor_id" onchange="reloadDatatable(this);">
                        <option value="">select a vendor</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}">{{ $vendor->name_en }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('vendor_id')" class="text-danger" />
                </div>
            </div> --}}
            <div class="col-sm-3 col-md-2">
                <label>Create button</label>
                <a href="{{ route('courses.create') }}" class="">
                    <button type="button" class="btn btn-block btn-primary">Create Course</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header" data-card-widget="collapse" style="cursor: pointer; display: flex;flex-direction: row;justify-content: center;">
                        <h1 class="card-title" style="font-size: 20px;">{{ $page_title }}</h1>
                    </div>
                    <div class="card-body">
                        <table id="coursesTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Category</th>
                                    <th>Level</th>
                                    <th>Duration</th>
                                    <th>Price (Euro)</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($courses as $course)
                                    <tr>
                                        <td><a class="course-title" href="{{route('course', ['url_tag' => $course->url_tag])}}" target="_blanck">{{$course->name_en}}</a></td>
                                        <td>{{ $course->code }}</td>
                                        <td>{{ $course->category_name_en }}</td>
                                        <td>{{ $course->level_en }}</td>
                                        <td>{{ $course->duration_en }}</td>
                                        <td>{{ $course->price_euro }}</td>
                                        <td>{{ $course->status_en }}</td>
                                        <td class="text-center">
                                            <a href="javascript:void(0);" style="color: inherit;" class="dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                                  </svg>
                                            </a>
                                            <div class="dropdown-menu">
                                                @if ($course->status_en != 'draft')
                                                    <a class="dropdown-item" href="{{route('courses.edit', ['id' => $course->id])}}">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Publish</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                @else
                                                    <a class="dropdown-item">No actions</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item">Published Course</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Category</th>
                                    <th>Level</th>
                                    <th>Duration</th>
                                    <th>Price (Euro)</th>
                                    <th>Status</th>
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
    @php ($category_id = session('course')->category_id ? session('course')->category_id : 0)
    @php ($certification_id = session('course')->certification_id ? session('course')->certification_id : 0)
    @php ($vendor_id = session('course')->vendor_id ? session('course')->vendor_id : 0)
@else
    @php ($category_id = 0)
    @php ($certification_id = 0)
    @php ($vendor_id = 0)
@endif

@if (Auth::user()->hasRole('Admin'))
    @php ($admin_user = 1)
@else
    @php ($admin_user = 0)
@endif

@section('third_party_scripts')
    <script>
        $(document).ready(function() {
            if({{$category_id}})
                $('#category_id').val({{$category_id}});
            if({{$certification_id}})
                $('#certification_id').val({{$certification_id}});
            if({{$vendor_id}})
                $('#vendor_id').val({{$vendor_id}});
        });
    </script>
    <script>
        let datatable;
        let category_id;
        let certification_id;
        let vendor_id;
        let admin_user;
        let url_tag = "{{route('course', ['url_tag' => 'url_tag'])}}";
        let url_edit = "{{route('courses.edit', ['id' => 'id'])}}";
        let url_delete = "{{route('courses.destroy', ['id' => 'id'])}}";
        let url_enable_publishing = "{{route('courses.enable_publishing', ['id' => 'id'])}}";
        let url_publish_course = "{{route('courses.publish', ['id' => 'id'])}}";
        let url_enable_editing = "{{route('courses.enable_editing', ['id' => 'id'])}}";
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();
            admin_user = {{$admin_user}};

            // Retreive filter data
            category_id = $('#category_id').val();
            certification_id = $('#certification_id').val();
            vendor_id = $('#vendor_id').val();

            datatable =  $("#coursesTable").DataTable({
                "responsive": true,
                "ordering": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [/*"copy", "csv",*/ "excel", "pdf", /*"print", */"colvis"],
                "ajax": {
                    "type": "POST",
                    "url": "{{route('courses.datatable')}}",
                    data: function() {
                        return data = {
                            "category_id": category_id,
                            "certification_id": certification_id,
                            "vendor_id": vendor_id,
                            _token: '{{ csrf_token() }}',
                        };
                    },
                    "dataSrc": "",
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        $("#coursesTable").find('tbody td').html('<span class="text-danger">Failed to load data</span>');
                        // Show message error
                        Toast.fire({
                            icon: 'error',
                            title: 'An error occurred while charging data. Please try again!'
                        })
                    }
                },
                columns: [
                    {
                        data: 'name_en',
                        "render": function(data, type, row, meta) {
                            return `<a class="course-title" href="` + url_tag.replace('url_tag', row.url_tag) + `" target="_blanck">${data}</a>`;
                        }
                    },
                    {data: 'code'},
                    {data: 'category_name_en'},
                    {data: 'level_en'},
                    {data: 'duration_en'},
                    {data: 'price_euro'},
                    {data: 'status_en'},
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
                                    ${(row.status_en == 'draft' && !row.published) ?
                                        `<a class="dropdown-item" href="${url_edit.replace('id', data)}">Edit</a>
                                        <a class="dropdown-item enable-publishing" data-item-id="${data}" href="javascript:void(0);">Send For Review</a>
                                        <a class="dropdown-item remove-item" data-item-id="${data}" href="javascript:void(0);">Delete</a>`
                                    : admin_user && row.status_en != 'draft' ?
                                        `<a class="dropdown-item enable-editing" data-item-id="${data}" href="javascript:void(0);">Enable Editing</a>`
                                    : admin_user && row.published ?
                                        `<a class="dropdown-item" href="${url_edit.replace('id', data)}">Edit</a>
                                        <a class="dropdown-item publish-course" data-item-id="${data}" href="javascript:void(0);">Publish</a>
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
                    datatable.buttons().container().appendTo('#coursesTable_wrapper .col-md-6:eq(0)');
                    // Delete a record
                    datatable.on('click', '.remove-item', function (e) {
                        e.preventDefault();
                        let item_id = $(this).data('itemId');
                        let modal = $('div#modal-danger');
                        // Update modal form action
                        $(modal).find('form').attr('action', url_delete.replace('id', item_id));
                        $(modal).find('input[name="_method"]').val('delete');
                        $(modal).find('div.modal-content').removeClass('bg-danger');
                        $(modal).find('div.modal-content').addClass('bg-default');
                        $(modal).find('h4.modal-title').text('Confirm deletion');
                        $(modal).find('h2.modal-body-title').text('Are you sure you want to delete this data?');
                        $(modal).find('p.modal-body-text').text('This operation is irreversible');
                        $(modal).modal('show');
                    });
                    datatable.on('click', '.enable-publishing', function (e) {
                        e.preventDefault();
                        let item_id = $(this).data('itemId');
                        let modal = $('div#modal-danger');
                        // Update modal form action
                        $(modal).find('form').attr('action', url_enable_publishing.replace('id', item_id));
                        $(modal).find('input[name="_method"]').val('patch');
                        $(modal).find('div.modal-content').removeClass('bg-danger');
                        $(modal).find('div.modal-content').addClass('bg-default');
                        $(modal).find('h4.modal-title').text('Confirm sending for review');
                        $(modal).find('h2.modal-body-title').text('Are you sure you want to submit this course for review?');
                        $(modal).find('p.modal-body-text').text('You will no longer be able to modify this course or its associated data');
                        $(modal).modal('show');
                    });
                    datatable.on('click', '.publish-course', function (e) {
                        e.preventDefault();
                        let item_id = $(this).data('itemId');
                        let modal = $('div#modal-danger');
                        // Update modal form action
                        $(modal).find('form').attr('action', url_publish_course.replace('id', item_id));
                        $(modal).find('input[name="_method"]').val('patch');
                        $(modal).find('div.modal-content').removeClass('bg-danger');
                        $(modal).find('div.modal-content').addClass('bg-default');
                        $(modal).find('h4.modal-title').text('Confirm publication');
                        $(modal).find('h2.modal-body-title').text('Are you sure you want to publish this course?');
                        $(modal).find('p.modal-body-text').text('You will no longer be able to modify this course or its associated data');
                        $(modal).modal('show');
                    });
                    datatable.on('click', '.enable-editing', function (e) {
                        e.preventDefault();
                        let item_id = $(this).data('itemId');
                        let modal = $('div#modal-danger');
                        // Update modal form action
                        $(modal).find('form').attr('action', url_enable_editing.replace('id', item_id));
                        $(modal).find('input[name="_method"]').val('patch');
                        $(modal).find('div.modal-content').removeClass('bg-danger');
                        $(modal).find('div.modal-content').addClass('bg-default');
                        $(modal).find('h4.modal-title').text('Confirm editing activation');
                        $(modal).find('h2.modal-body-title').text('Are you sure you want to enabble editing for this course?');
                        $(modal).find('p.modal-body-text').text('This course and its data may be modified by other users');
                        $(modal).modal('show');
                    });
                }
            })
        });

        function reloadDatatable(el) {
            // Retrieve select id
            var el_id = $(el).attr('id');
            // Retrieve category id
            if(el_id == 'category_id')
                category_id = $(el).val();
            // Retrieve certification id
            if(el_id == 'certification_id')
                certification_id = $(el).val();
            // Retrieve vendor id
            if(el_id == 'vendor_id')
                vendor_id = $(el).val();
            // Reload datatable
            $('#coursesTable').DataTable().ajax.reload();
        }
    </script>
@endsection
