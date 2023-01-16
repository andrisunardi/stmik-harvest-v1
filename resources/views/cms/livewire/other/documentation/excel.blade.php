<table>
    <tr><th align="center" colspan="10"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="10"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="10">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.at") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.video") }}</b></th>
        <th align="center"><b>{{ trans("index.datetime") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($documentations as $documentation)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $documentation->id }}</td>
            <td align="center">{{ $documentation->code }}</td>
            <td>{{ $documentation->name }}</td>
            <td>{{ $documentation->description }}</td>
            <td>{{ $documentation->at }}</td>
            <td>{{ $documentation->image_url }}</td>
            <td>{{ $documentation->video_url }}</td>
            <td>
                @if ($documentation->datetime)
                    {{ $documentation->datetime->format("l, H:i:s") }}<br>
                    {{ $documentation->datetime->isoFormat("LL") }}<br>
                    ({{ $documentation->datetime->diffForHumans() }})
                @endif
            </td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($documentation->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
