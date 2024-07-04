<script>
    function goalFormSubmit(event, form) {
        if (event)
            event.preventDefault();
        $.ajax({
            type: $(form).attr('method'),
            url: $(form).attr('action'),
            data: $(form).serialize(),
            success: function(result) {
                // Success message
                var success_message = 'Goal added successfully!';
                // For update
                if ($(form).find('input[name="_method"]').val() == 'patch')
                    success_message = 'Goal updated successfully!';

                // Show success message
                Toast.fire({
                    icon: 'success',
                    title: success_message
                })

                // Show goal list
                $('div.course-goals-wrapper').replaceWith(result);

                // show edit field
                showEditField();

            },
            error: function(error) {
                // to do with error
                console.log(error);
                // Show message error
                Toast.fire({
                    icon: 'error',
                    title: 'An error occurred while saving the goal. Please try again!'
                })
            },
        });
    }

    function addGoal(el) {
        $(el).addClass('d-none');
        $('#goal-form-add-new').removeClass('d-none');
    }

    function deleteGoal(el) {
        let item_id = $(el).data('itemId');
        let url_delete = "{{ route('courses.goals.destroy', ['id' => 'id']) }}";
        let modal = $('div#modal-danger');
        let form = $(modal).find('form');
        // Update modal form action
        form.attr('action', url_delete.replace('id', item_id));
        form.attr('onsubmit', 'deleteGoalSubmit(event, this)')
        $(modal).find('h2.modal-body-title').text('Are you sure you want to delete this goal?');
        $(modal).modal('show');
    }

    function deleteGoalSubmit(event, form) {
        if (event)
            event.preventDefault();
        // Deletion modal
        let modal = $('div#modal-danger');
        // Ajax request for deletion
        $.ajax({
            type: $(form).attr('method'),
            url: $(form).attr('action'),
            data: $(form).serialize() + "&goal_id=",
            success: function(result) {
                // hidden of modal
                $(modal).modal('hide');
                // Show success message
                Toast.fire({
                    icon: 'success',
                    title: 'Goal deleted successfully!'
                })
                $('div.course-goals-wrapper').replaceWith(result);

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
                    title: 'An error occurred while deleting the goal. Please try again!'
                })
            },
        });
    }
</script>
