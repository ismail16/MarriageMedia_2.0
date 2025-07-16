<?php

namespace App\Http\Traits;

use App\User;
use App\Models\UserProfileImage;
use Image;


trait UserProfileImageTrait
{

    public function SaveUserImage($request)
    {
        $this->validate($request, [
            'image' => 'required'
        ]);

        $user = User::find($request->user_id);
        $UserProfileImage = new UserProfileImage;

        $AllImages = UserProfileImage::where('user_id', $user->id)->get();
        if ($AllImages != "[]") {
            foreach ($AllImages as $img) {
                if ($img->profile_image == 1) {
                    $UserProfileImage->profile_image  = 0;
                    break;
                } else {
                    $UserProfileImage->profile_image  = 1;
                }
            }
        } else {
            $UserProfileImage->profile_image  = 1;
        }

        $UserProfileImage->user_id  = $user->id;
        $image = $request->file('image');
        if (isset($image)) {
            $slug = $user->first_name . '-' . $user->last_name . '-' . $user->id . '-' . rand(10, 100);
            $imagename = $slug . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('images/user_profile_image')) {
                mkdir('images/user_profile_image', 0777, true);
            }

            // Resize Image
            $img_resize = Image::make($image->getRealPath());
            $img_resize->resize(300, 300);
            $img_resize->insert(public_path('images/watermark.jpeg'), 'bottom-right', 0, 0);
            $img_resize->save(public_path('images/user_profile_image/') . $imagename);

            $UserProfileImage->image  = $imagename;
        }
        $UserProfileImage->image_slug  = $slug;
        $UserProfileImage->status  = $request->status;

        $UserProfileImage->save();
    }

    public function UpdateUserImage($request, $id)
    {


        $user = User::find($request->user_id);
        $UserProfileImage = UserProfileImage::find($id);
        $image = $request->file('image');

        if (isset($image)) {
            $slug = $user->first_name . '-' . $user->last_name . '-' . $user->id . '-' . rand(10, 100);
            if (file_exists('images/user_profile_image/' . $UserProfileImage->image)) {
                unlink('images/user_profile_image/' . $UserProfileImage->image);
            }
            $imagename = $slug . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('images/user_profile_image')) {
                mkdir('images/user_profile_image', 0777, true);
            }
            // Resize Image
            $img_resize = Image::make($image->getRealPath());
            $img_resize->resize(300, 300);
            $img_resize->insert(public_path('images/watermark.jpeg'), 'bottom-right', 0, 0);
            $img_resize->save(public_path('images/user_profile_image/') . $imagename);

            $UserProfileImage->image = $imagename;
            $UserProfileImage->image_slug  = $slug;
        }

        if ($request->profile_image == 1) {
            $allImg = UserProfileImage::where('user_id', $request->user_id)->get();
            foreach ($allImg as $img) {
                $img->profile_image = 0;
                $img->save();
            }
            $UserProfileImage->profile_image = $request->profile_image;
        }
        if ($request->profile_image == 0) {
            $allImg = UserProfileImage::where('user_id', $request->user_id)->get();
            foreach ($allImg as $img) {
                $img->profile_image = 0;
                $img->save();
            }
            $img = UserProfileImage::orderBy('id', 'ASC')->where('user_id', $request->user_id)->first();
            $img->profile_image = 1;
            $img->save();
            $UserProfileImage->profile_image = $request->profile_image;
        }

        $UserProfileImage->status  = $request->status;
        $UserProfileImage->save();
    }
}
