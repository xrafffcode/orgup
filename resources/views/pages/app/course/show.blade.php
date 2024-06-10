<x-layouts.app title="{{ $course->title }}">

    <div class="breadcrumb__area position-relative"
        style="background-image: url({{ asset($course->thumbnail) }}); padding-top: 150px; padding-bottom: 150px; background-repeat: no-repeat; background-size: cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content" style="z-index: 100; position: relative;">
                        <h1 class="breadcrumb__title">
                            {{ $course->title }}
                        </h1>
                        <ul class="user-section">
                            <li class="user">
                                <span><img src="{{ asset($course->instructor->avatar) }}" alt="User"></span>
                                <span>
                                    {{ $course->instructor->name }}
                                </span>
                            </li>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                {{ $course->lessons->count() }} Pembelajaran
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="back__course__page_grid react-courses__single-page pb---16 pt---110">
        <div class="container pb---70">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course-single-tab">
                        <ul class="nav nav-tabs" id="back-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="discriptions" data-bs-toggle="tab" href="#discription"
                                    role="tab" aria-controls="discription" aria-selected="true">Deskripsi</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="curriculums" data-bs-toggle="tab" href="#curriculum"
                                    role="tab" aria-controls="curriculum" aria-selected="false">Pembelajaran</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="reviewss" data-bs-toggle="tab" href="#reviews" role="tab"
                                    aria-controls="reviews" aria-selected="false">Reviews</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="back-tab-content">
                            <div class="tab-pane fade show active" id="discription" role="tabpanel"
                                aria-labelledby="discription">
                                {!! $course->description !!}
                            </div>
                            <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum">
                                <h3>Pembelajaran</h3>

                                @foreach ($course->lessons as $lesson)
                                    <div class="card mt-3 w-100">
                                        <div
                                            class="card-body border-0 shadow-sm p-3 d-flex align-items-center justify-content-between">
                                            <h5 class="card-title">{{ $lesson->title }}</h5>
                                            <p class="card-text">{{ $lesson->duration ?? '0:00' }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews">
                                <h3>Reviews</h3>
                                <a href="#" class="post-author">
                                    <div class="avatar">
                                        <img src="https://ui-avatars.com/api/?name=Natasha+Pawel&color=7F9CF5&background=EBF4FF"
                                            alt="user">
                                    </div>
                                    <div class="info">
                                        <div class="back-ratings">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                        </div>
                                        <h4 class="name">
                                            Natasha Pawel
                                            <span class="designation">
                                                20 Januari 2023
                                            </span>
                                        </h4>
                                        <p>
                                            Kursus ini sangat membantu bagi para pemula yang ingin memulai belajar
                                            berorgranisasi,
                                            karena materi yang dipelajari sangat lengkap.
                                        </p>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4 md-mt-60">
                    <div class="react-sidebar react-back-course2 ml----30">
                        <div class="widget get-back-course">
                            <ul class="price">
                                <li>Gratis</li>
                            </ul>
                            <ul class="price__course">
                                <li>
                                    Instruktur <b>{{ $course->instructor->name }}</b>
                                </li>
                                <li>Duration <b>{{ $course->lessons->sum('duration') ?? '0:00' }}</b></li>
                                <li>
                                    Pembelajaran <b>{{ $course->lessons->count() }} Video </b>
                                    </b>
                            </ul>


                            @auth
                                @role('student')
                                    @if (Auth::user()->student->isEnrolled($course->id))
                                        <a href="{{ route('app.course.play', $course->slug) }}" class="start-btn">
                                            Lihat Kelas
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-arrow-right">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </a>
                                    @else
                                        <a href="{{ route('app.course.enroll', $course->slug) }}" class="start-btn"
                                            onclick="event.preventDefault(); document.getElementById('enroll-form').submit();">
                                            <form id="enroll-form" action="{{ route('app.course.enroll', $course->slug) }}"
                                                method="POST" class="d-none">
                                                @csrf
                                            </form>
                                            Daftar Kelas
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-arrow-right">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </a>
                                    @endif
                                @endrole
                            @else
                                <a href="{{ route('login') }}" class="start-btn">
                                    Masuk Untuk Mendaftar Kelas
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-arrow-right">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
