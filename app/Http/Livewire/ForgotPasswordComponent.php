<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Str;

class ForgotPasswordComponent extends Component
{
    public $email;

    public $confirm_reset;

    public function rules()
    {
        return [
            'email' => 'required|max:50|email',
            'confirm_reset' => 'required',
        ];
    }

    public function submit()
    {
        $user = User::where('email', $this->email)->first();

        if ($user) {
            $password = Str::random(5);
            $user->password = bcrypt($password);
            $user->save();

            return redirect()->route('login.index')->withInput()->withSuccess("New Password : $password");
        }

        return redirect()->back()->withInput()->withDanger('Email is invalid or not exist');
    }

    public function render()
    {
        return view('livewire.forgot-password.index')->extends('layouts.app')->section('content');
    }
}
