<script>
    function moduleFormSubmit(event, form){
            if(event)
                event.preventDefault();
                $.ajax({
                    type: $(form).attr('method'),
                    url: $(form).attr('action'),
                    data: $(form).serialize(),
                    success: function (result) {
                        // Success message
                        var success_message = 'Module added successfully!';
                        // For update
                        if($(form).find('input[name="_method"]').val() == 'patch')
                            success_message = 'Module updated successfully!';

                        // Show success message
                        Toast.fire({
                            icon: 'success',
                            title: success_message
                        })

                        // Show module list
                        $('div.course-modules-wrapper').replaceWith(result);

                        // show edit field
                        showEditField();

                    },
                    error: function(error) {
                        // to do with error
                        console.log(error);
                        // Show message error
                        Toast.fire({
                            icon: 'error',
                            title: 'An error occurred while saving the module. Please try again!'
                        })
                    },
                });
        }

        function addModule(el) {
            $(el).addClass('d-none');
            $('#module-form-add-new').removeClass('d-none');
        }

        function deleteModule(el) {
            let item_id = $(el).data('itemId');
            let url_delete = "{{route('courses.modules.destroy', ['id' => 'id'])}}";
            let modal = $('div#modal-danger');
            let form = $(modal).find('form');
            // Update modal form action
            form.attr('action', url_delete.replace('id', item_id));
            form.attr('onsubmit', 'deleteModuleSubmit(event, this)')
            $(modal).find('h2.modal-body-title').text('Are you sure you want to delete this module?');
            $(modal).modal('show');
        }
        
        function deleteModuleSubmit(event, form) {
            if(event)
                event.preventDefault();
                // Deletion modal
                let modal = $('div#modal-danger');
                // Ajax request for deletion
                $.ajax({
                    type: $(form).attr('method'),
                    url: $(form).attr('action'),
                    data: $(form).serialize() + "&module_id=",
                    success: function (result) {
                        // hidden of modal
                        $(modal).modal('hide');
                        // Show success message
                        Toast.fire({
                            icon: 'success',
                            title: 'Module deleted successfully!'
                        })
                        $('div.course-modules-wrapper').replaceWith(result);
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
                            title: 'An error occurred while deleting the module. Please try again!'
                        })
                    },
                });
        }
</script>