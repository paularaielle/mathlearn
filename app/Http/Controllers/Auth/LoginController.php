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

class LoginController extends Controller
{

    public function index ()
    {
        if (auth()->check())
            return redirect()->route('dashboard');

        return view('auth.login');
    }

    public function perfil ()
    {
        $user = auth()->user();

        return view('auth.perfil')->with('model', $user);
    }

    // post
    public function update (Request $request)
    {
        $data = [];
        $model = auth()->user();

        $request->validate([
            'email' => 'email|required',
            'nickname' => 'required|min:6',
        ]);

        if ($request->password) {
            Validator::make($request->all(), [
                'password' => ['required', 'confirmed', Password::min(8)],
            ]);

            $data['password'] = Hash::make($request->password);
        }

        if (User::where('email', $request->email)->where('id', '<>', $model->id)->count()) {
            $request->session()->flash('danger', 'Email já existe');

            return back();
        }

        if (User::where('nickname', $request->nickname)->where('id', '<>', $model->id)->count()) {
            $request->session()->flash('danger', 'nickname já existe');

            return back();
        }

        $data = [
            'email' => $request->email,
            'nicknname' => $request->nicknname,
        ] + $data;

        if ($model->update($data)) {
            $request->session()->flash('success', 'Registro atualizado');

            return redirect()->intended('dashboard');
            // return $this->redirectIndex();
        }
        $request->session()->flash('danger', 'Falha ao criar registro!');

        return back();
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $email = $request->input('email');

        $user = User::where('ativo', true)
            ->where('email', $email)
            ->orWhere('nickname', $email)
            ->first();

        if ($user && Hash::check($request->password, $user->password)) {

            $credentials['email'] = $user->email;

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
