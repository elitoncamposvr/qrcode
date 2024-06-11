<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CodeController extends Controller
{
    public function index()
    {
        return view('codes', [
            'codes' => Code::paginate(20),
        ]);
    }

    public function create()
    {
        return view('codes_create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Code $code)
    {
        return view('codes_edit');
    }

    public function update(Request $request, Code $code)
    {
        //
    }

    public function destroy(Request $request)
    {
        $code = Code::find($request->id);
        $code->delete();

        return Redirect::to('/codes');
    }
}
