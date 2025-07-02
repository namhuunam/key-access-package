<?php

namespace NamHuuNam\KeyAccessPackage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use NamHuuNam\KeyAccessPackage\Models\AccessKey;

class AccessKeyController extends Controller
{
    public function index()
    {
        $keys = AccessKey::all();
        return view('key-access-package::keys.index', compact('keys'));
    }

    public function create()
    {
        return view('key-access-package::keys.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key_value' => 'required|unique:access_keys,key_value',
        ]);

        AccessKey::create($request->all());

        return redirect()->to(backpack_url('keys'))->with('success', 'Key created successfully.');
    }

    public function edit(AccessKey $key)
    {
        return view('key-access-package::keys.edit', compact('key'));
    }

    public function update(Request $request, AccessKey $key)
    {
        $request->validate([
            'key_value' => 'required|unique:access_keys,key_value,' . $key->id,
        ]);

        $key->update($request->all());

        return redirect()->to(backpack_url('keys'))->with('success', 'Key updated successfully.');
    }

    public function destroy(AccessKey $key)
    {
        $key->delete();
        return redirect()->to(backpack_url('keys'))->with('success', 'Key deleted successfully.');
    }
}
