<x-layouts.dashboard-user title="Dashboard">
    <h3>Kelas Saya</h3>

    <div class="row">
        @foreach ($enrollments as $enrollment)
            <div class="col-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset($enrollment->thumbnail) }}" class="card-img-top" alt="{{ $enrollment->title }}">
                        <p class="card-title mt-3">{{ $enrollment->title }}</p>
                        <a href="{{ route('app.course.play', $enrollment->slug) }}" class="btn btn-primary w-100">
                            Mulai
                        </a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

</x-layouts.dashboard-user>
