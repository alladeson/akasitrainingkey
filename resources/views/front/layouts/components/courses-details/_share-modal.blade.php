  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Course link</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="#">
                      <div class="contact-from-input mb-20">
                          <input type="text" value="{{ route('course', ['url_tag' => $course->url_tag]) }}">
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                    <div class="header-social">
                        <a>share via/on </a>
                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#shareMailModal"><i class="fa fa-envelope"></i></a></a>
                      <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('course', ['url_tag' => $course->url_tag]) }}"
                          target="_blank"><i class="fab fa-facebook-f"></i></a>
                      <a href="https://twitter.com/share?url={{ route('course', ['url_tag' => $course->url_tag]) }}&text={{ $course->name_en }}&via=Akasi_LearningK"
                          target="_blank"><i class="fab fa-twitter"></i></a>
                      <a href="https://linkedin.com/shareArticle?url={{ route('course', ['url_tag' => $course->url_tag]) }}&title={{ $course->name_en }}&summary={{ $course->description_en }}"
                          target="_blank"><i class="fab fa-linkedin"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </div>
