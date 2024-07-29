<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AlbumController extends Controller
{
    //
    public function showAlbum(){
        $user = Auth::user();
        $albums = Album::where('user_id',$user->id)->get();
        if($user){
            return view('albums',['user'=>$user,'albums'=>$albums]);
        }
    }

    public function addAlbum(Request $request){
        $user = Auth::user();
        $album = Album::create([
            'title'=>$request->title,
            'user_id'=>$user->id,
            'status'=>$request->status,
            'thumbnail_url'=>''
        ]);
        if($album){
            return redirect('Album');
        }else{
            return redirect('');
        }

    }
    public function showManageAlbum($album_id){
        $user = Auth::user();
        if($user){
            $albums = Album::find($album_id);
            
            return view('manage-albums', ['user' => $user, 'albums' => $albums]);   
        }
        
    }


    
}


