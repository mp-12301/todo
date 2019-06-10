<?php

namespace App\Http\Controllers;

use App\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->labels()->get();
    }

    public function show(Label $label)
    {
        return $label;
    }

    public function store(Request $request)
    {
        $label = $request->user()->labels()->create($request->all());

        return response()->json($label, 201);
    }

    public function update(Request $request, Label $label)
    {
        $label->update($request->all());

        return response()->json($label, 200);
    }

    public function delete(Label $label)
    {
        $label->delete();

        return response()->json(null, 204);
    }
}
