<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Auth\AuthLoginRequest;
use App\Services\Auth\AuthService;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $service
    ) {}

    public function index(): View
    {
        return view('auth.login');
    }

    public function login(AuthLoginRequest $request): RedirectResponse
    {
        $input = $request->validated();

        \Log::debug($input);
        if (Auth::attempt($input)) {
            // Simpan flag bahwa user baru login untuk menampilkan popup welcome
            session(['just_logged_in' => true, 'welcome_message' => 'Selamat Datang ' . Auth::user()->nama_user]);
            return redirect()->intended('dashboard');
        } else {
            return redirect(route('auth.index'))->withError('Email atau Password salah. Cek kembali Email dan Password Anda.');
        }
    }

    public function changePassword(): View
    {
        return view('auth.change-password');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        try {
            $input = $request->validate([
                'current_password' => ['required', 'current_password'],
                'password' => ['required', 'confirmed'],
            ]);

            $this->service->updatePassword($request, $input);
            return redirect()->intended(route('profile.change-password'))->withSuccess('Password berhasil diubah.');
        } catch (\Exception $e) {
            \Log::info('update password error $e: '. $e->getMessage());
            return redirect()->intended(route('profile.change-password'))->withError($e->getMessage());
        }
    }

    public function logout(): RedirectResponse
    {
        \Session::flush();
        Auth::logout();

        return redirect()->intended(route('auth.index'))->withSuccess('Anda telah berhasil logout.');
    }
}
