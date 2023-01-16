<table>
    <tr><th align="center" colspan="9"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="9"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="9">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.employee") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.date") }}</b></th>
        <th align="center"><b>{{ trans("index.clock") }}</b></th>
        <th align="center"><b>{{ trans("index.duration") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($absents as $absent)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $absent->id }}</td>
            <td align="center">{{ $absent->code }}</td>
            <td>{{ $absent->user?->name }}</td>
            <td>{{ $absent->name }}</td>
            <td>{{ $absent->datetime?->format("l") }}, {{ $absent->datetime?->isoFormat("LL") }}</td>
            <td>{{ $absent->datetime?->format("H:i") }} - {{ $absent->datetime?->addHour($absent->duration)->format("H:i") }}</td>
            <td>{{ $absent->duration }} {{ trans("index.hour") }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($absent->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
