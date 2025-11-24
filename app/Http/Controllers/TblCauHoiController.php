<?php

namespace App\Http\Controllers;

use App\Models\tblCauHoi;
use Illuminate\Http\Request;

class TblCauHoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cauhois = tblCauHoi::all();
        return view('admin.CauHoi.index', compact('cauhois'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.CauHoi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'stt' => 'required|numeric',
            'noidung' => 'required'
        ]);
        tblCauHoi::create($request->all());
        return redirect()->route('admin.cauhoi_list')->with('success', 'Thêm câu hỏi thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(tblCauHoi $tblCauHoi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cauhoi = tblCauHoi::findOrFail($id);
        return view('admin.CauHoi.edit', compact('cauhoi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'stt' => 'required|numeric',
            'noidung' => 'required'
        ]);

        $cauhoi = tblCauHoi::findOrFail($id);
        $cauhoi->update($request->all());

        return redirect()->route('admin.cauhoi_list')->with('success', 'Đã cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cauhoi = tblCauHoi::findOrFail($id);
        $cauhoi->delete();
        return redirect()->route('admin.cauhoi_list')->with('success', 'Đã xoá Câu hỏi!');
    }
}
