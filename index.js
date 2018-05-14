'use strict';

const express = require('express');
const socketIO = require('socket.io');
const path = require('path');

const PORT = process.env.PORT || 3000;
const INDEX = path.join(__dirname, 'index.html');

const server = express()
  .use((req, res) => res.sendFile(INDEX) )
  .listen(PORT, () => console.log(`Listening on ${ PORT }`));

const io = socketIO(server);

io.on('connection', (socket) => {
  console.log('Client connected');
  socket.on('disconnect', function(){
    io.emit('users-changed', {user: socket.nickname, event: 'left'});   
  });

  socket.on('set-nickname', (nickname) => {
    socket.nickname = nickname;
    io.emit('users-changed', {user: nickname, event: 'joined'});    
  });
  socket.on('add-message', (message) => {
    io.emit('message', {text: message.text, nombre: message.nombre ,from: socket.nickname, created: new Date()});    
  });
  socket.on('add-ruta', (message) => {
    io.emit('ruta', {idcli:message.idcli,idcon:message.idcon, id_servicio:message.id_servicio, nombre: message.nombre, apellido: message.apellido ,correo: message.correo, cedula:message.cedula,
      celular:message.celular,origen:message.origen,destino:message.destino,latOri:message.latOri,lngOri:message.lngOri,latDes:message.latDes,lngDes:message.lngDes});    
  });
  socket.on('add-rutacon', (message)=>{
    io.emit('rutacon', {id_con:message.id_con, nombre: message.nombre, apellido: message.apellido,serviciochat:message.serviciochat,para:message.para});    
  });
  socket.on('posicioncon', (message)=>{
    io.emit('posicioncon', {latitudDes:message.latitudDes,longitudDes:message.longitudDes,latitud: message.latitud, longitud: message.longitud, estid:message.estid,para:message.para});    
  });
  socket.on('cancelars', (message)=>{
    io.emit('cancelars', {para:message.para});    
  });


  // vianco nelson
  socket.on('set-nickname-nelson', (nickname) => {
    socket.nicknamenelson = nickname;
    io.emit('users-changed', {user: nickname, event: 'joined'});    
  });
socket.on('add-message-nelson', (message) => {
    io.emit('message-nelson', {text: message.text, nombre: message.nombre ,from: socket.nicknamenelson,para:message.para, created: message.created});
});
});



setInterval(() => io.emit('time', new Date('HH:mm:ss').toTimeString()), 1000);
