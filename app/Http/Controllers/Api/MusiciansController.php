<?php

namespace App\Http\Controllers\Api;

use App\Models\Musician;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return response()->json($listnhacsi);
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
        return response()->json($nhacsi,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        return response()->json($nhacsi,200);
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
        return response()->json(['message'=>'Xoa thanh cong']);
    }
}
