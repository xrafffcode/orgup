<x-layouts.admin title="Tambah Artikel">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.article.index') }}">Artikel</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Artikel</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        @if ($errors->any())
            <div class="col-md-12 grid-margin">
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Tambah Artikel</h4>
                </x-slot>
                <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <x-forms.input label="Title" name="title" id="title" />
                    <x-forms.input label="Thumbnail" name="thumbnail" id="thumbnail" type="file" />

                    <x-forms.mde label="Content" name="content" id="content" />

                    <x-forms.input label="Slug" name="slug" id="slug" />


                    <x-ui.base-button color="primary" type="submit">Simpan</x-ui.base-button>
                    <x-ui.base-button color="danger" href="{{ route('admin.article.index') }}">
                        Kembali
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>

    @push('custom-scripts')
        <script>
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');

            title.addEventListener('keyup', function() {
                const titleValue = title.value;
                slug.value = titleValue.toLowerCase().split(' ').join('-');
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
    @endpush

</x-layouts.admin>
