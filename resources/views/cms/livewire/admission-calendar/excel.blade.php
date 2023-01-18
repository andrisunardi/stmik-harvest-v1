<table>
    <tr><th align="center" colspan="8"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="8"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="8">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.name_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.description_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.date") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($admissionCalendars as $admissionCalendar)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $admissionCalendar->id }}</td>
            <td>{{ $admissionCalendar->name }}</td>
            <td>{{ $admissionCalendar->name_idn }}</td>
            <td>{{ $admissionCalendar->description }}</td>
            <td>{{ $admissionCalendar->description_idn }}</td>
            <td>
                @if ($admissionCalendar->date)
                    {{ $admissionCalendar->date->format("l,") }}
                    {{ $admissionCalendar->date->isoFormat("LL") }}
                    <br>
                    ({{ $admissionCalendar->date->diffForHumans() }})
                @endif
            </td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($admissionCalendar->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
