<?php

namespace NamHuuNam\KeyAccessPackage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use NamHuuNam\KeyAccessPackage\Models\AccessKey;

class KeyValidationController extends Controller
{
    public function validateKey(Request $request)
    {
        $request->validate([
            'key' => 'required|string',
        ]);

        $key = AccessKey::where('key_value', $request->key)->first();

        if ($key) {
            session(['key_validated' => true]);
            return redirect()->to($request->session()->previousUrl());
        }

        return back()->withErrors(['key' => 'Invalid key.']);
    }
}
