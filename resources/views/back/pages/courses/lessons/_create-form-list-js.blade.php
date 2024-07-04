<script>
    function lessonFormSubmit(event, form){
            if(event)
                event.preventDefault();
                // Retrieve lesson's module id
                let module = $(form).find('input[name="module_id"]').val();
                // Ajax request for create or update
                $.ajax({
                    type: $(form).attr('method'),
                    url: $(form).attr('action'),
                    data: $(form).serialize(),
                    success: function (result) {
                        // Success message
                        var success_message = 'Lesson added successfully!';
                        // For update
                        if($(form).find('input[name="_method"]').val() == 'patch')
                            success_message = 'Lesson updated successfully!';

                        // Show success message
                        Toast.fire({
                            icon: 'success',
                            title: success_message
                        })

                        // Show lesson list
                        $('div.course-module'+module+'-lessons-wrapper').replaceWith(result);

                        // show edit field
                        showEditField();

                    },
                    error: function(error) {
                        // to do with error
                        console.log(error);
                        // Show message error
                        Toast.fire({
                            icon: 'error',
                            title: 'An error occurred while saving the lesson. Please try again!'
                        })
                    },
                });
        }

        function addLesson(el) {
            $(el).addClass('d-none');
            let module_id = $(el).data('moduleId');
            $('#module'+module_id+'-lesson-form-add-new').removeClass('d-none');
        }

        function deleteLesson(el) {
            let item_id = $(el).data('itemId');
            let modlue_id = $(el).data('moduleId');
            let url_delete = "{{route('courses.lessons.destroy', ['id' => 'id'])}}";
            let modal = $('div#modal-danger');
            let form = $(modal).find('form');
            // Update modal form action
            form.attr('action', url_delete.replace('id', item_id));
            form.attr('onsubmit', 'deleteLessonSubmit(event, this,'+  modlue_id +')')
            $(modal).find('h2.modal-body-title').text('Are you sure you want to delete this lesson?');
            $(modal).modal('show');
        }
        
        function deleteLessonSubmit(event, form, modlue_id) {
            if(event)
                event.preventDefault();
                // Deletion modal
                let modal = $('div#modal-danger');
                // Ajax request for deletion
                $.ajax({
                    type: $(form).attr('method'),
                    url: $(form).attr('action'),
                    data: $(form).serialize() + "&lesson_id=",
                    success: function (result) {
                        // hidden of modal
                        $(modal).modal('hide');
                        // Show success message
                        Toast.fire({
                            icon: 'success',
                            title: 'Lesson deleted successfully!'
                        })
                        $('div.course-module'+modlue_id+'-lessons-wrapper').replaceWith(result);

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
                            title: 'An error occurred while deleting the lesson. Please try again!'
                        })
                    },
                });
        }
</script>