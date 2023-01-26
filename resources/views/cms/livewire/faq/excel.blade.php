<table>
    <tr><th align="center" colspan="7"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="7"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="7">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.question") }}</b></th>
        <th align="center"><b>{{ trans("index.question_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.answer") }}</b></th>
        <th align="center"><b>{{ trans("index.answer_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
    </tr>
    @foreach ($faqs as $faq)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $faq->id }}</td>
            <td>{{ $faq->question }}</td>
            <td>{{ $faq->question_idn }}</td>
            <td>{{ $faq->answer }}</td>
            <td>{{ $faq->answer_idn }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($faq->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
