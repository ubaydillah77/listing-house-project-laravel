@extends('frontend.layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">

    <style>
        label {
            margin-top: 15px;
        }
    </style>
@endpush

@section('contents')
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="my_listing">
                            <h4 class="d-flex justify-content-between">My Listing


                            </h4>
                            <form action="{{ route('user.listing.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Image</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image" id="image-upload" />

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Thumbnail Image</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview-2" class="image-preview">
                                                <label for="image-upload-2" id="image-label">Choose File</label>
                                                <input type="file" name="thumbnail_image" id="image-upload-2" />

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <select name="category" id="category_id" class="form-control">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">Location </label>
                                            <select name="location" id="location" class="form-control">
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ old('address') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="website">Website <span class="text-danger"></span></label>
                                            <input type="text" class="form-control" name="website"
                                                value="{{ old('website') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="facebook_link">Facebook_link <span
                                                    class="text-danger"></span></label>
                                            <input type="text" class="form-control" name="facebook_link"
                                                value="{{ old('facebook_link') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="twitter_link">Twitter_link <span class="text-danger"></span></label>
                                            <input type="text" class="form-control" name="twitter_link"
                                                value="{{ old('twitter_link') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="linkedin_link">Linkedin_link <span
                                                    class="text-danger"></span></label>
                                            <input type="text" class="form-control" name="linkedin_link"
                                                value="{{ old('linkedin_link') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="whatsapp_link">Whatsapp_link <span
                                                    class="text-danger"></span></label>
                                            <input type="text" class="form-control" name="whatsapp_link"
                                                value="{{ old('whatsapp_link') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="file">Attachment <span class="text-danger"></span></label>
                                            <input type="file" class="form-control" name="file"
                                                value="{{ old('file') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Amenities <span class="text-danger"></span></label>
                                    <select name="amenities[]" class="form-control select_2" multiple="">
                                        @foreach ($amenities as $amenity)
                                            <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="summernote">{{ old('description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="google_map_embed_code">Google Map Embed Code <span
                                            class="text-danger"></span></label>
                                    <textarea name="google_map_embed_code" class="form-control">{{ old('google_map_embed_code') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="seo_title">Seo Title <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="seo_title"
                                        value="{{ old('seo_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="seo_description">Seo Description <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="seo_description"
                                        value="{{ old('seo_description') }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="is_featured">Is Featured </label>
                                            <select name="is_featured" id="is_featured" class="form-control">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="is_verified">Is Verified </label>
                                            <select name="is_verified" id="is_verified" class="form-control">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status </label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 mt-3">
                                    <button class="read_btn" type="submit">Create</button>
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
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".summernote").summernote({
                dialogsInBody: true,
                minHeight: 250,
            });
        });


        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
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
