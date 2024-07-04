@extends('back.layouts.global')

@section('title', 'Training Schedules')

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
                    <label>Show list by Course</label>
                    <select class="form-control select2" style="width: 100%;" name="course_id"
                        id="course_id" onchange="reloadDatatable(this);">
                        <option value="">select a course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name_en }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('course_id')" class="text-danger" />
                </div>
            </div>
            <div class="col-sm-3 col-md-2">
                <label>Create button</label>
                <a href="{{ route('schedules.create') }}" class="">
                    <button type="button" class="btn btn-block btn-primary">Create Schedule</button>
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
                        <table id="schedulesTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Started Date</th>
                                    <th>End Date</th>
                                    <th>Started Time</th>
                                    <th>End Time</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Course</th>
                                    <th>Started Date</th>
                                    <th>End Date</th>
                                    <th>Started Time</th>
                                    <th>End Time</th>
                                    <th>Location</th>
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

@if (session('schedule'))
    @php ($course_id = session('schedule')->course_id ? session('schedule')->course_id : 0)
@else
    @php ($course_id = 0)
@endif

@if (Auth::user()->hasRole('Admin'))
    @php ($admin_user = 1)
@else
    @php ($admin_user = 0)
@endif

@section('third_party_scripts')
    <script>
        $(document).ready(function() {
            if({{$course_id}})
                $('#course_id').val({{$course_id}});
        });
    </script>
    <script>
        let datatable;
        let course_id;
        let admin_user;
        let url_tag = "{{route('course', ['url_tag' => 'url_tag'])}}";
        let url_edit = "{{route('schedules.edit', ['id' => 'id'])}}";
        let url_delete = "{{route('schedules.destroy', ['id' => 'id'])}}";
        let url_enable_publishing = "{{route('schedules.enable_publishing', ['id' => 'id'])}}";
        let url_publish_schedule = "{{route('schedules.publish', ['id' => 'id'])}}";
        let url_enable_editing = "{{route('schedules.enable_editing', ['id' => 'id'])}}";
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();
            admin_user = {{$admin_user}};

            // Retreive filter data
            course_id = $('#course_id').val();
            certification_id = $('#certification_id').val();
            vendor_id = $('#vendor_id').val();

            datatable =  $("#schedulesTable").DataTable({
                "responsive": true,
                "ordering": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [/*"copy", "csv",*/ "excel", "pdf", /*"print", */"colvis"],
                "ajax": {
                    "type": "POST",
                    "url": "{{route('schedules.datatable')}}",
                    data: function() {
                        return data = {
                            "course_id": course_id,
                            _token: '{{ csrf_token() }}',
                        };
                    },
                    "dataSrc": "",
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        $("#schedulesTable").find('tbody td').html('<span class="text-danger">Failed to load data</span>');
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
                            return `<a class="schedule-title" href="` + url_tag.replace('url_tag', row.url_tag) + `" target="_blanck">${data}</a>`;
                        }
                    },
                    {data: 'started_date'},
                    {data: 'end_date'},
                    {data: 'started_time'},
                    {data: 'end_time'},
                    {data: 'location_en'},
                    {data: 'status'},
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
                                    ${(row.status == 'draft' && !row.published) ?
                                        `<a class="dropdown-item" href="${url_edit.replace('id', data)}">Edit</a>
                                        <a class="dropdown-item enable-publishing" data-item-id="${data}" href="javascript:void(0);">Send For Review</a>
                                        <a class="dropdown-item remove-item" data-item-id="${data}" href="javascript:void(0);">Delete</a>`
                                    : admin_user && row.status != 'draft' ?
                                        `<a class="dropdown-item enable-editing" data-item-id="${data}" href="javascript:void(0);">Enable Editing</a>`
                                    : admin_user && row.published ?
                                        `<a class="dropdown-item" href="${url_edit.replace('id', data)}">Edit</a>
                                        <a class="dropdown-item publish-schedule" data-item-id="${data}" href="javascript:void(0);">Publish</a>
                                        <a class="dropdown-item remove-item" data-item-id="${data}" href="javascript:void(0);">Delete</a>`
                                    :
                                        `<a class="dropdown-item">No actions</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item">Published Schedule</a>`
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
                    datatable.buttons().container().appendTo('#schedulesTable_wrapper .col-md-6:eq(0)');
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
                        $(modal).find('h2.modal-body-title').text('Are you sure you want to submit this schedule for review?');
                        $(modal).find('p.modal-body-text').text('You will no longer be able to modify this schedule or its associated data');
                        $(modal).modal('show');
                    });
                    datatable.on('click', '.publish-schedule', function (e) {
                        e.preventDefault();
                        let item_id = $(this).data('itemId');
                        let modal = $('div#modal-danger');
                        // Update modal form action
                        $(modal).find('form').attr('action', url_publish_schedule.replace('id', item_id));
                        $(modal).find('input[name="_method"]').val('patch');
                        $(modal).find('div.modal-content').removeClass('bg-danger');
                        $(modal).find('div.modal-content').addClass('bg-default');
                        $(modal).find('h4.modal-title').text('Confirm publication');
                        $(modal).find('h2.modal-body-title').text('Are you sure you want to publish this schedule?');
                        $(modal).find('p.modal-body-text').text('You will no longer be able to modify this schedule or its associated data');
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
                        $(modal).find('h2.modal-body-title').text('Are you sure you want to enabble editing for this schedule?');
                        $(modal).find('p.modal-body-text').text('This schedule and its data may be modified by other users');
                        $(modal).modal('show');
                    });
                }
            })
        });

        function reloadDatatable(el) {
            // Retrieve category id
            course_id = $(el).val();
            // Reload datatable
            $('#schedulesTable').DataTable().ajax.reload();
        }
    </script>
@endsection
