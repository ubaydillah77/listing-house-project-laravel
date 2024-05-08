@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">Create New Post</div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">Create New Post</h2>
            <p class="section-lead">
                On this page you can create a new post and fill in all fields.
            </p> --}}

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Profile</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group  ">
                                            <label
                                                class="col-form-label  text-md-left col-12 col-md-3 col-lg-3">Avatar</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div id="image-preview" class="image-preview avatar-preview">
                                                    <label for="image-upload" id="image-label">Choose File</label>
                                                    <input type="file" name="avatar" id="image-upload" />
                                                    <input type="hidden" name="old_avatar" value={{ $user->avatar }} />

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                class="col-form-label  text-md-left col-12 col-md-3 col-lg-3">Banner</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div id="image-preview-2" class="image-preview banner-preview">
                                                    <label for="image-upload-2" id="image-label-2">Choose File</label>
                                                    <input type="file" name="banner" id="image-upload-2" />
                                                    <input type="hidden" name="old_banner" value={{ $user->banner }} />

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $user->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="col-form-label">Email <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $user->email }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone" class="col-form-label">Phone <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ $user->phone }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address" class="col-form-label">Address <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $user->address }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="about" class="col-form-label">About <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="about" class="form-control" required>{{ $user->about }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="website" class="col-form-label">website</label>
                                            <input type="text" class="form-control" name="website"
                                                value="{{ $user->website }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fb_link" class="col-form-label">Facebook</label>
                                            <input type="text" class="form-control" name="fb_link"
                                                value="{{ $user->fb_link }}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="x_link" class="col-form-label">Twitter</label>
                                            <input type="text" class="form-control" name="x_link"
                                                value="{{ $user->x_link }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="in_link" class="col-form-label">Linkedin</label>
                                            <input type="text" class="form-control" name="in_link"
                                                value="{{ $user->in_link }}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="wa_link" class="col-form-label">Whatsapp</label>
                                            <input type="text" class="form-control" name="wa_link"
                                                value="{{ $user->wa_link }}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ig_link" class="col-form-label">Instagram</label>
                                            <input type="text" class="form-control" name="ig_link"
                                                value="{{ $user->ig_link }}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.profile-password.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password" class="col-form-label">Old Password <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="old_password" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password" class="col-form-label">New Password <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password" class="col-form-label">Confirm Password <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Update</button>

                                    </div>
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
            $('.avatar-preview').css({
                'background-image': 'url({{ asset($user->avatar) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            });

            $('.banner-preview').css({
                'background-image': 'url({{ asset($user->banner) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            });
        });

        // Custom if we have 2 image upload
        $.uploadPreview({
            input_field: "#image-upload-2", // Default: .image-upload
            preview_box: "#image-preview-2", // Default: .image-preview
            label_field: "#image-label-2", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
@endpush
