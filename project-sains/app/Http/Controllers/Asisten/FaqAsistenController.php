<?php

namespace App\Http\Controllers\Asisten;

use App\Http\Controllers\Controller;
use App\Models\Faqs;
use App\Models\FaqShows;
use Illuminate\Http\Request;

class FaqAsistenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faqs::all();
        $faqShows = FaqShows::join('faqs', 'faq_shows.faq_id', '=', 'faqs.id')
        ->select('faqs.question', 'faqs.answer', 'faq_shows.id', 'faq_shows.faq_id')
        ->get();

        $faqCount = FaqShows::count();

        $checkFaq = $faqShows->pluck('faq_id')->toArray();
        return view('dashboard.asisten.faq-asisten', compact('faqShows', 'faqs', 'checkFaq', 'faqCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faq = Faqs::findOrFail($id);
        return view('dashboard.asisten.create-answer', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $faq = Faqs::findOrFail($id);
        
        $request->validate([
            'answer' => 'required|string|max:255'
        ]);

        $faq->update($request->only('answer'));


        return redirect()->route('faqasisten.index')->with('success', 'Jawaban berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faqs::findOrFail($id);
        $faq->delete();    
        return redirect()->route('faqasisten.index')->with('success', 'Pertanyaan berhasil dihapus.');
    }
}
