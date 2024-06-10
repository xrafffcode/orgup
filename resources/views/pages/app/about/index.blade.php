<x-layouts.app title="Tentang OrgUp">

    <div class="breadcrumb__area ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__title">Tentang OrgUp</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app.landing') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Tentang OrgUp
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about__area about__area_one p-relative pt---100 pb---120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about__image">
                        <img src="https://www.niveshresearch.com/images/about-img.jpg" alt="About">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__content">
                        <h2 class="about__title">
                            Tentang OrgUp
                        </h2>
                        <p class="about__paragraph">
                            OrgUp menyediakan kursus gratis, artikel informatif, dan forum diskusi untuk membantu Anda
                            memahami dan menerapkan praktik pengelolaan organisasi yang efektif. Kami mencakup topik
                            seperti struktur organisasi, peran manajemen, pengambilan keputusan, komunikasi internal,
                            dan pengembangan kepemimpinan. Pelajari dari studi kasus nyata dan pengalaman organisasi
                            sukses, serta berinteraksi dengan komunitas yang bersemangat meningkatkan keterampilan
                            manajemen mereka. Bergabunglah dengan OrgUp dan tingkatkan kemampuan manajemen organisasi
                            Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="instructor__area pt---0 pb---110 text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="instructor__content instructor__content-one">
                        <div class="instructors_lefts">
                            <h6>
                                Instruktur Kami
                            </h6>
                            <h2>Berkenal dengan <br> Instruktur Kami</h2>
                        </div>
                    </div>
                </div>

                @foreach ($instructors as $instructor)
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="instructor__content">
                            <div class="instructor__content-1">
                                <img src="{{ $instructor->avatar }}" alt="course instructor picture">
                            </div>
                            <div class="instructor__content-2">
                                <h4>
                                    <a href="profile.html">{{ $instructor->name }}</a>
                                </h4>
                                <p>{{ $instructor->username }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>
