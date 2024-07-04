@extends('back.layouts.global')

@section('title', 'Courses Catagories')

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
                    <label>Filter by Training Topic</label>
                    <select class="form-control select2" style="width: 100%;" name="topic_id"
                        id="topic_id" onchange="reloadDatatable(this);">
                        <option value="">select a topic</option>
                        @foreach ($topics as $topic)
                            <option value="{{ $topic->id }}">{{ $topic->name_en }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('topic_id')" class="text-danger" />
                </div>
            </div>
            <div class="col-sm-3 col-md-2">
                <label>Create button</label>
                <a href="{{ route('courses.categories.create') }}" class="">
                    <button type="button" class="btn btn-block btn-primary">Create Category</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="categoriesTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Topic</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Topic</th>
                                    <th>Description</th>
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

@section('third_party_scripts')
    <script>
        $(document).ready(function() {});
    </script>
    <script>
        let datatable;
        let topic_id;
        let url_edit = "{{route('courses.categories.edit', ['id' => 'id'])}}";
        let url_delete = "{{route('courses.categories.destroy', ['id' => 'id'])}}";
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();

            // Retreive filter data
            topic_id = $('#topic_id').val();

            datatable =  $("#categoriesTable").DataTable({
                "responsive": true,
                "ordering": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [/*"copy", "csv",*/ "excel", "pdf", /*"print", */"colvis"],
                "ajax": {
                    "type": "POST",
                    "url": "{{route('courses.categories.datatable')}}",
                    data: function() {
                        return data = {
                            "topic_id": topic_id,
                            _token: '{{ csrf_token() }}',
                        };
                    },
                    "dataSrc": "",
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        $("#categoriesTable").find('tbody td').html('<span class="text-danger">Failed to load data</span>');
                        // Show message error
                        Toast.fire({
                            icon: 'error',
                            title: 'An error occurred while charging data. Please try again!'
                        })
                    }
                },
                columns: [
                    {data: 'name_en'},
                    {data: 'topic_name_en'},
                    {data: 'description_en'},
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
                                        <a class="dropdown-item" href="${url_edit.replace('id', data)}">Edit</a>
                                        <a class="dropdown-item remove-item" data-item-id="${data}" href="javascript:void(0);">Delete</a>
                                </div>`;
                                return html;
                        },
                    },
                ],
                "deferRender": true,
                // "order": [[1, 'asc']],
                initComplete: function () {
                    datatable.buttons().container().appendTo('#categoriesTable_wrapper .col-md-6:eq(0)');
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
                        $(modal).find('h2.modal-body-title').text('Are you sure you want to delete this category?');
                        $(modal).find('p.modal-body-text').text('This operation is irreversible');
                        $(modal).modal('show');
                    });
                }
            })
        });

        function reloadDatatable(el) {
            // Retrieve select id
            topic_id = $(el).val();
            // Reload datatable
            $('#categoriesTable').DataTable().ajax.reload();
        }
    </script>
@endsection
