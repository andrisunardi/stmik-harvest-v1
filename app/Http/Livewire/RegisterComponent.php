<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

class RegisterComponent extends Component
{
    public $email;

    public $password;

    public function rules()
    {
        return [
            'email' => 'required|max:50|email',
            'password' => 'required|max:50',
        ];
    }

    public function submit()
    {
        if (Auth::guard('user')->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            return redirect()->intended('/')->withSuccess('Login has been Successfully');
        }

        return redirect()->back()->withInput()->withDanger('Email or Password is invalid');
    }

    public function render()
    {
        return view('livewire.register.index')->extends('layouts.app')->section('content');
    }
}
