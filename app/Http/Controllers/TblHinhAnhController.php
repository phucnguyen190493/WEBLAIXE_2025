<?php

namespace App\Http\Controllers;

use App\Models\tblCauHoi;
use App\Models\tblHinhAnh;
use App\Models\tblMedia;
use Illuminate\Http\Request;

class TblHinhAnhController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hinhanhs = tblHinhAnh::all();
        $path = env("PATH_IMAGE");
        return view('admin.HinhAnh.index', compact('hinhanhs', 'path'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cauhois = tblCauHoi::all();
        $medias = tblMedia::All();
        return view('admin.HinhAnh.create', compact('cauhois', 'medias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'CauHoiId' => 'required',
            'stt' => 'required|numeric',
            'MediaId' => 'required',
        ]);
        tblHinhAnh::create($request->all());
        return redirect()->route('admin.hinhanh_list')->with('success', 'Thêm Hình ảnh thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(tblHinhAnh $tblHinhAnh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hinhanh = tblHinhAnh::findOrFail($id);
        $cauhois = tblCauHoi::all();
        $medias = tblMedia::All();
        return view('admin.HinhAnh.edit', compact('hinhanh', 'cauhois', 'medias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'CauHoiId' => 'required|numeric',
            'stt' => 'required|numeric',
            'MediaId' => 'required',
        ]);

        $hinhanh = tblHinhAnh::findOrFail($id);
        $hinhanh->update($request->all());

        return redirect()->route('admin.hinhanh_list')->with('success', 'Đã cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hinhanh = tblHinhAnh::findOrFail($id);
        $hinhanh->delete();
        return redirect()->route('admin.hinhanh_list')->with('success', 'Đã xoá Hình ảnh!');
    }
}
