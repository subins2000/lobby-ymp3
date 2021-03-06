msg = $("#workspace .message");
$.extend(lobby.app, {

  init: function(){
    this.bind_events();
  },

  int: function(){},

  addDownload: function(hash, sid, title){
    dwURL = lobby.url + "/lobby/ar/app/ymp3/download?hash=" + hash + "&s=" + sid + "&csrfToken=" + lobby.csrfToken;
    msg.html("<div class='vidInfo'><div class='title'>"+ title +"</div><div class='download'><a class='btn red' id='downloadURL' href='" + dwURL + "'>Download</a></div></div></div>");
  },

  progress: function(id){
    lobby.app.ar("progress", {"id": id}, function(data){
      data = JSON.parse(data);
      clearInterval(lobby.app.int);
      msg.html("Conversion is Progressing. Currently in phase " + data.progress);
      if(data.progress === "3"){
        lobby.app.addDownload(id, data.sid, data.title);
      }else{
        lobby.app.int = setInterval(function(){
          lobby.app.progress(id);
        }, 2500);
      }
    });
  },

  convert: function(videoURL){
    lobby.app.ar("convert", {"url" : videoURL}, function(data){
      if(data === ""){
        msg.html("Error");
      }else{
        data = JSON.parse(data);
        if(data.hash != null && data.error == ""){
          if(typeof data.sid === "undefined"){
            msg.html("Please wait while the server converts the video...<a clear id='refresh' class='btn blue' data-video='"+ videoURL +"'>Refresh Status</a>");
            lobby.app.progress(data.hash);
          }else{
            lobby.app.addDownload(data.hash, data.sid, data.title);
          }
        }else{
          msg.html("Error");
        }
      }
    });
  },

  bind_events: function(){
    $("#workspace #downloadURL").live("click", function(e){
      e.preventDefault();
      url = $(this).attr("href");
      $("<iframe src='"+ url +"'></iframe>").css("display", "none").appendTo("body");
    });

    $("#workspace #convertVideo").live("click", function(){
      videoURL = $("#videoURL").val();
      if(videoURL == ""){
        msg.html("Please Enter A Video URL");
      }else{
        msg.html("Converting...");
        lobby.app.convert(videoURL);
      }
    });

    $("#workspace #refresh").live("click", function(){
      lobby.app.convert($(this).data("video"));
    });
  }
});
lobby.app.init();
