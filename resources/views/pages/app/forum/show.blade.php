<x-layouts.app title="Forum">
    <div class="breadcrumb__area ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__title">{{ $theard->title }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('app.landing') }}">Home</a></li>
                                <li class="breadcrumb-item "><a href="{{ route('app.forum.index') }}">Forum</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $theard->title }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset($theard->student->avatar) }}" alt="Avatar" width="100" height="100"
                            class="avatar">
                        <p class="card-text">{{ $theard->student->name }}</p>
                        <h5 class="card-title">{{ $theard->title }}</h5>
                        <p class="card-text">{{ $theard->content }}</p>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($theard->comments as $comment)
            <x-ui.app-comment :comment="$comment" />
        @endforeach

        <form action="{{ route('app.forum.comment', $theard->id) }}" method="POST" class="mt-3">
            @csrf
            <div class="form-group">
                <label for="content">Komentar</label>
                <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Kirim</button>
        </form>
    </div>
</x-layouts.app>
