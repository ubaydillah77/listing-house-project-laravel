@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.dasboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Hero</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dasboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Hero</div>

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
                            <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="col-form-label">Background</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview background-preview" class="image-preview ">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="background" id="image-upload" />
                                            <input type="hidden" name="old_background" value="{{ @$hero->background }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ @$hero->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="sub_title">Sub Title</label>
                                    <textarea name="sub_title" class="form-control">{{ @$hero->sub_title }}</textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">
                                        Update
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
        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url({{ asset(@$hero->background) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            });

        });
    </script>
@endpush
