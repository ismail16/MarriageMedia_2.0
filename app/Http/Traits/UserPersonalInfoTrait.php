<?php

namespace App\Http\Traits;

use App\User;
use App\Models\PersonalInfo;


trait UserPersonalInfoTrait
{

    public function SaveUserPersonalInfo($request)
    {


        $this->validate($request, [
            'about_me_family' => 'required',
            'education_level' => 'required',
            'major_subject' => 'required',
            'my_profession' => 'required',
            'income' => 'required',
            'district' => 'nullable',
            'thana' => 'nullable',
            'country_of_residence' => 'nullable',
            'state_of_residence' => 'nullable',
            'citizenship' => 'nullable',
            'father_name' => 'required',
            'father_occupation' => 'required',
            'mother_name' => 'required',
            'mother_occupation' => 'required',
            'number_of_brother' => 'required',
            'how_many_brother_married' => 'required',
            'number_of_sister' => 'required',
            'how_many_sister_married' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'blood_group' => 'required',
            'hair_color' => 'required',
            'eye_color' => 'required',
            'skin_color' => 'required',
            'smoke_status' => 'required',
            'alcohol_status' => 'required',
            'disabilities_status' => 'required',
            'do_u_have_children' => 'required',
            'hear_about_us' => 'required',
            'diat_status' => 'required',
            'mother_tongue' => 'required',
        ]);

        $user = User::find($request->user_id);
        $PersonalInfo = new PersonalInfo;

        $PersonalInfo->user_id = $user->id;
        $PersonalInfo->about_me_family = $request->about_me_family;
        $PersonalInfo->education_level = $request->education_level;
        $PersonalInfo->major_subject = $request->major_subject;
        $PersonalInfo->my_profession = $request->my_profession;
        $PersonalInfo->job_title = $request->job_title;
        $PersonalInfo->job_company_name = $request->job_company_name;
        $PersonalInfo->income = $request->income;
        $PersonalInfo->district = $request->district;
        $PersonalInfo->thana = $request->thana;
        $PersonalInfo->zip_code = $request->zip_code;
        $PersonalInfo->country_of_residence = $request->country_of_residence;
        $PersonalInfo->state_of_residence = $request->state_of_residence;
        $PersonalInfo->citizenship = $request->citizenship;
        $PersonalInfo->father_name = $request->father_name;
        $PersonalInfo->father_occupation = $request->father_occupation;
        $PersonalInfo->mother_name = $request->mother_name;
        $PersonalInfo->mother_occupation = $request->mother_occupation;
        $PersonalInfo->number_of_brother = $request->number_of_brother;
        $PersonalInfo->how_many_brother_married = $request->how_many_brother_married;
        $PersonalInfo->number_of_sister = $request->number_of_sister;
        $PersonalInfo->how_many_sister_married = $request->how_many_sister_married;
        $PersonalInfo->height = $request->height;
        $PersonalInfo->weight = $request->weight;
        $PersonalInfo->blood_group = $request->blood_group;
        $PersonalInfo->hair_color = $request->hair_color;
        $PersonalInfo->eye_color = $request->eye_color;
        $PersonalInfo->skin_color = $request->skin_color;
        $PersonalInfo->smoke_status = $request->smoke_status;
        $PersonalInfo->alcohol_status = $request->alcohol_status;
        $PersonalInfo->disabilities_status = $request->disabilities_status;
        $PersonalInfo->do_u_have_children = $request->do_u_have_children;
        $PersonalInfo->hear_about_us = $request->hear_about_us;
        $PersonalInfo->diat_status = $request->diat_status;
        $PersonalInfo->mother_tongue = $request->mother_tongue;
        $PersonalInfo->can_speak = json_encode($request->can_speak);
        $PersonalInfo->status = 0;

        $PersonalInfo->save();
        // return redirect()->route('member.personal-info.index')->with('message','Personal Information Save Successfully.');
    }

    public function UpdateUserPersonalInfo($request, $id)
    {

        $this->validate($request, [
            'about_me_family' => 'required',
            'education_level' => 'required',
            'major_subject' => 'required',
            'my_profession' => 'required',
            'income' => 'required',
            'district' => 'nullable',
            'thana' => 'nullable',
            'country_of_residence' => 'nullable',
            'state_of_residence' => 'nullable',
            'citizenship' => 'nullable',
            'father_name' => 'required',
            'father_occupation' => 'required',
            'mother_name' => 'required',
            'mother_occupation' => 'required',
            'number_of_brother' => 'required',
            'how_many_brother_married' => 'required',
            'number_of_sister' => 'required',
            'how_many_sister_married' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'blood_group' => 'required',
            'hair_color' => 'required',
            'eye_color' => 'required',
            'skin_color' => 'required',
            'smoke_status' => 'required',
            'alcohol_status' => 'required',
            'disabilities_status' => 'required',
            'do_u_have_children' => 'required',
            'hear_about_us' => 'required',
            'diat_status' => 'required',
            'mother_tongue' => 'required',
        ]);

        $user = User::find($request->user_id);
        $PersonalInfo =  PersonalInfo::where('user_id', $user->id)->first();

        $PersonalInfo->user_id = $user->id;
        $PersonalInfo->about_me_family = $request->about_me_family;
        $PersonalInfo->education_level = $request->education_level;
        $PersonalInfo->major_subject = $request->major_subject;
        $PersonalInfo->my_profession = $request->my_profession;
        $PersonalInfo->job_title = $request->job_title;
        $PersonalInfo->job_company_name = $request->job_company_name;
        $PersonalInfo->income = $request->income;
        $PersonalInfo->district = $request->district;
        $PersonalInfo->thana = $request->thana;
        $PersonalInfo->zip_code = $request->zip_code;
        $PersonalInfo->country_of_residence = $request->country_of_residence;
        $PersonalInfo->state_of_residence = $request->state_of_residence;
        $PersonalInfo->citizenship = $request->citizenship;
        $PersonalInfo->father_name = $request->father_name;
        $PersonalInfo->father_occupation = $request->father_occupation;
        $PersonalInfo->mother_name = $request->mother_name;
        $PersonalInfo->mother_occupation = $request->mother_occupation;
        $PersonalInfo->number_of_brother = $request->number_of_brother;
        $PersonalInfo->how_many_brother_married = $request->how_many_brother_married;
        $PersonalInfo->number_of_sister = $request->number_of_sister;
        $PersonalInfo->how_many_sister_married = $request->how_many_sister_married;
        $PersonalInfo->height = $request->height;
        $PersonalInfo->weight = $request->weight;
        $PersonalInfo->blood_group = $request->blood_group;
        $PersonalInfo->hair_color = $request->hair_color;
        $PersonalInfo->eye_color = $request->eye_color;
        $PersonalInfo->skin_color = $request->skin_color;
        $PersonalInfo->smoke_status = $request->smoke_status;
        $PersonalInfo->alcohol_status = $request->alcohol_status;
        $PersonalInfo->disabilities_status = $request->disabilities_status;
        $PersonalInfo->do_u_have_children = $request->do_u_have_children;
        $PersonalInfo->hear_about_us = $request->hear_about_us;
        $PersonalInfo->diat_status = $request->diat_status;
        $PersonalInfo->mother_tongue = $request->mother_tongue;
        $PersonalInfo->can_speak = json_encode($request->can_speak);
        $PersonalInfo->status = 0;

        $PersonalInfo->save();
    }
}
