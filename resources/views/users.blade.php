<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LARAVEL 10 export import Excel to Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                LARAVEL 10 export import Excel to Database
            </div>
            <div class="card-body">
                <form action="{{route('users.import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Import User Data</button>
                </form>
                <table class="table table-bordered mt-3">
                    <tr>
                        <th colspan="3">
                            List Of Users
                            <a class="btn btn-warning float-end" href="{{ route('users.export') }}">Export User Data</a>
                        </th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </table>

            </div>

        </div>

    </div>

</body>
</html>
