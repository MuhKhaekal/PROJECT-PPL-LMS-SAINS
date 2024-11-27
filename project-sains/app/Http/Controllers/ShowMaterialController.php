<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class ShowMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $material = Material::findOrFail($id);
        // Dalam Controller
        $filePath = public_path($material->material_file_name);
        $pdfContent = file_get_contents($filePath);
        $base64Pdf = 'data:application/pdf;base64,' . base64_encode($pdfContent);

        return view('dashboard.user.detail-material-user', compact('material', 'base64Pdf'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
