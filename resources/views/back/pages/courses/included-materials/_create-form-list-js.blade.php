<script>
    function includedMaterialFormSubmit(event, form) {
        if (event)
            event.preventDefault();
        $.ajax({
            type: $(form).attr('method'),
            url: $(form).attr('action'),
            data: $(form).serialize(),
            success: function(result) {

                // Success message
                var success_message = 'Material added successfully!';
                // For update
                if ($(form).find('input[name="_method"]').val() == 'patch')
                    success_message = 'Material updated successfully!';

                // Show success message
                Toast.fire({
                    icon: 'success',
                    title: success_message
                })

                // Show material list
                $('div.course-included-materials-wrapper').replaceWith(result);

                // show edit field
                showEditField();

            },
            error: function(error) {
                // to do with error
                console.log(error);
                // Show message error
                Toast.fire({
                    icon: 'error',
                    title: 'An error occurred while saving the included material. Please try again!'
                })
            },
        });
    }

    function addIncludedMaterial(el) {
        $(el).addClass('d-none');
        $('#included-material-form-add-new').removeClass('d-none');
    }

    function deleteIncludedMaterial(el) {
        let item_id = $(el).data('itemId');
        let url_delete = "{{ route('courses.included_materials.destroy', ['id' => 'id']) }}";
        let modal = $('div#modal-danger');
        let form = $(modal).find('form');
        // Update modal form action
        form.attr('action', url_delete.replace('id', item_id));
        form.attr('onsubmit', 'deleteIncludedMaterialSubmit(event, this)')
        $(modal).find('h2.modal-body-title').text('Are you sure you want to delete this included material?');
        $(modal).modal('show');
    }

    function deleteIncludedMaterialSubmit(event, form) {
        if (event)
            event.preventDefault();
        // Deletion modal
        let modal = $('div#modal-danger');
        // Ajax request for deletion
        $.ajax({
            type: $(form).attr('method'),
            url: $(form).attr('action'),
            data: $(form).serialize() + "&included_material_id=",
            success: function(result) {
                // hidden of modal
                $(modal).modal('hide');
                // Show success message
                Toast.fire({
                    icon: 'success',
                    title: 'Included Material deleted successfully!'
                })
                $('div.course-included-materials-wrapper').replaceWith(result);

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
                    title: 'An error occurred while deleting the included material. Please try again!'
                })
            },
        });
    }
</script>
