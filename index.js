var app    = require('express')();
var server = require('http').Server(app);
var io     = require('socket.io')(server);

server.listen(6969);
app.get('/', function(req, res){
  res.sendFile(__dirname + "htmlnya/index.html");
});
io.on('connection', function(socket){
  console.log("Connected " + socket.id);

  socket.on('chat.message', function(message){
    io.emit('chat.message', message);
  });
});