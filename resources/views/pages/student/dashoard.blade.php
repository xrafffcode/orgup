<x-layouts.dashboard-user title="Dashboard">
    <div class="row">
        <div class="col-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">

                        <div>
                            <h5 class="card-title mb-0">Kelas Terdaftar</h5>
                            <p class="card-text">
                                {{ Auth::user()->student->enrollments->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard-user>
