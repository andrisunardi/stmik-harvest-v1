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
        <th align="center"><b>{{ trans("index.company") }}</b></th>
        <th align="center"><b>{{ trans("index.email") }}</b></th>
        <th align="center"><b>{{ trans("index.phone") }}</b></th>
        <th align="center"><b>{{ trans("index.subject") }}</b></th>
        <th align="center"><b>{{ trans("index.message") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($contacts as $contact)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $contact->id }}</td>
            <td align="center">{{ $contact->code }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->company }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->subject }}</td>
            <td>{{ $contact->message }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($contact->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
