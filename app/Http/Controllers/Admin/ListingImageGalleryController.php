<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingImageGallery;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListingImageGalleryController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $images = ListingImageGallery::where('listing_id', $request->id)->get();
        $listingTitle = Listing::select('title')->where('id', $request->id)->first();

        return view('admin.listing.listing-image-gallery.index', compact('images', 'listingTitle'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'images' => ['required'],
            'images.*' => ['image', 'max:3000']
        ], [
            'images.*.image' => 'One or more selected images are not valid!',
            'images.*.max' => 'One or more selected images are exceed maximum file size (3MB)',

        ]);

        $imagesPath = $this->UploadMultipleImage($request, 'images');

        foreach ($imagesPath as $path) {
            $image = new ListingImageGallery();
            $image->listing_id = $request->listing_id;
            $image->image = $path;
            $image->save();
        }

        toastr()->success('updated successfully!');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            $image = ListingImageGallery::findOrFail($id);
            $this->deleteFile($image->$image);
            $image->delete();

            return response(['status' => 'success', 'message' => 'deleted successfully!']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
