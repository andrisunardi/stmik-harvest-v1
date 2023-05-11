<table>
    <tr><th align="center" colspan="9"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="9"><b>{{ Str::upper(Str::translate($title)) }}</b></th></tr>
    <tr><th align="center" colspan="9">{{ trans("index.printed_date") }} : {{ now()->isoFormat("LLLL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.company") }}</b></th>
        <th align="center"><b>{{ trans("index.email") }}</b></th>
        <th align="center"><b>{{ trans("index.phone") }}</b></th>
        <th align="center"><b>{{ trans("index.subject") }}</b></th>
        <th align="center"><b>{{ trans("index.message") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
    </tr>
    @foreach ($contacts as $contact)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->company }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->subject }}</td>
            <td>{{ $contact->message }}</td>
            <td align="center">{{ Str::translate(Str::active($contact->is_active)) }}</td>
        </tr>
    @endforeach
</table>
