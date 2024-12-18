<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @vite('resources/js/app.js')
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h1>Products</h1>
                <form action="/product-store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" class="form-control"><br>
                    <input type="text" name="name" class="form-control" placeholder="Enter the message..">
                    <input type="submit" name="ok" class="btn btn-primary mt-3" value="Send">
                </form>
                <ul id="messageList" class="mt-5 list-group">
                    @foreach ($messages as $message)
                        <li class="list-group-item">
                            <strong>{{ $message->name }}</strong><br>
                            <img src="{{'images/' . $message->image }}"  class="img-fluid mt-2"
                                style="max-width: 200px;">
                                <p>images/{{ $message->image }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
