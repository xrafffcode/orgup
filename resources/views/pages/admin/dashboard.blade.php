<x-layouts.admin title="Dashboard">
    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </x-ui.breadcumb-admin>

    @role('admin')
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-3 mt-lg-0">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="information">
                            <h5 class="text-muted">Jumlah Student</h5>
                            <h4 class="mb-0">{{ \App\Models\Student::count() }}</h4>
                        </div>
                        <i class="fa fa-users text-orange icon-circle-medium"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-3 mt-lg-0">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="information">
                            <h5 class="text-muted">Jumlah Instruktur</h5>
                            <h4 class="mb-0">{{ \App\Models\Instructor::count() }}</h4>
                        </div>
                        <i class="fa fa-users text-orange icon-circle-medium"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-3 mt-lg-0">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="information">
                            <h5 class="text-muted">Jumlah Kelas</h5>
                            <h4 class="mb-0">{{ \App\Models\Course::count() }}</h4>
                        </div>
                        <i class="fa fa-book text-orange icon-circle-medium"></i>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-3 mt-lg-0">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="information">
                            <h5 class="text-muted">Jumlah Artikel</h5>
                            <h4 class="mb-0">{{ \App\Models\Article::count() }}</h4>
                        </div>
                        <i class="fa fa-book text-orange icon-circle-medium"></i>
                    </div>
                </div>
            </div>
        </div>
    @endrole

    @role('instructor')
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-3 mt-lg-0">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="information">
                            <h5 class="text-muted">Jumlah Kelas</h5>
                            <h4 class="mb-0">{{ \App\Models\Course::count() }}</h4>
                        </div>
                        <i class="fa fa-book text-orange icon-circle-medium"></i>
                    </div>
                </div>
            </div>
        </div>
    @endrole
</x-layouts.admin>
