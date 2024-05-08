@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.category.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dasboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.category.index') }}">Category</a></div>
                <div class="breadcrumb-item">Edit</div>

            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Hero</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.category.update', $category->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="form-group">
                                    <label for="name">name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>Icon Image</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div id="image-preview" class="image-preview icon-preview">
                                                    <label for="image-upload" id="image-label">Choose File</label>
                                                    <input type="file" name="icon_image" id="image-upload" />
                                                    <input type="hidden" name="old_icon"
                                                        value="{{ $category->icon_image }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>Background Image</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div id="image-preview-2" class="image-preview background-preview">
                                                    <label for="image-upload-2" id="image-label">Choose File</label>
                                                    <input type="file" name="background_image" id="image-upload-2" />
                                                    <input type="hidden" name="old_background"
                                                        value="{{ $category->background_image }}" />

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="show_at_home">Show at Home</label>
                                    <select name="show_at_home" id="show_at_home" class="form-control">
                                        <option @selected($category->show_at_home === 0) value="0">No</option>
                                        <option @selected($category->show_at_home === 1) value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status </label>
                                    <select name="status" id="status" class="form-control">
                                        <option @selected($category->status === 1) value="1">Active</option>
                                        <option @selected($category->status === 0) value="0">Inactive</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <button class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $.uploadPreview({
            input_field: "#image-upload-2", // Default: .image-upload
            preview_box: "#image-preview-2", // Default: .image-preview
            label_field: "#image-label-2", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $(document).ready(function() {
            $('.icon-preview').css({
                'background-image': 'url({{ asset($category->icon_image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            });

            $('.background-preview').css({
                'background-image': 'url({{ asset($category->background_image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            });
        });
    </script>
@endpush
