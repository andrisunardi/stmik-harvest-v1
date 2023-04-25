<html>
    <head>
        <title>{{ $title }} | {{ env("APP_NAME") }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="text-center">
            <h1>{{ env("APP_NAME") }}</h1>
            <p>{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</p>
        </div>

        <main class="text-center">
            <h5 class="text-uppercase">{{ $title }}</h5>
            <table class="table table-bordered">
                <tr>
                    <th class="text-center" width="1%">{{ trans("index.#") }}</th>
                    <th class="text-center" width="1%">{{ trans("index.id") }}</th>
                    <th class="text-center">{{ trans("index.question") }}</th>
                    <th class="text-center">{{ trans("index.question_idn") }}</th>
                    <th class="text-center">{{ trans("index.answer") }}</th>
                    <th class="text-center">{{ trans("index.answer_idn") }}</th>
                    <th class="text-center">{{ trans("index.active") }}</th>
                </tr>
                @foreach($faqs as $faq)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $faq->id }}</td>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->question_idn }}</td>
                        <td>{{ $faq->answer }}</td>
                        <td>{{ $faq->answer_idn }}</td>
                        <td class="text-center">{{ Str::translate(Str::active($faq->is_active)) }}</td>
                    </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
