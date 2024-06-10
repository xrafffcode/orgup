<x-layouts.app title="Org Up">
    <div class="hero">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-lg-7">
                    <div class="hero-content">
                        <h3 class="hero-title text-white mb-15">
                            Pengen Belajar Berorganisasi ?
                        </h3>
                        <p class="hero-subtitle text-white mb-30">
                            Temukan solusi untuk berorganisasimu di OrgUp
                        </p>
                        <a href="" class="btn btn-white btn-lg">
                            Mulai Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-img">
                        <img src="{{ asset('app/images/hero-img.png') }}" alt="hero" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popular__course__area pt---100 pb---100">
        <div class="container">
            <div class="react__title__section text-center">
                <h2 class="react__tittle">
                    Kelas Populer
                </h2>
            </div>
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-lg-3">
                        <div class="course__item mb-30">
                            <div class="course__thumb">
                                <a href="{{ route('app.course.show', $course->slug) }}">
                                    <img src="{{ asset($course->thumbnail) }}" alt="image"></a>
                            </div>
                            <div class="course__inner">
                                <ul>
                                    <li>{{ $course->instructor->name }}</li>
                                    <li>{{ $course->lessons->count() }} Pelajaran</li>
                                </ul>
                                <h3 class="react-course-title"><a
                                        href="{{ route('app.course.show', $course->slug) }}">{{ $course->title }}</a>
                                </h3>
                                <div class="course__card-icon d-flex align-items-center">
                                    <div class="react__user">
                                        Gratis
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="{{ route('app.course.index') }}" class="view-courses">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-arrow-right">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
