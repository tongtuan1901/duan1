<?php

namespace App\Http\Controllers;

use App\Models\Musician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MusiciansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listnhacsi = Musician::all();
        return view('nhacsi.index',compact('listnhacsi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('nhacsi.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if($request->hasFile('profile_picture')){
            $anh = $request->file('profile_picture')->store('uploads/huhunhacsi','public');
        }else{
            $anh = null;
        }

        $nhacsi = Musician::create([
            'name'=> $request->input('name'),
            'profile_picture'=> $anh,
            'birth_date'=> $request->input('birth_date'),
            'instrument'=> $request->input('instrument'),
            'biography'=> $request->input('biography'),
        ]);
        return redirect()->route('musicians.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
       
        $nhacsi = Musician::findorfail($id);
        return view('nhacsi.edit',compact("nhacsi"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $nhacsi = Musician::findorfail($id);

        if($request->hasFile('profile_picture')){
            $anh = $request->file('profile_picture')->store('uploads/huhunhacsi','public');
        }else{
            $anh = null;
        }

        $nhacsi->update([
            'name'=> $request->input('name'),
            'profile_picture'=> $anh,
            'birth_date'=> $request->input('birth_date'),
            'instrument'=> $request->input('instrument'),
            'biography'=> $request->input('biography'),
        ]);
        return redirect()->route('musicians.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $nhacsi = Musician::findorfail($id);
        if($nhacsi->profile_picture){
            Storage::disk('public')->delete($nhacsi->profile_picture);
        }
        $nhacsi->delete();
        return redirect()->route('musicians.index');
    }
}
