<table>
    <tr><th align="center" colspan="14"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="14"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="14">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.payment_category") }}</b></th>
        <th align="center"><b>{{ trans("index.portfolio") }}</b></th>
        <th align="center"><b>{{ trans("index.user") }}</b></th>
        <th align="center"><b>{{ trans("index.bank") }}</b></th>
        <th align="center"><b>{{ trans("index.account_number") }}</b></th>
        <th align="center"><b>{{ trans("index.account_name") }}</b></th>
        <th align="center"><b>{{ trans("index.amount") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.datetime") }}</b></th>
        <th align="center"><b>{{ trans("index.notes") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($payments as $payment)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $payment->id }}</td>
            <td align="center">{{ $payment->code }}</td>
            <td>{{ $payment->paymentCategory?->name }}</td>
            <td>{{ $payment->porfolio?->name }}</td>
            <td>{{ $payment->user?->name }}</td>
            <td>{{ $payment->bank?->name }}</td>
            <td>{{ $payment->account_number }}</td>
            <td>{{ $payment->account_name }}</td>
            <td>{{ Str::rupiah($payment->amount) }}</td>
            <td>{{ $payment->image_url }}</td>
            <td>
                @if ($payment->datetime)
                    {{ $payment->datetime->format("l, H:i:s") }}<br>
                    {{ $payment->datetime->isoFormat("LL") }}<br>
                    ({{ $payment->datetime->diffForHumans() }})
                @endif
            </td>
            <td>{{ $payment->notes }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($payment->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
