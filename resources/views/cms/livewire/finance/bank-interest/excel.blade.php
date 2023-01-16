<table>
    <tr><th align="center" colspan="8"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="8"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="8">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.bank") }}</b></th>
        <th align="center"><b>{{ trans("index.amount") }}</b></th>
        <th align="center"><b>{{ trans("index.tax") }}</b></th>
        <th align="center"><b>{{ trans("index.after_tax") }}</b></th>
        <th align="center"><b>{{ trans("index.date") }}</b></th>
        <th align="center"><b>{{ trans("index.notes") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($bankInterests as $bankInterest)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $bankInterest->id }}</td>
            <td align="center">{{ $bankInterest->code }}</td>
            <td>{{ $bankInterest->bank?->name }}</td>
            <td>{{ Str::rupiah($bankInterest->amount) }}</td>
            <td>{{ Str::rupiah($bankInterest->tax) }}</td>
            <td>{{ Str::rupiah($bankInterest->after_tax) }}</td>
            <td>
                @if ($bankInterest->date)
                    {{ $bankInterest->date->format("l,") }}
                    {{ $bankInterest->date->isoFormat("LL") }}
                @endif
            </td>
            <td>{{ $bankInterest->notes }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($bankInterest->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
