<x-layouts.app title="Tambah Topik">

    @push('style')
        <style>
            .react-contact-page .react-blog-form {
                padding-left: 0px !important;
            }
        </style>
    @endpush

    <div class="breadcrumb__area ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__title">Forum</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app.landing') }}">Home</a></li>
                                <li class="breadcrumb-item ">Forum</li>
                                <li class="breadcrumb-item active" aria-current="page">Buat Topik</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="react-contact-page">
            <div class="react-blog-form">
                <div id="blog-form" class="blog-form">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form id="contact-form" method="POST" action="{{ route('app.forum.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="back-input">
                                    <input id="title" type="text" name="title" placeholder="Judul">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="back-textarea">
                                    <textarea id="content" name="content" placeholder="Isi"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="back-btn">Buat Topik<svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-arrow-right">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>
