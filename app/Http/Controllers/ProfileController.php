<?php


namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ProfileController extends Controller
{
    //показать юзера
    public function show()
    {
        return view('profile.show', [
            'user' => Auth::user(),
        ]);
    }
    //обновление данных
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
        ]);
        /** @var User $user */
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return Redirect::route('profile.show')->with('status', 'Профиль обновлен!');
    }
// изменить пароль
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        /** @var User $user */

        $user = Auth::user();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return Redirect::route('profile.show')->with('status', 'Пароль обновлен!');
    }
}

