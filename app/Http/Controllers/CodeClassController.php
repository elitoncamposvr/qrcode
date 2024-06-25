<?php

namespace App\Http\Controllers;

use App\Models\CodeClass;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class CodeClassController extends Controller
{
    public function index()
    {
        return view('code_class', [
            'codeclass' => CodeClass::paginate(20),
        ]);
    }

    public function create()
    {
        return view('code_class_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_class' => ['required', 'string', 'max:100'],
            'class_code' => ['required', 'integer', 'min:1', 'max:9', 'unique:code_classes'],
        ]);

        $codeclass = CodeClass::create([
            'name_class' => $request->name_class,
            'class_code' => $request->class_code,
        ]);

        event(new Registered($codeclass));

        return redirect(route('codeclass.index', absolute: false));
    }

    public function edit($id)
    {
        $codeclass = CodeClass::find($id);
        return view('code_class_edit', [
            'code' => $codeclass,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_class' => ['required', 'string', 'max:100'],
            'class_code' => ['required', 'integer', 'min:1', 'max:9', Rule::unique('code_classes')->ignore($id)],
        ]);

        $codeclass = CodeClass::find($id);
        $codeclass->update($request->all());

        return Redirect::to('/codeclass');
    }

    public function destroy(Request $request)
    {
        $codeclass = CodeClass::find($request->id);
        $codeclass->delete();

        return Redirect::to('/codeclass');
    }
}
