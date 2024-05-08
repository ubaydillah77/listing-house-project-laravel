<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingVideoGallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListingVideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $videos = ListingVideoGallery::where('listing_id', $request->id)->get();
        $listingTitle = Listing::select('title')->where('id', $request->id)->first();
        return view('admin.listing.listing-video-gallery.index', compact('videos', 'listingTitle'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'video_url' => ['required', 'url'],
            'listing_id' => ['required']
        ]);

        $video = new ListingVideoGallery();
        $video->listing_id = $request->listing_id;
        $video->video_url = $request->video_url;
        $video->save();

        toastr()->success('created successfully!');

        return redirect()->back();
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            $video = ListingVideoGallery::findOrFail($id);
            $video->delete();

            return response(['status' => "success", "message" => " Deleted successfully"]);
        } catch (\Exception $e) {
            logger($e);
            return response([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
