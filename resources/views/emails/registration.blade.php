<x-mail::message>
    <img draggable="false" src="{{ env("APP_URL") }}/images/logo.png" width="100%" alt="{{ trans("index.logo") }} - {{ env("APP_TITLE") }}">

    Form Registration

    Full Name : {{ $contact->name }}

    Email Address : {{ $contact->email }}

    Phone Number : {{ $contact->phone }}

    Gender : {{ $contact->gender?->name }}

    School : {{ $contact->school }}

    Major : {{ $contact->major }}

    City : {{ $contact->city }}

    Type : {{ $contact->type?->name }}

    Created At : {{ now() }}

    ---

    Pendaftaran Formulir

    Nama Lengkap : {{ $contact->name }}

    Alamat Email : {{ $contact->email }}

    Nomor Telepon : {{ $contact->phone }}

    Jenis Kelamin : {{ $contact->gender?->name }}

    Sekolah : {{ $contact->school }}

    Jurusan : {{ $contact->major }}

    Kota : {{ $contact->city }}

    Tipe : {{ $contact->type?->name }}

    Tanggal Dibuat : {{ now() }}
</x-mail::message>
