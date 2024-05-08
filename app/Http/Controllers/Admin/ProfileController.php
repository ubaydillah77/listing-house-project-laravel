<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ProfileController extends Controller
{
    use FileUploadTrait;
    function index(): View
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Update data
        $avatarPath = $this->UploadImage($request, 'avatar', $request->old_avatar);
        $bannerPath = $this->UploadImage($request, 'banner', $request->old_banner);

        $user = Auth::user();
        $user->avatar = !empty($avatarPath) ? $avatarPath : $request->old_avatar;
        $user->banner = !empty($bannerPath) ? $bannerPath : $request->old_banner;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->about = $request->about;
        $user->website = $request->website;
        $user->fb_link = $request->fb_link;
        $user->x_link = $request->x_link;
        $user->in_link = $request->in_link;
        $user->wa_link = $request->wa_link;
        $user->ig_link = $request->ig_link;
        $user->save();

        toastr()->success('Updated Successfully!');
        return redirect()->back();
    }

    function updatePassword(Request $request): RedirectResponse
    {

        $request->validate([
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        $user = Auth::user();

        if (password_verify($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();


            toastr()->success('Updated Successfully');
        } else {
            toastr()->error('Old password is wrong!!!');
        }

        return redirect()->back();
    }
}
