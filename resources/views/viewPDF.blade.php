<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Generate PDF Example</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @font-face{
            font-family: 'ipag';
            src: url({{public_path('fonts/ipag.ttf')}}) format("truetype");
            font-style: normal;
            font-weight: normal;
        }

        body{
            font-family: 'ipag' ;
            
        }
        td {
            color:black; 
        }
    </style>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container px-4 mx-auto">

        {{!! $chart->container() !!}}

    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>
    <a href="{{route('export-pdf')}}" class="btn btn-success" > Export PDF</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        @foreach($notes as $note)
        <tr>
            <td>{{ $note->id }}</td>
            <td>{{ $note->name }}</td>
            <td>{{ $note->content }}</td>
        </tr>
        @endforeach
    </table>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
  
</body>
</html>