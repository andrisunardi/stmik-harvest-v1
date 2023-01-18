<x-mail::message>
    <img draggable="false" src="{{ env("APP_URL") }}/images/logo.png" width="100%" alt="{{ trans("index.logo") }} - {{ env("APP_TITLE") }}">

    Form Contact

    Full Name : {{ $contact->name }}

    Phone Number : {{ $contact->phone }}

    Email Address : {{ $contact->email }}

    Company : {{ $contact->company }}

    Message : {{ $contact->message }}

    Created At : {{ now() }}

    ---

    Kontak Formulir

    Nama Lengkap : {{ $contact->name }}

    Nomor Telepon : {{ $contact->phone }}

    Alamat Email : {{ $contact->email }}

    Perusahaan : {{ $contact->company }}

    Pesan : {{ $contact->message }}

    Tanggal Dibuat : {{ now() }}
</x-mail::message>
