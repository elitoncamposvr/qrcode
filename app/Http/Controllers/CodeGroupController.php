<?php

namespace App\Http\Controllers;

use App\Models\CodeGroup;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class CodeGroupController extends Controller
{
    public function index()
    {
        return view('code_group', [
           'codegroup' => CodeGroup::paginate(20),
        ]);
    }


    public function create()
    {
        return view('code_group_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_group' => ['string', 'required', 'max:100'],
            'group_code' => ['integer', 'required', 'min:1', 'max:99', 'unique:code_groups'],
        ]);

        $codegroup = CodeGroup::create([
            'name_group' => $request->name_group,
            'group_code' => $request->group_code,
        ]);

        event(new Registered($codegroup));

        return redirect(route('codegroup.index', absolute: false));
    }

    public function edit($id)
    {
        $codegroup = CodeGroup::find($id);
        return view('code_group_edit', [
            'codegroup' => $codegroup
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_group' => ['string', 'required', 'max:100'],
            'group_code' => ['integer', 'required', 'min:1', 'max:99', Rule::unique('code_groups')->ignore($id)],
        ]);

        $codeclass = CodeGroup::find($id);
        $codeclass->update($request->all());

        return Redirect::to('/codegroup');
    }

    public function destroy(Request $request)
    {
        $codegroup = CodeGroup::find($request->id);
        $codegroup->delete();

        return Redirect::to('/codegroup');
    }
}
