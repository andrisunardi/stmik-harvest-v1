<table>
    <tr><th align="center" colspan="11"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="11"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="11">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.email") }}</b></th>
        <th align="center"><b>{{ trans("index.phone") }}</b></th>
        <th align="center"><b>{{ trans("index.gender") }}</b></th>
        <th align="center"><b>{{ trans("index.school") }}</b></th>
        <th align="center"><b>{{ trans("index.major") }}</b></th>
        <th align="center"><b>{{ trans("index.city") }}</b></th>
        <th align="center"><b>{{ trans("index.type") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
    </tr>
    @foreach ($registrations as $registration)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $registration->id }}</td>
            <td>{{ $registration->name }}</td>
            <td>{{ $registration->email }}</td>
            <td>{{ $registration->phone }}</td>
            <td>{{ $registration->gender?->name }}</td>
            <td>{{ $registration->school }}</td>
            <td>{{ $registration->major }}</td>
            <td>{{ $registration->city }}</td>
            <td>{{ $registration->type?->name }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($registration->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
