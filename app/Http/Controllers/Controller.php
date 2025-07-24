<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function form()
    {
        return view('frontend.form');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'diagnosa' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        Patient::create($validated);

        return redirect()->route('thanks');
    }

    public function thanks()
    {
        return view('frontend.thanks');
    }
}
