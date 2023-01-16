<?php

namespace App\Http\Livewire;

class CheckDomainComponent extends Component
{
    public $domain;

    public function rules()
    {
        return [
            'domain' => 'required|max:100',
        ];
    }

    public function getResult()
    {
        // if (! is_null($this->domain)) {
        //     if (gethostbyname($this->domain) != $this->domain || checkdnsrr($this->domain, 'ANY') || count(dns_get_record($this->domain)) > 0) {
        //         if (Session::get('locale') == 'id') {
        //             return redirect()->route("$slug.index")->withInfo("Domain $this->domain sudah terdaftar")->with('domain', $this->domain);
        //         } else {
        //             return redirect()->route("$slug.index")->withInfo("Domain $this->domain already registered")->with('domain', $this->domain);
        //         }
        //     } else {
        //         if (Session::get('locale') == 'id') {
        //             return redirect()->route("$slug.index")->withInfo("Buruan, domain $this->domain tersedia, Anda bisa mendaftarkannya")->with('domain', $this->domain);
        //         } else {
        //             return redirect()->route("$slug.index")->withInfo("Hurry, domain $this->domain is available, you can register it")->with('domain', $this->domain);
        //         }
        //     }
        // }
    }

    public function render()
    {
        return view('livewire.check-domain.index', [
            'domain' => $this->getResult(),
        ])->extends('layouts.app')->section('content');
    }
}
