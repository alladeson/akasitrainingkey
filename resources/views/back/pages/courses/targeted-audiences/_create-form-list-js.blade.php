<script>
    function targetedAudienceFormSubmit(event, form) {
        if (event)
            event.preventDefault();
        $.ajax({
            type: $(form).attr('method'),
            url: $(form).attr('action'),
            data: $(form).serialize(),
            success: function(result) {

                // Success message
                var success_message = 'Audience added successfully!';
                // For update
                if ($(form).find('input[name="_method"]').val() == 'patch')
                    success_message = 'Audience updated successfully!';

                // Show success message
                Toast.fire({
                    icon: 'success',
                    title: success_message
                })

                // Show audience list
                $('div.course-targeted-audiences-wrapper').replaceWith(result);

                // show edit field
                showEditField();

            },
            error: function(error) {
                // to do with error
                console.log(error);
                // Show message error
                Toast.fire({
                    icon: 'error',
                    title: 'An error occurred while saving the targeted audience. Please try again!'
                })
            },
        });
    }

    function addTargetedAudience(el) {
        $(el).addClass('d-none');
        $('#targeted-audience-form-add-new').removeClass('d-none');
    }

    function deleteTargetedAudience(el) {
        let item_id = $(el).data('itemId');
        let url_delete = "{{ route('courses.targeted_audiences.destroy', ['id' => 'id']) }}";
        let modal = $('div#modal-danger');
        let form = $(modal).find('form');
        // Update modal form action
        form.attr('action', url_delete.replace('id', item_id));
        form.attr('onsubmit', 'deleteTargetedAudienceSubmit(event, this)')
        $(modal).find('h2.modal-body-title').text('Are you sure you want to delete this targeted Audience?');
        $(modal).modal('show');
    }

    function deleteTargetedAudienceSubmit(event, form) {
        if (event)
            event.preventDefault();
        // Deletion modal
        let modal = $('div#modal-danger');
        // Ajax request for deletion
        $.ajax({
            type: $(form).attr('method'),
            url: $(form).attr('action'),
            data: $(form).serialize() + "&targeted_audience_id=",
            success: function(result) {
                // hidden of modal
                $(modal).modal('hide');
                // Show success message
                Toast.fire({
                    icon: 'success',
                    title: 'Targeted Audience deleted successfully!'
                })
                $('div.course-targeted-audiences-wrapper').replaceWith(result);

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
                    title: 'An error occurred while deleting the targeted audience. Please try again!'
                })
            },
        });
    }
</script>
