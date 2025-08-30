<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use App\Models\FaqShows;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqShows = FaqShows::join('faqs', 'faq_shows.faq_id', '=', 'faqs.id')->select('faqs.question', 'faqs.answer', 'faq_shows.id')->get();
        return view('dashboard.user.faq', compact('faqShows'));
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
        $request->validate([
            'question' => 'required|string|max:255'
        ]);

        Faqs::create([
            'question' => $request->input('question')
        ]);

        return redirect()->route('faq.index')->with('success', 'Pertanyaan berhasil ditambahkan');
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
        //
    }
}
