<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\AgentListingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AgentListingStoreRequest;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingAmenity;
use App\Models\Location;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

class AgentListingController extends Controller


{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(AgentListingDataTable $dataTable): View | JsonResponse
    {
        return $dataTable->render('frontend.dashboard.listing.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        $locations = Location::all();
        $amenities = Amenity::all();
        return view('frontend.dashboard.listing.create', compact('categories', "locations", 'amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentListingStoreRequest $request)
    {
        // dd($request->all());
        $imagePath = $this->UploadImage($request, 'image');
        $thumbnailPath = $this->UploadImage($request, 'thumbnail_image');
        $filePath = $this->UploadImage($request, 'file');

        $listing = new Listing();
        $listing->user_id = Auth::user()->id;
        $listing->package_id = 0;
        $listing->image = $imagePath;
        $listing->thumbnail_image = $thumbnailPath;
        $listing->title = $request->title;
        $listing->slug = Str::slug($request->title);
        $listing->category_id = $request->category;
        $listing->location_id = $request->location;
        $listing->address = $request->address;
        $listing->phone = $request->phone;
        $listing->email = $request->email;
        $listing->website = $request->website;
        $listing->facebook_link = $request->facebook_link;
        $listing->twitter_link = $request->twitter_link;
        $listing->linkedin_link = $request->linkedin_link;
        $listing->whatsapp_link = $request->whatsapp_link;
        $listing->file = $filePath;
        $listing->google_map_embed_code = $request->google_map_embed_code;
        $listing->description = $request->description;
        $listing->seo_title = $request->seo_title;
        $listing->seo_description = $request->seo_description;
        $listing->status = $request->status;
        $listing->is_verified = $request->is_verified;
        $listing->is_featured = $request->is_featured;
        $listing->expired_date = date('Y-m-d');

        $listing->save();

        foreach ($request->amenities as $amenityId) {
            $amenity = new ListingAmenity();
            $amenity->listing_id = $listing->id;
            $amenity->amenity_id = $amenityId;
            $amenity->save();
        }

        toastr()->success('created successfully!');

        return to_route('user.listing.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
