<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tblMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class TblMediaController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function listview(){
        $path = env("PATH_IMAGE");
        return view("admin.Media.list",['posts'=>json_decode(tblMedia::all(), true)])->with('path', $path);
    }

    public function getDelete(tblMedia $image){
        try
        {
            // return $image;
            File::delete(public_path('images').'/'.($image->name));
            $image->delete();
            Session::flash('flash_success','Xóa thành công.');
        } catch (\Exception $e){
            Session::flash('flash_err','Xóa thất bại.');
        }
        return redirect()->route('admin.media-list');
    }

    public function imageUpload()
    {
        return view('admin.Media.add');
    }

    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images/cauhoi/'), $imageName);

        /* Store $imageName name in DATABASE from HERE */
        $image =new tblMedia;
        $image->name = $imageName;
        $image->note = $request->note;
        $image->save();
        $imagepath = env("PATH_IMAGE").$imageName;


        return back()
            ->with('success','Đã upload thành công.')
            ->with('image',$imageName)
            ->with('path', $imagepath);
    }

    public function imageUploadEditorPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images/cauhoi/'), $imageName);

        /* Store $imageName name in DATABASE from HERE */
        $image =new tblMedia;
        $image->name = $imageName;
        $image->save();
        $imagepath = env("PATH_IMAGE").$imageName;

        echo json_encode([
            'default' => asset($imagepath),
            '500' => asset($imagepath)
        ]);

//        return back()
//            ->with('success','Đã upload thành công.')
//            ->with('image',$imageName)
//            ->with('path', $imagepath);
    }
}
