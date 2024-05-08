@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.listing-schedule.index', $schedule->id) }}" class="btn btn-icon"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Schedule</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dasboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.listing.index') }}">schedule</a></div>
                <div class="breadcrumb-item">Edit</div>

            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Schedule</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.listing-schedule.update', $schedule->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="day">Day <span class="text-danger">*</span></label>
                                    <select name="day" id="day" class="form-control select2" required>
                                        <option value="">Choose</option>
                                        @foreach (config('listing-schedule.days') as $day)
                                            <option @selected($day === $schedule->day) value="{{ $day }}">
                                                {{ $day }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Start Time</label>
                                        <input type="time" class="form-control" name="start_time"
                                            value={{ $schedule->start_time }} required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">End Time</label>
                                        <input type="time" class="form-control" name="end_time"
                                            value={{ $schedule->end_time }} required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status </label>
                                    <select name="status" id="status" class="form-control">
                                        <option @selected($schedule->status === 1) value="1">Active</option>
                                        <option @selected($schedule->status === 0) value="0">Inactive</option>
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
    </script>
@endpush
