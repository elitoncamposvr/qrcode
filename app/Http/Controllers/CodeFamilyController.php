<?php

namespace App\Http\Controllers;

use App\Models\CodeFamily;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class CodeFamilyController extends Controller
{
    public function index()
    {
        return view('code_family', [
           'codefamily' => CodeFamily::paginate(20),
        ]);
    }

    public function create()
    {
        return view('code_family_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_family' => ['required', 'string', 'max:100'],
            'families_code' => ['required', 'int', 'min:1', 'max:99', 'unique:code_families'],
        ]);

        $codefamily = CodeFamily::create([
            'name_family' => $request->name_family,
            'families_code' => $request->families_code,
        ]);

        event(new Registered($codefamily));

        return redirect(route('codefamily.index', absolute: false));

    }

    public function edit($id)
    {
        $codefamily = CodeFamily::find($id);
        return view('code_family_edit', [
           'codefamily' =>  $codefamily,
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name_family' => ['required','string','max:100'],
            'families_code' => ['required', 'int', 'min:1', 'max:99', Rule::unique('code_families')->ignore($id)],
        ]);

        $codefamily = CodeFamily::find($id);
        $codefamily->update($request->all());

        return Redirect::to('/codefamily');

    }

    public function destroy(Request $request)
    {
        $codefamily = CodeFamily::find($request->id);
        $codefamily->delete();

        return Redirect::to('/codefamily');
    }
}
