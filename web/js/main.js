var socket = io.connect('http://192.168.1.3:7070');
var id = $('#session').data('id');
var client = $('#clientInput').data('client');
var clientgroup = $('#clientgroup').data('clientgroup');
var username = $('#param').data('username');
var photo = $('#param').data('photo');
var idme = $('#param').data('id');

socket.on('connected', function () {
    console.log('socket connected');
    socket.emit('login', {token: id});
});

socket.on('message', function (message) {
    if (client === message.send) {
        // Ajoute un message dans la page
        $('#resultat').append('<div class="direct-chat-msg right" ><div class="direct-chat-info clearfix">\n\
<span class="direct-chat-name pull-right">' + message.username + '</span>\n\
</div><img  class="direct-chat-img" src="' + message.photo + '" /><div class="direct-chat-text">' + ab2str(message.content) + '</div></div> ');
    }
    $('#notification').append('<span class="label label-success">' + 1 + '</span>');
    //$("#mesg").append($("<p></p>").text(ab2str(message.content)));
    $("#chat").animate({scrollTop: $("#chat").prop('scrollHeight')}, 100);
});

socket.on('messagegroup', function (message) {
    if (idme !== message.send) {
        // Ajoute un message dans la page
        $('#resultatgroup').append('<div class="direct-chat-msg right" ><div class="direct-chat-info clearfix">\n\
<span class="direct-chat-name pull-right">' + message.username + '</span>\n\
</div><img  class="direct-chat-img" src="' + message.photo + '" /><div class="direct-chat-text">' + ab2str(message.content) + '</div></div> ');
    }
    $('#notification').append('<span class="label label-success">' + 1 + '</span>');
    //$("#mesg").append($("<p></p>").text(ab2str(message.content)));
    $("#chatgroup").animate({scrollTop: $("#chat").prop('scrollHeight')}, 100);
});

$(document).ready(function () {
    $('#form').submit(function (e) {
        e.preventDefault();
        var msg = $("#message").val();
        if (msg !== "") {
            socket.emit('message', {content: msg, targetUser: client});
            // Ajoute un message dans la page
            $('#resultat').append('<div class="direct-chat-msg" ><div class="direct-chat-info clearfix"><span class="direct-chat-name pull-left">' + username + '</span>\n\
         </div> <img  class="direct-chat-img" src="' + photo + '" /><div class="direct-chat-text">' + msg + '</div></div> ');
            $('#message').val('').focus();
            $('#notification').empty();
            $("#chat").animate({scrollTop: $("#chat").prop('scrollHeight')}, 100);
            //return false; Permet de bloquer l'envoi "classique" du formulaire
        }

    });

});

$(document).ready(function () {
    $('#formgroup').submit(function (e) {
        e.preventDefault();
        var msg = $("#messagegroup").val();
        if (msg !== "") {
            socket.emit('messagegroup', {content: msg, targetUser: clientgroup});
            // Ajoute un message dans la page
            $('#resultatgroup').append('<div class="direct-chat-msg" ><div class="direct-chat-info clearfix"><span class="direct-chat-name pull-left">' + username + '</span>\n\
         </div> <img  class="direct-chat-img" src="' + photo + '" /><div class="direct-chat-text">' + msg + '</div></div> ');
            $('#messagegroup').val('').focus();
            $('#notification').empty();
            $("#chatgroup").animate({scrollTop: $("#chatgroup").prop('scrollHeight')}, 100);
            // return false; Permet de bloquer l'envoi "classique" du formulaire
        }
    });
});


function ab2str(buf) {
    return String.fromCharCode.apply(null, new Uint8Array(buf));
}