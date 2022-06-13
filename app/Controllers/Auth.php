<?php

namespace App\Controllers;

use App\Models\User;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        
    }

    public function login()
    {
        if (session('user_id')) {
            return redirect()->to(site_url('/'));
        }
        return view('auth/login', [
            'title' => 'Halaman Login',
        ]);
    }

    public function proccess()
    {
        $query = new User();
        $user = $query->where('email', $this->request->getPost('email'))->first();
        if ($user) {
            if (password_verify($this->request->getPost('password'), $user->password)) {
                session()->set(['user_id' => $user->user_id]);
                return redirect()->to(site_url('/'));
            } else {
                return redirect()->back()->with('error', 'Password tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->destroy('user_id');
        return redirect()->to(site_url('login'));
    }
}
