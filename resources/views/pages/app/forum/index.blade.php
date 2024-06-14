<x-layouts.app title="Forum">
    <div class="breadcrumb__area ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__title">Forum</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app.landing') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Forum</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        @auth
            @role('student')
                <a href="{{ route('app.forum.create') }}">
                    <button class="btn btn-primary">Buat Thread</button>
                </a>
            @endrole
        @else
        @endauth


        <div class="row">
            @foreach ($threads as $thread)
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('app.forum.show', $thread->id) }}">{{ $thread->title }}</a>
                            </h5>
                            <p class="card-text">{{ $thread->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>
