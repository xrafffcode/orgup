<x-layouts.admin title="Edit Permission">
    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item "><a href="{{ route('admin.permission.index') }}">Permission</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Edit Permission</h6>
                </x-slot>
                <form action="{{ route('admin.permission.update', $permission->id) }}" method="POST" enctype="multipart/form-data"
                    id="form">
                    @csrf
                    @method('PUT')

                    <x-forms.input label="Nama Permission" name="name" value="{{ $permission->name }}" required />


                    <x-ui.base-button color="danger" href="{{ route('admin.permission.index') }}">
                        Kembali
                    </x-ui.base-button>

                    <x-ui.base-button color="primary" type="submit">
                        Update Permission
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
