<x-mail::message>
    <img draggable="false" src="{{ env("APP_URL") }}/images/logo.png" width="100%" alt="{{ trans("index.logo") }} - {{ env("APP_TITLE") }}">

    Form Registration

    Full Name : {{ $registration->name }}

    Email Address : {{ $registration->email }}

    Phone Number : {{ $registration->phone }}

    Gender : {{ $registration->gender?->name }}

    School : {{ $registration->school }}

    Major : {{ $registration->major }}

    City : {{ $registration->city }}

    Type : {{ $registration->type?->name }}

    Created At : {{ now() }}

    ---

    Pendaftaran Formulir

    Nama Lengkap : {{ $registration->name }}

    Alamat Email : {{ $registration->email }}

    Nomor Telepon : {{ $registration->phone }}

    Jenis Kelamin : {{ $registration->gender?->name }}

    Sekolah : {{ $registration->school }}

    Jurusan : {{ $registration->major }}

    Kota : {{ $registration->city }}

    Tipe : {{ $registration->type?->name }}

    Tanggal Dibuat : {{ now() }}
</x-mail::message>
