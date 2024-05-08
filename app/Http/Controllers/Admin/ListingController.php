<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ListingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ListingStoreRequest;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingAmenity;
use App\Models\Location;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

class ListingController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ListingDataTable $dataTable): View | JsonResponse
    {
        return $dataTable->render('admin.listing.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        $amenities = Amenity::all();
        return view('admin.listing.create', compact('categories', "locations", 'amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ListingStoreRequest $request): RedirectResponse
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
        $listing->is_approved = 1;


        $listing->save();

        foreach ($request->amenities as $amenityId) {
            $amenity = new ListingAmenity();
            $amenity->listing_id = $listing->id;
            $amenity->amenity_id = $amenityId;
            $amenity->save();
        }

        toastr()->success('created successfully!');

        return to_route('admin.listing.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $listing = Listing::findOrFail($id);
        $listingAmenities = ListingAmenity::where('listing_id', $listing->id)->pluck('amenity_id')->toArray();
        $categories = Category::all();
        $locations = Location::all();
        $amenities = Amenity::all();



        return view('admin.listing.edit', compact('listing', 'categories', 'locations', 'amenities', 'listingAmenities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $listing =  Listing::findOrFail($id);

        $imagePath = $this->UploadImage($request, 'image', $request->old_image);
        $thumbnailPath = $this->UploadImage($request, 'thumbnail_image', $request->old_thumbnail_image);
        $filePath = $this->UploadImage($request, 'file', $request->old_file);

        $listing->user_id = Auth::user()->id;
        $listing->package_id = 0;
        $listing->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $listing->thumbnail_image =  !empty($thumbnailPath) ? $thumbnailPath : $request->old_thumbnail_image;
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
        $listing->file = !empty($filePath) ? $filePath : $request->old_file;
        $listing->google_map_embed_code = $request->google_map_embed_code;
        $listing->description = $request->description;
        $listing->seo_title = $request->seo_title;
        $listing->seo_description = $request->seo_description;
        $listing->status = $request->status;
        $listing->is_verified = $request->is_verified;
        $listing->is_featured = $request->is_featured;
        $listing->expired_date = date('Y-m-d');
        $listing->is_approved = $request->is_approved;

        $listing->save();

        ListingAmenity::where('listing_id', $listing->id)->delete();
        foreach ($request->amenities as $amenityId) {
            $amenity = new ListingAmenity();
            $amenity->listing_id = $listing->id;
            $amenity->amenity_id = $amenityId;
            $amenity->save();
        }

        toastr()->success('update successfully!');

        return to_route('admin.listing.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Listing::findOrFail($id)->delete();
            return response(["status" => "success", "message" => "Delete item successfully!"]);
        } catch (\Exception $e) {
            logger($e);
            return response(["status" => "error", "message" => $e->getMessage()]);
        }
    }
}
