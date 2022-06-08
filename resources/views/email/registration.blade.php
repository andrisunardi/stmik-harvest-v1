<div>
    <h1>Form Registration</h1>
</div>
<div>
    <p>Full Name : {{ $registration->name }}</p>
</div>
<div>
    <p>Phone Number : {{ $registration->phone }}</p>
</div>
<div>
    <p>Email Address : {{ $registration->email }}</p>
</div>
<div>
    <p>Gender : {{ $registration->gender_text }}</p>
</div>
<div>
    <p>School : {{ $registration->school }}</p>
</div>
<div>
    <p>Major : {{ $registration->major }}</p>
</div>
<div>
    <p>City : {{ $registration->city }}</p>
</div>
<div>
    <p>Type : {{ $registration->type_text }}</p>
</div>
<div>
    <p>Created At : {{ $registration->created_at }}</p>
</div>
<hr>
<div>
    <h1>Pendaftaran Formulir</h1>
</div>
<div>
    <p>Nama Lengkap : {{ $registration->name }}</p>
</div>
<div>
    <p>Nomor Telepon : {{ $registration->phone }}</p>
</div>
<div>
    <p>Alamat Email : {{ $registration->email }}</p>
</div>
<div>
    <p>Jenis Kelamin : {{ trans("index.$registration->gender_text") }}</p>
</div>
<div>
    <p>Sekolah : {{ $registration->school }}</p>
</div>
<div>
    <p>Jurusan : {{ $registration->major }}</p>
</div>
<div>
    <p>Kota : {{ $registration->city }}</p>
</div>
<div>
    <p>Tipe : {{ trans("index.{$registration->type_text}") }}</p>
</div>
<div>
    <p>Tanggal Dibuat : {{ $registration->created_at }}</p>
</div>
