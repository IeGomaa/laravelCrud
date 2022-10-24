<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Department | Create</title>
</head>
<body>


    @if(Session::has('errors'))
        @foreach(Session::get('errors')->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif

{{--    @if($errors->any())--}}
{{--        @foreach($errors->all() as $error)--}}
{{--            {{$error}}<br>--}}
{{--        @endforeach--}}
{{--    @endif--}}

    <form action="{{route('department.insert')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Enter Name"><br>
        <textarea name="description" rows="10" placeholder="Enter Description"></textarea><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>
