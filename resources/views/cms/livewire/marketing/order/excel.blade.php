<table>
    <tr><th align="center" colspan="20"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="20"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="20">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.status") }}</b></th>
        <th align="center"><b>{{ trans("index.type") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.line") }}</b></th>
        <th align="center"><b>{{ trans("index.whatsapp") }}</b></th>
        <th align="center"><b>{{ trans("index.email") }}</b></th>
        <th align="center"><b>{{ trans("index.social_media") }}</b></th>
        <th align="center"><b>{{ trans("index.other") }}</b></th>
        <th align="center"><b>{{ trans("index.address") }}</b></th>
        <th align="center"><b>{{ trans("index.reference") }}</b></th>
        <th align="center"><b>{{ trans("index.domain") }}</b></th>
        <th align="center"><b>{{ trans("index.price") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.video") }}</b></th>
        <th align="center"><b>{{ trans("index.datetime") }}</b></th>
        <th align="center"><b>{{ trans("index.notes") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($orders as $order)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $order->id }}</td>
            <td align="center">{{ $order->code }}</td>
            <td align="center">{{ $newsletter->status?->name }}</td>
            <td align="center">{{ $newsletter->type?->name }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->line }}</td>
            <td>{{ $order->whatsapp }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ $order->social_media }}</td>
            <td>{{ $order->other }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->reference }}</td>
            <td>{{ $order->domain }}</td>
            <td>{{ Str::rupiah($order->price) }}</td>
            <td>
                @if ($order->datetime)
                    {{ $order->datetime->format("l, H:i:s") }}<br>
                    {{ $order->datetime->isoFormat("LL") }}<br>
                    ({{ $order->datetime->diffForHumans() }})
                @endif
            </td>
            <td>{{ $order->notes }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($order->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
