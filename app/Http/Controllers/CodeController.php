<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\CodeClass;
use App\Models\CodeFamily;
use App\Models\CodeGroup;
use Illuminate\Auth\Events\Registered;
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
        return view('codes_create', [
            'code_class' => CodeClass::all(),
            'code_family' => CodeFamily::all(),
            'code_group' => CodeGroup::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => ['required', 'integer',],
            'family_id' => ['required', 'integer',],
            'group_id' => ['required', 'integer',],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $code = Code::create([
            'code' => '0',
            'designer' => $request->get('designer'),
            'class_id' => $request->get('class_id'),
            'family_id' => $request->get('family_id'),
            'group_id' => $request->get('group_id'),
            'description' => $request->get('description'),
        ]);

        event(new Registered($code));

        $code_all = $request
                ->get('class_id') . "."
            . $request->
            get('family_id') . "."
            . $request->
            get('group_id') . "."
            . $code->id;

        $code_update = Code::find($code->id);
        $code_update->update([
            'code' => $code_all,
        ]);

        return \redirect(route('codes.index', absolute: false));

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
