<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button onclick="cancel()" type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title"><span id="message_with"></span> 
            <button style="float: left" id="clear-btn" class="btn btn-danger btn-sm">Clear chat history</button>
          
          </h4>
          
        </div>
        <div class="modal-body">
         
          <div class="messaging">
              <div class="inbox_msg">
                     
        
                <div class="mesgs">
                 
                  <div id="chat_history" class="msg_history">
                          
                  </div>
                  <div class="type_msg">
                    <div class="input_msg_write">
                        <form id="sendForm" method="POST">
                            @csrf
                      <input id="message" name="message" type="text" class="write_msg" placeholder="Type a message" />
                      <button id="btn-submit" class="msg_send_btn" type="submit">
                          <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                      </button>
                  </form>
                    </div>
                  </div>
                </div>
        
              </div>
              
             
        </div>
        </div>
        
      </div>
    </div>
  </div>
  <script type="text/javascript">  
   var to="";
  // Enable pusher logging - don't include this in production
  // Pusher.logToConsole = true;
  
  var pusher = new Pusher('9771f18170e415740bfe', {
      cluster: 'us3'
    });
  // pusher.unsubscribe(channelName);
  var channel = pusher.subscribe("chat");
  
  channel.bind({{Auth::user()->id}}, function(member) {
      checkTo(member);
  
  });
  function checkTo(member){
          if(member.from==to){
          var child=`<div class="incoming_msg">
          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
          <div class="received_msg">
          <div class="received_withd_msg">
              <p>${member.name}</p> 
              <p>${member.message}</p> 
              <span class="time_date">${new Date().toLocaleString()}</span></div>
          </div>
          </div>`;
          document.getElementById('chat_history').innerHTML+=child;
          $('#chat_history').scrollTop($('#chat_history')[0].scrollHeight); 
  }else{
      alert(member.message+" from "+member.name);
  }
  }
  function cancel(){
      to="";
  }
  
  
  
  $(".chat_btn").click(function(e){
      e.preventDefault();
      
      
      to=$(this).attr('id');
      
      document.getElementById('message_with').innerHTML=$(this).html();//attr('id');
      $.ajax({    
          type:'GET',    
          url:"{{ url('open-chat') }}",    
          data: { user:$(this).attr('id')   },   
          success:function(data){
            //  console.log(data);
          document.getElementById('chat_history').innerHTML=data; 
          $('#chat_history').scrollTop($('#chat_history')[0].scrollHeight); 
          }
      });   
       
  });       
  $("#btn-submit").click(function(e){
      
      e.preventDefault();
      
      $.ajax({    
          type:'POST',    
          url:"{{ url('sendMessage') }}",    
          data: $('#sendForm').serialize(),    
          success:function(data){
              var child=`<div class="outgoing_msg">
                    <div class="sent_msg">
                    <p>${$('#message').val()}</p>
                    <span class="time_date">${new Date().toLocaleString()}</span>
                    
                </div>`;              
                document.getElementById('chat_history').innerHTML+=child; 
                $('#chat_history').scrollTop($('#chat_history')[0].scrollHeight); 
                $('#message').val('');
          }
      }); 
  });
  $("#clear-btn").click(function(e){
      
      e.preventDefault();      
      $.ajax({    
          type:'GET',    
          url:"{{ url('clearChat') }}",     
          success:function(data){
            //  console.log(data);
            document.getElementById('chat_history').innerHTML="";
            }
      }); 
  });
  
  </script>