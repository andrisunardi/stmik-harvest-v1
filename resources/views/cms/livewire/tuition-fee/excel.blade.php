<table>
    <tr><th align="center" colspan="7"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="7"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="7">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.name_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.description_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($tuitionFees as $tuitionFee)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $tuitionFee->id }}</td>
            <td>{{ $tuitionFee->name }}</td>
            <td>{{ $tuitionFee->name_idn }}</td>
            <td>{{ $tuitionFee->description }}</td>
            <td>{{ $tuitionFee->description_idn }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($tuitionFee->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>