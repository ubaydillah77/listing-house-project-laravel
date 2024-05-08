@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.listing.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Update Listing</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dasboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.listing.index') }}">Listing</a></div>
                <div class="breadcrumb-item">Update</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Listing</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.listing.update', $listing->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Image</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview ">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image" id="image-upload" />
                                                <input type="hidden" name="old_image" value="{{ $listing->image }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Thumbnail Image</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview-2" class="image-preview thumbnail-preview">
                                                <label for="image-upload-2" id="image-label">Choose File</label>
                                                <input type="file" name="thumbnail_image" id="image-upload-2" />
                                                <input type="hidden" name="old_thumbnail_image"
                                                    value="{{ $listing->thumbnail_image }}" />

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
                                                    <option @selected($category->id === $listing->category_id) value="{{ $category->id }}">
                                                        {{ $category->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">Location </label>
                                            <select name="location" id="location" class="form-control">
                                                @foreach ($locations as $location)
                                                    <option @selected($location->id === $listing->location_id) value="{{ $location->id }}">
                                                        {{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $listing->title }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ $listing->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $listing->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $listing->address }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="website">Website <span class="text-danger"></span></label>
                                            <input type="text" class="form-control" name="website"
                                                value="{{ $listing->website }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="facebook_link">Facebook_link <span
                                                    class="text-danger"></span></label>
                                            <input type="text" class="form-control" name="facebook_link"
                                                value="{{ $listing->facebook_link }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="twitter_link">Twitter_link <span
                                                    class="text-danger"></span></label>
                                            <input type="text" class="form-control" name="twitter_link"
                                                value="{{ $listing->twitter_link }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="linkedin_link">Linkedin_link <span
                                                    class="text-danger"></span></label>
                                            <input type="text" class="form-control" name="linkedin_link"
                                                value="{{ $listing->linkedin_link }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="whatsapp_link">Whatsapp_link <span
                                                    class="text-danger"></span></label>
                                            <input type="text" class="form-control" name="whatsapp_link"
                                                value="{{ $listing->whatsapp_link }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        @if ($listing->file)
                                            <div>
                                                <i class="fas fa-file-alt " style="font-size: 60px;"></i>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="file">Attachment <span class="text-danger"></span></label>
                                            <input type="file" class="form-control" name="file"
                                                value="{{ old('file') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Amenities <span class="text-danger"></span></label>
                                    <select name="amenities[]" multiple="" value="[3]"
                                        class="form-control select2" multiple="">
                                        @foreach ($amenities as $amenity)
                                            <option value="{{ $amenity->id }}">
                                                {{ $amenity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="summernote">{!! $listing->description !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="google_map_embed_code">Google Map Embed Code <span
                                            class="text-danger"></span></label>
                                    <textarea name="google_map_embed_code" class="form-control">{!! $listing->google_map_embed_code !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="seo_title">Seo Title <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="seo_title"
                                        value="{{ $listing->seo_title }}">
                                </div>

                                <div class="form-group">
                                    <label for="seo_description">Seo Description <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="seo_description"
                                        value="{{ $listing->seo_description }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="is_featured">Is Featured </label>
                                            <select name="is_featured" id="is_featured" class="form-control">
                                                <option @selected($listing->is_featured === 0) value="0">No</option>
                                                <option @selected($listing->is_featured === 1) value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="is_verified">Is Verified </label>
                                            <select name="is_verified" id="is_verified" class="form-control">
                                                <option @selected($listing->is_verified === 0) value="0">No</option>
                                                <option @selected($listing->is_verified === 1) value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="status">Status </label>
                                            <select name="status" id="status" class="form-control">
                                                <option @selected($listing->status === 1) value="1">Active</option>
                                                <option @selected($listing->status === 0) value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="is_approved">Is Approved </label>
                                            <select name="is_approved" id="is_approved" class="form-control">
                                                <option @selected($listing->is_approved === 1) value="1">Active</option>
                                                <option @selected($listing->is_approved === 0) value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

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
        var listingAmenities = {!! json_encode($listingAmenities) !!};
        $('.select2').select2().val(listingAmenities).trigger("change");
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
            $('.image-preview').css({
                'background-image': 'url({{ asset($listing->image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            });

            $('.thumbnail-preview').css({
                'background-image': 'url({{ asset($listing->thumbnail_image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            });
        });
    </script>
@endpush
