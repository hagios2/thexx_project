<?php

namespace App\Http\Controllers;

use App\Models\model_galleries;
use App\Models\User;
use App\Models\user_detail;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Http\Controllers\BuyTokenController;

class AccountModelUpdateController extends Controller
{
    public function updateAccountPart1(Request $request)
    {

        $id = User::find(Auth::user()->id)->id;

        $user_detail = user_detail::where('user_id', $id)
            ->update([
                'gender' => $request->gender,
                'country' => $request->country,
            ]);

        if ($request->password != '') {

            $user = User::where('id', $id)
                ->update([
                    'password' => Hash::make($request->password),
                ]);

            Auth::logout();
            $request->session()->flush();
            return response()->json(['success' => 'yes']);
        } 
        else {
            return response()->json(['success' => 'yes_pwd_empty']);
        }
    }

    public function updateAccountPart2(Request $request)
    {

        $id = User::find(Auth::user()->id)->id;

        $user_detail = user_detail::where('user_id', $id)
            ->update([
                'camera_man_name' => $request->camera_name,
                'categories' => $request->categories,
                'performs' => $request->performs,
                'languages' => $request->languages,
                'tags' => $request->tags,
                'eye_color' => $request->eye_color,
                'hair_length' => $request->hair_length,
                'hair_color' => $request->hair_color,
                'figure' => $request->figure,
                'sexual_preference' => $request->sexual_preference,
                'chest_size' => $request->chest_size,
            ]);

        return response()->json(['success' => 'yes']);
    }

    public function updateAccountPart3(Request $request)
    {

        $id = User::find(Auth::user()->id)->id;

        $user_detail = user_detail::where('user_id', $id)
            ->update([
                'sex_toy_id' => $request->sex_toy_id,
                'model_description' => $request->model_description,
            ]);

        return response()->json(['success' => 'yes']);
    }

    public function savePhoto(Request $request)
    {

        $check = $this->checkForLimit();
        if ($check == 2) {
            return response()->json(['photo_limit_exceeded' => 'yes']);
        }

        $token = substr(str_shuffle("0123456789"), 0, 8);

        $id = User::find(Auth::user()->id)->id;
        $name = User::find(Auth::user()->id)->name;
        $fileNameToStore = '';

        $validation = Validator::make($request->all(), [
            'photo_file' => 'required|mimes:jpeg,jpg,png|max:5000',
        ]);

        if ($validation->passes()) {

            $model_gallery = new model_galleries();
            $path = public_path() . '/uploads/Model_Gallery';
         
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $extension = $request->file('photo_file')->getClientOriginalExtension();
            $filename = str_replace(" ", "_", $name);
            $fileNameToStore = $filename . '_' . $token . '.' . $extension;

            $request->file('photo_file')->move(public_path('uploads/Model_Gallery'), $fileNameToStore);
        } 
        
        else {
            return response()->json([
                'message' => $validation->errors()->all(),
            ]);
        }

        $model_gallery->model_id = $id;
        $model_gallery->image_path = $fileNameToStore;
        $model_gallery->save();

        $path_here = config('env_variables.upload_path') . 'Model_Gallery';
        $image_path = $path_here . '\\' . $fileNameToStore;

        return response()->json([
            'success' => 'yes',
            'image_url' => $image_path,
            'name' => $name,
            'image_id' => $model_gallery->id
        ]);
    }

    public function checkForLimit()
    {
        $id = Auth::user()->id;
        $count = model_galleries::where('model_id', $id)->get()->count();

        if ($count > 9) {
            return 2;
        } 
        else {
            return 1;
        }
    }

    public function deletePhoto(Request $request)
    {   
        $deleted_id = model_galleries::where('id', $request->image_id)
            ->delete();

        return response()->json(['success' => 'yes']);
    }
}
