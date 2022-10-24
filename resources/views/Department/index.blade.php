<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Department | Index</title>
</head>
<body>
    <h1>Welcome For Department Session</h1>

    <a href="{{route('department.create')}}">
        <button>add new department</button>
    </a>

    @if (session('done'))
        <h4>{{session('done')}}</h4>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <tr>
                <td>{{++$department->key}}</td>
                <td>{{$department->name}}</td>
                <td>{{$department->description}}</td>
                <td>
                    <form action="{{route('department.update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$department->id}}">
                        <input type="submit" value="Update">
                    </form>
                </td>
                <td>
                    <form action="{{route('department.delete')}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" value="{{$department->id}}">
                        <input type="submit" value="Delete">
                    </form>
{{--                    <a href="{{route('department.delete',[$department->id])}}">--}}
{{--                        <button>Delete</button>--}}
{{--                    </a>--}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
