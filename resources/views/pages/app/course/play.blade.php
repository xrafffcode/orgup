<x-layouts.play title="{{ $course->title }}">
    <div class="row">
        <div class="col-12 col-lg-3 col-md-3 col-sm-12">
            <div class="card rounded-5 shadow-sm">
                <div class="card-body border-0 shadow-sm p-3">
                    <h5 class="card-title">{{ $course->title }}</h5>
                    @foreach ($course->lessons as $lesson)
                        <div class="card mt-3 w-100 lesson-card {{ $lesson->video === $course->lessons[0]->video ? 'active' : '' }}" " data-video="{{ $lesson->video }}"
                            data-lesson-id="{{ $lesson->id }}">
                            <div
                                class="card-body border-0 shadow-sm p-3 d-flex align-items-center justify-content-between {{ $lesson->video === $course->lessons[0]->video ? 'active' : '' }}">
                                <h5 class="card-title">{{ $lesson->title }}</h5>
                                <p class="card-text">{{ $lesson->duration ?? '0:00' }}</p>
                            </div>
                        </div>
 @endforeach
                        </div>
                </div>
            </div>



            <div class="col-12 col-lg-9 col-md-9 col-sm-12 mt-5 mt-lg-0">
                <div class="video-container mb-45" id="player">
                    <iframe src="https://www.youtube.com/embed/{{ $course->lessons[0]->video }}" allowfullscreen=""
                        allowtransparency="" allow="autoplay" frameborder="0" id="video"
                        data-gtm-yt-inspected-5="true" title="YouTube video player"></iframe>
                </div>
            </div>

        </div>

        @push('script')
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Load first video
                    var firstLessonVideo = $(".lesson-card:first").data("video");

                    $("#video").attr("src", "https://www.youtube.com/embed/" + firstLessonVideo);

                    // Change video
                    $(".lesson-card").click(function() {
                        var lessonVideo = $(this).data("video");
                        $("#video").attr("src", "https://www.youtube.com/embed/" + lessonVideo);

                        // Remove active class from all cards
                        $(".lesson-card").removeClass("active");

                        // Add active class to clicked card
                        $(this).addClass("active");
                    });
                });
            </script>
        @endpush
</x-layouts.play>
