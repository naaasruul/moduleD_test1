<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    //
    public function showGallery(){
        $user = Auth::user();
        if($user){
            return view('gallery',['user'=>$user]);
        }else{
            return redirect('');
        }
    }

    public function uploadPhoto(Request $request,$album_id){
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $manager = new ImageManager(new Driver);
            $image = $manager->read($request->file);

            if($image->width() > 600){
                $image->resize(width:600);
            }

            if($image->height() > 600){
                $image->resize(height:600);
            }

            $image->save(storage_path('/app/public/uploads/'.$filename));

            Photo::create([
                'url'=>'uploads/'.$filename,
                'status'=>0,
                'album_id'=>$album_id
            ]);

            return response()->json([
                'success'=> true,
                'url'=>'/storage/uploads/'.$filename
            ]);
            

            }


        }
    }


