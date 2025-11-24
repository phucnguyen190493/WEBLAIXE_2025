<?php

namespace App\Http\Controllers;

use App\Models\tblCauHoi;
use App\Models\tblCauTraLoi;
use Illuminate\Http\Request;

class TblCauTraLoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cautralois = tblCauTraLoi::all();
        return view('admin.CauTraLoi.index', compact('cautralois'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cauhois = tblCauHoi::all();
        return view('admin.CauTraLoi.create', compact('cauhois'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'CauHoiId' => 'required',
            'stt' => 'required|numeric',
            'noidung' => 'required'
        ]);
        tblCauTraLoi::create($request->all());
        return redirect()->route('admin.cautraloi_list')->with('success', 'Thêm Câu trả lời thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(tblCauTraLoi $tblCauTraLoi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cautraloi = tblCauTraLoi::findOrFail($id);
        $cauhois = tblCauHoi::all();
        return view('admin.CauTraLoi.edit', compact('cautraloi', 'cauhois'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'CauHoiId' => 'required',
            'stt' => 'required|numeric',
            'noidung' => 'required'
        ]);

        $cautraloi = tblCauTraLoi::findOrFail($id);
        $cautraloi->update($request->all());

        return redirect()->route('admin.cautraloi_list')->with('success', 'Đã cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cautraloi = tblCauTraLoi::findOrFail($id);
        $cautraloi->delete();
        return redirect()->route('admin.cautraloi_list')->with('success', 'Đã xoá Câu trả lời!');
    }
}
