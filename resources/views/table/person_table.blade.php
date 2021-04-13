<!DOCTYPE html>

<head>

<title>Person_Table</title>

</head>

<body>

@foreach ($person_list as $person)
    {{ $person->id }} <br>
    {{ $person->email }} <br>
@endforeach
</body>
</html>