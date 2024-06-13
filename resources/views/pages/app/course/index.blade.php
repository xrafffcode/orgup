<x-layouts.app title="Kelas">

    <div class="breadcrumb__area ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__title">Kelas</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app.landing') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kelas</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="react-course-filter back__course__page_grid pb---40 pt---110">
        <div class="container pb---70">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="single-studies col-12 col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-course">
                            <div class="case-img">
                                <img src="{{ asset($course->thumbnail) }}" alt="Course Image">
                            </div>
                            <div class="case-content">
                                <h4 class="case-title">
                                    <a href="{{ route('app.course.show', $course->slug) }}">
                                        {{ $course->title }}
                                    </a>
                                </h4>
                                <ul class="meta-course">
                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">
                                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z">
                                            </path>
                                        </svg>
                                        {{ $course->lessons->count() }} Pembelajaran
                                    </li>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        {{ $course->instructor->name }}
                                    </li>
                                </ul>

                                <ul class="react-ratings">
                                    <li class="react-book"> <em>4.5</em>
                                        <span class="icon_star"></span>
                                        <span class="icon_star"></span>
                                        <span class="icon_star"></span>
                                        (101)
                                    </li>

                                    <li class="price">
                                        Gratis
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-layouts.app>
