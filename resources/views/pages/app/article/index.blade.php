<x-layouts.app title="Artikel">

    <div class="breadcrumb__area ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__title">Artikel</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app.landing') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Artikel</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="react-blog-page pb---40 pt---110">
        <div class="container pb---70">
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-12 col-lg-4 col-md-6 col-sm-12">
                        <div class="single-blog">
                            <div class="inner-blog">
                                <div class="blog-img">
                                    <img src="{{ asset($article->thumbnail) }}" alt="Blog Image">
                                </div>
                                <div class="blog-content">

                                    <h3 class="blog-title">
                                        <a href="{{ route('app.article.show', $article->slug) }}">
                                            {{ $article->title }}
                                        </a>
                                    </h3>
                                    <p class="blog-desc">
                                        {{ $article->excerpt }}
                                    </p>
                                    <div class="button__sec">
                                        <a href="{{ route('app.article.show', $article->slug) }}" class="blog-btn">
                                            Lihat Artikel
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-arrow-right">
                                                <line x1="5" y1="12" x2="19" y2="12">
                                                </line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

</x-layouts.app>
