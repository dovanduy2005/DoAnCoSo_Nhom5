<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
<<<<<<< HEAD
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 'admin') {
                Auth::guard('admin')->login($user);
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Đăng nhập quản trị thành công!');
            }
=======
            $user = Auth::user();
            $requestedRole = $request->input('role', 'customer');
            
            // Kiểm tra role có khớp không
            if ($user->role !== $requestedRole) {
                Auth::logout();
                return back()->withErrors([
                    'email' => $requestedRole === 'admin' 
                        ? 'Tài khoản này không có quyền quản trị.' 
                        : 'Vui lòng sử dụng trang đăng nhập dành cho Admin.',
                ])->onlyInput('email');
            }
            
            $request->session()->regenerate();
>>>>>>> ae3eca91d202169d17a06e35ad479d823d1102e2

            return redirect()->intended('/')
                ->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect('/')
            ->with('success', 'Đăng ký tài khoản thành công!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
<<<<<<< HEAD
        Auth::guard('admin')->logout();
=======
>>>>>>> ae3eca91d202169d17a06e35ad479d823d1102e2

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'Đã đăng xuất thành công!');
    }
}
