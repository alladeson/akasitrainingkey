<script>
    function preRequisiteFormSubmit(event, form) {
        if (event)
            event.preventDefault();
        $.ajax({
            type: $(form).attr('method'),
            url: $(form).attr('action'),
            data: $(form).serialize(),
            success: function(result) {

                // Success message
                var success_message = 'Pre-Requisite added successfully!';
                // For update
                if ($(form).find('input[name="_method"]').val() == 'patch')
                    success_message = 'Pre-Requisite updated successfully!';

                // Show success message
                Toast.fire({
                    icon: 'success',
                    title: success_message
                })

                // Show pre-requisite list
                $('div.course-pre-requisites-wrapper').replaceWith(result);

                // show edit field
                showEditField();

            },
            error: function(error) {
                // to do with error
                console.log(error);
                // Show message error
                Toast.fire({
                    icon: 'error',
                    title: 'An error occurred while saving the pre-requisite. Please try again!'
                })
            },
        });
    }

    function addPreRequisite(el) {
        $(el).addClass('d-none');
        $('#pre-requisite-form-add-new').removeClass('d-none');
    }

    function deletePreRequisite(el) {
        let item_id = $(el).data('itemId');
        let url_delete = "{{ route('courses.pre_requisites.destroy', ['id' => 'id']) }}";
        let modal = $('div#modal-danger');
        let form = $(modal).find('form');
        // Update modal form action
        form.attr('action', url_delete.replace('id', item_id));
        form.attr('onsubmit', 'deletePreRequisiteSubmit(event, this)')
        $(modal).find('h2.modal-body-title').text('Are you sure you want to delete this pre-requisite?');
        $(modal).modal('show');
    }

    function deletePreRequisiteSubmit(event, form) {
        if (event)
            event.preventDefault();
        // Deletion modal
        let modal = $('div#modal-danger');
        // Ajax request for deletion
        $.ajax({
            type: $(form).attr('method'),
            url: $(form).attr('action'),
            data: $(form).serialize() + "&pre_requisite_id=",
            success: function(result) {
                // hidden of modal
                $(modal).modal('hide');
                // Show success message
                Toast.fire({
                    icon: 'success',
                    title: 'Pre-Requisite deleted successfully!'
                })
                $('div.course-pre-requisites-wrapper').replaceWith(result);

                // show edit field
                showEditField();
            },
            error: function(error) {
                // hidden of modal
                $(modal).modal('hide');
                // to do with error
                console.log(error);
                // Show message error
                Toast.fire({
                    icon: 'error',
                    title: 'An error occurred while deleting the pre-requisite. Please try again!'
                })
            },
        });
    }
</script>
