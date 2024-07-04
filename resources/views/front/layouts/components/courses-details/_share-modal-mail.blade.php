  <!-- Modal -->
  <div class="modal fade" id="shareMailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form action="#" id="share-mail-form" onsubmit="shareCourseLinkViaMail(event)">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Please enter sharing email(s)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="contact-from-input mb-20">
                        <input type="email" multiple required name="mails" data-course-id="{{$course->id}}" value="" placeholder="Enter mail / mails (separate with coma)">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dismiss</button>
                    <button type="submit" class="btn btn-primary share-btn-modal has-spinner">Send</button>
                </div>
            </div>
        </div>
    </form>
</div>
