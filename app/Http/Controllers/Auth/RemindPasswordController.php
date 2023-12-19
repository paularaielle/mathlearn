<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RemindPasswordController extends Controller
{

    public function index ($id)
    {
        $model = User::find($id);

        return view('password.index')->with('model', $model);
    }

    // post
    public function update (Request $request, string $id)
    {
        $model = User::find($id);

        $request->validate([
            'password' => 'required|min:6',
            'redirect' => 'required'
        ]);

        if ($model->update($request->all())) {
            $request->session()->flash('success', 'Password redefinido com sucesso');

            //return redirect()->route('perfil', $model->id);
        }
        $request->session()->flash('danger', 'Falha alterar password!');

        return back();
    }
}
