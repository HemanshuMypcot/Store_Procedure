<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        form {
            width: 40%;
            padding: 20px
        }
    </style>
</head>
@include('link');
<body>
    <form action="/insert" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="Name"><br><br>
        <input type="number" name="age" id="age" placeholder="Age"><br><br>
        <input type="phone" name="phone" id="phone" minlength="10" maxlength="10" placeholder="Phone"><br><br>
        <button type="submit" class="btn btn-info">Submit</button>
    </form>
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
    @if (session('updateSuccess'))
        <script>
            alert("{{ session('updateSuccess') }}");
        </script>
    @endif
    @if (session('updateError'))
        <script>
            alert("{{ session('updateError') }}");
        </script>
    @endif
<div class="container">

    <table class="table">
        <tr >
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td scope="col">{{ $item->id }}</td>
                <td scope="col">{{ $item->name }}</td>
                <td scope="col">{{ $item->age }}</td>
                <td scope="col">{{ $item->phone }}</td>
                <td scope="col"><a href="/update/{{ $item->id }}" class="btn btn-success mx-2"  rel=""
                        >EDIT</a><a href="/delete/{{ $item->id }}"
                         class="btn btn-danger" rel="">DELETE</a></td>

            </tr>
        @endforeach
    </table>
</div>
</body>

</html>
