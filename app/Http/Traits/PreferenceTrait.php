<?php

namespace App\Http\Traits;

use App\User;
use App\Models\Admin\Preference;


trait PreferenceTrait
{

    public function SavePreference($request)
    {

        $user = User::find($request->user_id);
        $preference = new Preference;
        $preference->user_id = $user->id;
        $preference->minAge = $request->minAge;
        $preference->maxAge = $request->maxAge;
        $preference->religion = $request->religion;
        $preference->family_status = json_encode($request->family_status);
        $preference->marital_status = json_encode($request->marital_status);
        $preference->allow_children = $request->allow_children;
        $preference->details_you_prefer = $request->details_you_prefer;

        $preference->minHeight = $request->minHeight;
        $preference->maxHeight = $request->maxHeight;
        $preference->minWeight = $request->minWeight;
        $preference->maxWeight = $request->maxWeight;
        $preference->blood_group = json_encode($request->blood_group);
        $preference->hair_color = $request->hair_color;
        $preference->eye_color = $request->eye_color;
        $preference->skin_color = json_encode($request->skin_color);
        $preference->disabilities_status = $request->disabilities_status;

        $preference->education_level = json_encode($request->education_level);
        $preference->subject = json_encode($request->subject);
        $preference->profession = json_encode($request->profession);

        $preference->country = json_encode($request->country);
        $preference->district = json_encode($request->district);
        $preference->citizenship = json_encode($request->citizenship);
        $preference->smoke_status = $request->smoke_status;
        $preference->alcohol_status = $request->alcohol_status;
        $preference->diat_status = $request->diat_status;
        $preference->language = json_encode($request->language);
        $preference->status = 0;
        $preference->save();
        // return $preference;
    }

    public function UpdatePreference($request, $id)
    {

        // return $request;

        $this->validate($request, [
            'minAge' => 'required',
            'maxAge' => 'required',
            'religion' => 'required',
            'family_status' => 'required',
            'marital_status' => 'required',
            'details_you_prefer' => 'required',
            'minHeight' => 'required',
            'maxHeight' => 'required',
            'minWeight' => 'required',
            'maxWeight' => 'required',
            'blood_group' => 'required',
            'hair_color' => 'required',
            'eye_color' => 'required',
            'skin_color' => 'required',
            'disabilities_status' => 'required',
            'education_level' => 'required',
            'subject' => 'required',
            'profession' => 'required',
            'country' => 'required',
            'district' => 'required',
            'citizenship' => 'required',
            'smoke_status' => 'required',
            'alcohol_status' => 'required',
            'diat_status' => 'required',
            'language' => 'required',
        ]);

        $preference =  Preference::find($request->preference_id);
        $preference->minAge = $request->minAge;
        $preference->maxAge = $request->maxAge;
        $preference->religion = $request->religion;
        $preference->family_status = json_encode($request->family_status);
        $preference->marital_status = json_encode($request->marital_status);
        $preference->allow_children = $request->allow_children;
        $preference->details_you_prefer = $request->details_you_prefer;

        $preference->minHeight = $request->minHeight;
        $preference->maxHeight = $request->maxHeight;
        $preference->minWeight = $request->minWeight;
        $preference->maxWeight = $request->maxWeight;
        $preference->blood_group = json_encode($request->blood_group);
        $preference->hair_color = $request->hair_color;
        $preference->eye_color = $request->eye_color;
        $preference->skin_color = json_encode($request->skin_color);
        $preference->disabilities_status = $request->disabilities_status;

        $preference->education_level = json_encode($request->education_level);
        $preference->subject = json_encode($request->subject);
        $preference->profession = json_encode($request->profession);

        $preference->country = json_encode($request->country);
        $preference->district = json_encode($request->district);
        $preference->citizenship = json_encode($request->citizenship);
        $preference->smoke_status = $request->smoke_status;
        $preference->alcohol_status = $request->alcohol_status;
        $preference->diat_status = $request->diat_status;
        $preference->language = $request->have_children;
        $preference->language = json_encode($request->language);

        $preference->save();
        return $preference;
    }
}
