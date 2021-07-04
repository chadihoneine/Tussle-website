<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImageUploadController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function imageUploadPost(Request $request)
    {
//        print_r($request->type);die();

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->type == 'account') {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/'), $imageName);
            TeamController::save_image($request, $imageName);
        } else {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/'), $imageName);
            AccountController::save_image($request, $imageName);
        }
        return back()->with('image/',$imageName);
    }
}
