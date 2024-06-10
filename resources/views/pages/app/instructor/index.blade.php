<x-layouts.app title="Instruktur">

    <div class="breadcrumb__area ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__title">Instruktur</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app.landing') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Instruktur</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="instructors___page pt---120 pb---140">
        <div class="container pb---60">
            <div class="row">
                @foreach ($instructors as $instructor)
                    <div class="col-lg-3">
                        <div class="instructor__content">
                            <div class="instructor__image">
                                <img src="{{ $instructor->avatar }}" alt="course instructor">
                                <div class="content__hover">
                                    <p>{{ $instructor->description }}</p>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <h4><a href="#">{{ $instructor->name }}</a></h4>
                                <p>{{ $instructor->username }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>
