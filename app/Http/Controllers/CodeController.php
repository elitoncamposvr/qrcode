<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\CodeClass;
use App\Models\CodeFamily;
use App\Models\CodeGroup;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'class_code' => ['required', 'integer',],
            'families_code' => ['required', 'integer',],
            'group_code' => ['required', 'integer',],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $code = Code::create([
            'code' => '0',
            'designer' => $request->get('designer'),
            'class_code' => $request->get('class_code'),
            'families_code' => $request->get('families_code'),
            'group_code' => $request->get('group_code'),
            'description' => $request->get('description'),
        ]);
//
        event(new Registered($code));

        $code_all = $request
                ->get('class_code') . "."
            . $request->
            get('families_code') . "."
            . $request->
            get('group_code') . "."
            . $code->id;

        $code_update = Code::find($code->id);
        $code_update->update([
            'code' => $code_all,
        ]);

//        dump($code_all);

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

    public function show(Code $code)
    {
//        $codes = DB::table('codes')
//            ->leftJoin('code_classes', 'codes.class_id', '=', 'code_classes.id')
//            ->leftJoin('code_families', 'codes.family_id', '=', 'code_families.id')
//            ->leftJoin('code_groups', 'codes.group_id', '=', 'code_groups.id')
//            ->where('codes.id', '=', $id)
//            ->get();
//
//        return view('codes_show')->with('code', $codes[0]);

//        dump($codes[0]->code);

        return view('codes_show', [
            'code' => Code::find($code),
        ]);

    }

    public function search($search)
    {
        return view('codes_search', []);
    }

    public function destroy(Request $request)
    {
        $code = Code::find($request->id);
        $code->delete();

        return Redirect::to('/codes');
    }
}
