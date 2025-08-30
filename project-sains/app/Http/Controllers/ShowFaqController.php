<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use App\Models\FaqShows;
use Illuminate\Http\Request;

class ShowFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faqs::all();
        return view('dashboard.asisten.kelola-faq', compact('faqs'));
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
        $faqId = $request->input('faqId');

        FaqShows::create([
            'faq_id' => $faqId
        ]);

        return redirect()->route('faqasisten.index')->with('success', 'Pertanyaan berhasil ditambahkan');
    
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
        $faq = FaqShows::findOrFail($id);
        $faq->delete();    
        return redirect()->back()->with('success', 'FAQ berhasil dihapus dari daftar.');
    }
}
