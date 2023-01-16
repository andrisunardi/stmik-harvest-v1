<x-mail::message>
    Hello, {{ $portfolio->user->name }}

    We from {{ env("APP_NAME") }} would like to inform you that the website {{ $portfolio->name }} has expired today, {{ $portfolio->expired->isoFormat("LL") }}. If your website want to be extended, please let us know on Whatsapp +62 8787 111 3361

    Best regards,
    {{ env("APP_NAME") }} Team

    ------------------------------------------------------------------------------------------

    Halo, {{ $portfolio->user->name }}

    Kami dari {{ env("APP_NAME") }} ingin menginformasikan bahwa situs web {{ $portfolio->name }} telah kedaluwarsa hari ini, {{ $portfolio->expired->format("d F Y") }}. Jika website Anda ingin diperpanjang, beri tahu kami di Whatsapp +62 8787 111 3361

    Hormat kami,
    Tim {{ env("APP_NAME") }}
</x-mail::message>
