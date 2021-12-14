<!DOCTYPE html>
<html>
<head>
    <title>Cut the URL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        function call() {
            var msg   = $('#CutUrlController').serialize();
            $.ajax({
                type: 'POST',
                url: 'CutUrlController.php', //обращаемся к обработчику
                data: msg,
                success: function(data) {  //в случае успеха выводим результаты в div "results"
                    $('#CutUrlController').remove(); //скрываем форму после отправки
                    $('#results').html(data); //показываем сообщение об успехе вместо неё
                },
                error:  function(xhr, str){ //ошибка выводит соответствующее сообщение
                alert('Возникла ошибка: ' + xhr.responseCode);
                }
            });
        }
    </script>
</head>
<body>

<div class="container">
    <h1>Abbreviate your URL through Laravel</h1>

    <div class="card">
      <div class="card-header">
        <div id="results"> </div>
        <form method="POST" action="{{ route('abbreviated.link.post') }}" onsubmit="call()">
            @csrf
            <div class="input-group mb-3">
              <input type="text" name="link" class="form-control" placeholder="Enter URL: http://example.com" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Minimize your URL</button>
              </div>
            </div>
        </form>
      </div>
      <div class="card-body">

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Your URL</th>
                        <th>Short URL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shortLinks as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->link }}</td>
                            <td><a href="{{ route('shorten.link', $row->solt) }}" target="_blank">{{ route('shorten.link', $row->solt) }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>

</div>

</body>
</html>
