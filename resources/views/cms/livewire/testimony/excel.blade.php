<table>
    <tr><th align="center" colspan="7"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="7"><b>{{ Str::upper(Str::translate($title)) }}</b></th></tr>
    <tr><th align="center" colspan="7">{{ trans("index.printed_date") }} : {{ now()->isoFormat("LLLL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.graduate") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
    </tr>
    @foreach ($testimonies as $testimony)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $testimony->id }}</td>
            <td>{{ $testimony->testimonyCategory?->name }}</td>
            <td>{{ $testimony->name }}</td>
            <td>{{ $testimony->description }}</td>
            <td>{{ $testimony->graduate }}</td>
            <td>{{ $testimony->image_url }}</td>
            <td align="center">{{ Str::translate(Str::active($testimony->is_active)) }}</td>
        </tr>
    @endforeach
</table>
