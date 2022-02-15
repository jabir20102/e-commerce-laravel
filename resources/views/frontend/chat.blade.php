@extends('frontend.master')

@section('main')
    
    
            @if($users->count() > 0)
             
<div class="container-fluid">
  <div>
  <h3 class=" text-left">Chat  <span id="message_with"></span> </h3>
  <p style="cursor: pointer" id="clear-btn" class=" text-danger">Clear chat history</p>
          
  <div class="messaging">
      <div class="inbox_msg">
        <div class="mesgs">
           
          <div id="chat_history" class="msg_history">
                  
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
                <form id="sendForm" method="POST">
                    @csrf
              <input id="message" name="message" type="text" class="write_msg" placeholder="Type a message"  />
              <button id="btn-submit" class="msg_send_btn" type="submit">
                  <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
              </button>
          </form>
            </div>
          </div>
        </div>
        <div class="inbox_people">
          <div class="inbox_chat">
            @foreach($users as $user)
                <div id="active_add_{{$user->id}}" class="chat_list ">
                <div class="chat_people">
                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                    <div class="chat_ib">
                        <h5>  <button id="{{ $user->id }}" type="button" class="btn btn-info btn-sm chat_btn" 
                            data-toggle="modal" 
                            data-target="#myModal">{{ $user->name }}</button>
                     <span class="chat_date">Dec 25</span></h5>
                    {{-- <p>Test, which is a new approach to have all solutions 
                        astrology under one roof.</p> --}}
                    </div>
                </div>
                </div>
                @endforeach
          </div>
        </div>
      
  
        
       
  
       </div>
  </div>
</div>

            @else
                <p>No users found! try to add a new user using another browser by going to <a href="{{ url('register') }}">Register page</a></p>
            @endif

            @section('script')
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
           $('active_add_'+$(this).attr('id')). addClass('active_chat');
          //  alert($('active_add_'+$(this).attr('id').id));
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
           if(to!=""){
             if($('#message').val()!=""){
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
             } 
           }else{
             alert("Select a person to chat");
           }
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
    @endsection

    @endsection

