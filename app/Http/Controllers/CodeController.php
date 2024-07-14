<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\CodeClass;
use App\Models\CodeFamily;
use App\Models\CodeGroup;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use function redirect;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('codes',[
            'codes' => Code::paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('codes_create', [
            'code_class' => CodeClass::query()->orderBy('class_code')->get(),
            'code_group' => CodeGroup::query()->orderBy('group_code')->get(),
            'code_family' => CodeFamily::query()->orderBy('families_code')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_code' => ['required'],
            'families_code' => ['required'],
            'group_code' => ['required'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $code = Code::create([
            'code' => '0',
            'designer' => Auth::user()->name,
            'class_code' => $request->get('class_code'),
            'families_code' => $request->get('families_code'),
            'group_code' => $request->get('group_code'),
            'description' => $request->get('description'),
        ]);

        event(new Registered($code));

        $sequential_code = Code::query()
            ->where('class_code', '=', $request->get('class_code'))
            ->where('group_code', '=', $request->get('group_code'))
            ->where('families_code', '=', $request->get('families_code'))
            ->orderBy('sequential_code', 'desc')
            ->first();

        $sequential = $sequential_code->sequential_code;
        $sequential++;

        $code_id = str_pad($sequential, 4, 0, STR_PAD_LEFT);

        $code_all =
            $request->get('class_code') .
            $request->get('families_code') .
            $request->get('group_code') .
            $code_id;


        $code_update = Code::find($code->id);

        $code_update->update([
            'code' => $code_all,
            'sequential_code' => $sequential,
        ]);

        return redirect(route('codes.index', absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $codes = DB::table('codes')
            ->leftJoin('code_classes', 'codes.class_code', '=', 'code_classes.class_code')
            ->leftJoin('code_families', 'codes.families_code', '=', 'code_families.families_code')
            ->leftJoin('code_groups', 'codes.group_code', '=', 'code_groups.group_code')
            ->where('codes.id', '=', $id)
            ->get();

        return view('codes_show')->with('code', $codes[0]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('codes_edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Code $code)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = Code::where('designer', 'like', "%$search%")
            ->orWhere('code', 'like', "%$search%")
            ->get();

        return view('code_search', [
            'code_results' => $results,
        ]);
    }

    public function destroy(Request $request)
    {
        $code = Code::find($request->id);
        $code->delete();

        return Redirect::to('/codes');
    }
}
