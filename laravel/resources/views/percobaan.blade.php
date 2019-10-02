<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('asset/css/materialize.min.css') }}">
  <style>
    
  </style>
</head>
<body>
  <div class="container">
    <div class="row" style="margin-top: 20px;">
      <h5 class="grey-text text-darken-3">Contoh pemakaian node js -> socket.io</h5>
      <div class="col s12 m5">
        <div class="input-field">
          <label for="pesan">Pesan</label>
          <textarea class="materialize-textarea" id="pesan"></textarea>
        </div>
        <button id="submit" class="btn">Submit</button>
        <br><br>
        <ol id="message-list"></ol>
      </div>
    </div>
  </div>
  
  <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
  <script src="{{ asset('asset/js/materialize.min.js') }}"></script>
  <script src="{{ asset('asset/js/socket.io.js') }}"></script>
  <script>
    $(document).ready(function () {
      var socket = io('http://localhost:6969');
      socket.on('chat.message', function(res){
        $('#message-list').append("<li>" + res + "</li>");
      });
      $('#submit').click(function(){
        socket.emit('chat.message', $('#pesan').val());
      })
    });
  </script>
</body>
</html>