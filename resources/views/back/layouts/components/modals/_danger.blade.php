<div class="modal fade" id="modal-danger">
    <div class="modal-dialog">
        <form method="post" action="#" class="p-6">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm deletion</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 modal-body-title">
                        Are you sure you want to delete this data?
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 modal-body-text">
                        This operation is irreversible
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
