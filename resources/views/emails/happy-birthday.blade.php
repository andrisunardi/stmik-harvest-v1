<x-mail::message>
    <img draggable="false" src="{{ env("APP_URL") }}/images/happy-birthday.webp" width="100%" alt="{{ trans("index.happy_birthday") }} - {{ env("APP_TITLE") }}">

    Happy Birthday {{ $user->name }}
    {{ $user->age }} Year

    We from {{ env("APP_NAME") }} would like to wish you a Happy Birthday on this special day!
    May you live long, healthy and always be blessed with good fortune.

    Wish You All The Best,
    {{ env("APP_NAME") }} Team

    ------------------------------------------------------------------------------------------

    Selamat Ulang Tahun {{ $user->name }}
    Yang Ke {{ $user->age }} Tahun

    Kami dari {{ env("APP_NAME") }} mau mengucapkan Selamat Ulang Tahun untuk anda di hari yang spesial ini!
    Semoga panjang umur, sehat dan selalu dilimpahkan rejeki.

    Mengharapkan yang terbaik untuk Anda,
    Tim {{ env("APP_NAME") }}
</x-mail::message>
