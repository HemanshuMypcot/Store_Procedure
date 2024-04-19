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
@include('link')
<body>
    <h2>Update Form</h2>
    <form action="/update" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$editData->id}}">
        <input type="text" name="name" id="name" placeholder="Name" value="{{$editData->name}}"><br><br>
        <input type="number" name="age" id="age" placeholder="Age" value="{{$editData->age}}"><br><br>
        <input type="phone" name="phone" id="phone" minlength="10" maxlength="10" placeholder="Phone" value="{{$editData->phone}}"><br><br>
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
</body>

</html>
