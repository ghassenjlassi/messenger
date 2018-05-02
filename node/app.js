var app = require("http"),
    redis = require("redis"),
    mqtt = require('mqtt');
//mongoose = require('mongoose');
var mongodb = require("mongodb");
var MongoClient = mongodb.MongoClient;
var ObjectID = require('mongodb').ObjectID;
var DBRef = require('mongodb').DBRef;
var sender;
var server = app.createServer(handler).listen(7070);
console.log("oooooooo");

function handler(req, res) {
    console.log("Connexion établit");
    console.log('server created');
    createSocket();
    // res.end('Ok');
}
function createSocket() {
    var io = require('socket.io').listen(server);
    io.sockets.on('connection', function (socket) {

        var clientSession = new redis.createClient(6379, '127.0.0.1', {});
        socket.emit('connected');
        //console.log('Conn');

        var token;

        var session;
        //var mqttClient;
        socket.on('login', function (_token) {
            console.log('login:', _token.token);
            token = _token;
            console.log("PHPREDIS_SESSION:" + token.token);
            clientSession.get("PHPREDIS_SESSION:" + token.token, function (error, result) {
                if (error) {
                    console.log("error : " + error);
                }
                console.log(result, error);

                if (result !== null && result.toString() !== "") {
                    session = JSON.parse(result.toString());
                    console.log('Conn', session._sf2_attributes.id);
                    /*var mqttClient = mqtt.connect('mqtt://localhost');
                     */
                    var mqttClient = mqtt.connect({
                        clientId: session._sf2_attributes.id + "$1",
                        clean: false
                    });
                       //Premiere fois seulement
                      mqttClient.subscribe('user/' + session._sf2_attributes.id, {qos: 1});
                      console.log('Sub', 'user/' + session._sf2_attributes.id);
                      sender = session._sf2_attributes.id;
                      MongoClient.connect("mongodb://localhost:27017/dbwebmes", function (err, db) {
                            if (!err) {
                                   db.collection("GroupDis").find({"users.$id": ObjectID(sender)}, {"total": 1}).toArray(
                    function (err, item) {
                        if (!err) {
                            for (var i = 0; i < item.length; i++){
                              mqttClient.subscribe('groupe/' + item[i]._id, {qos: 1});
                              console.log('Sub', 'groupe/' + item[i]._id);  
                            }
                    } });
                            }
                        });
//conversation simpleeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
                    socket.on('message', function (message) {
                      
                         messageSended(mqttClient, session._sf2_attributes.id, message);
                         
                        MongoClient.connect("mongodb://localhost:27017/dbwebmes", function (err, db) {
                            if (!err) {
                                sender = session._sf2_attributes.id;

                                db.collection("Message").insert({sender: DBRef('User', ObjectID(session._sf2_attributes.id), 'dbwebmes'), receiver: DBRef('User', ObjectID(message.targetUser), 'dbwebmes'), message: message.content, date: new Date()});
                            }
                        });
                    });
                  
//conversation en grouuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuupe
                    socket.on('messagegroup', function (messagegroup) {
                        messageSendedgroup(mqttClient, session._sf2_attributes.id, messagegroup);
                        MongoClient.connect("mongodb://localhost:27017/dbwebmes", function (err, db) {
                            if (!err) {
                                sender = session._sf2_attributes.id;
                                db.collection("Message").insert({sender: DBRef('User', ObjectID(session._sf2_attributes.id), 'dbwebmes'), receivergroup: DBRef('User', ObjectID(messagegroup.targetUser), 'dbwebmes'), message: messagegroup.content, date: new Date()});
                            }
                        });
                    });

//..................................................................................................
         mqttClient.on('message', function (topic, message) {
                        console.log(topic, message);
                        var user = topic.split("/")[1];
                               MongoClient.connect("mongodb://localhost:27017/dbwebmes", function (err, db) {
                            if (!err) {
console.log(user);
                          db.collection("GroupDis").find({"_id": ObjectID(user)}).toArray(
                    function (err, item) {
                                if (item.length) {
                                   console.log(' grouuuuuuuuup');
                                    messageReceivedgroup(socket, user, message);
                                }
                                else{
                                 messageReceived(socket, user, message);}
                            });
                        }
                        });
                       
                    });
                    socket.on('disconnect', function () {
                        mqttClient.end();
                        console.log(session._sf2_attributes.username + ' disconnect');
                    });
                }
                else {
                    console.log("error session ");
                }
            });
        });
    });

}
//received from the broker
//callback
function messageReceived(socket, user, data) {
    MongoClient.connect("mongodb://localhost:27017/dbwebmes", function (err, db) {
        if (!err) {
            db.collection("User").find({"_id": ObjectID(sender)}).toArray(
                    function (err, item) {
                        if (!err) {
                            console.log('simmmmmmmmmmmmmmmmmmmmple');
                             socket.emit('message', {content: data, username: item[0].username, photo: item[0].photo, send: sender});
                            //socket.send(JSON.stringify(myObject));
                            console.log('messageReceived', user, data);}
                          
                    });
        }
    });

}//sended from the client
function messageReceivedgroup(socket, user, data) {
    MongoClient.connect("mongodb://localhost:27017/dbwebmes", function (err, db) {
        if (!err) {
            db.collection("User").find({"_id": ObjectID(sender)}).toArray(
                    function (err, item) {
                        if (!err) {
                            
                            console.log('en grouuuuuuuuuuuuuuuuup');
                             socket.emit('messagegroup', {content: data, username: item[0].username, photo: item[0].photo, send: sender});
                            //socket.send(JSON.stringify(myObject));
                            console.log('messageReceived', user, data);}
                          
                    });
        }
    });

}
function messageSended(mqttClient, me, data) {
    console.log('MessageSended to', 'user/' + data.targetUser);
    mqttClient.publish('user/' + data.targetUser, data.content, {qos: 1});
    console.log(me, data);
}
//conversation en grouuuuuuuuuuuuuuuuupe........................................
function messageSendedgroup(mqttClient, me, data) {
    console.log('MessageSended to', 'groupe/' + data.targetUser);
    mqttClient.publish('groupe/' + data.targetUser, data.content, {qos: 1});
    console.log(me, data);
    }
function ab2str(buf) {
    return String.fromCharCode.apply(null, new Uint8Array(buf));
}
