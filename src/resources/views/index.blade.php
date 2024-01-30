<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
</head>
<body>
@if($address)
    <ul>
        @foreach($address as $addr)
            <li>ID: {{ $addr->id }}, Street: {{ $addr->street }}, Number: {{ $addr->number }}, ZIP: {{ $addr->zip }}, City: {{ $addr->city }}</li>
        @endforeach
    </ul>
@else
    <p>Nie je ziadna adresa</p>
@endif

</body>
</html>
