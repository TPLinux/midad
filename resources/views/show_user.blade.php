<style>
 body{
     padding:0;
     margin:0;
 }
 #user-cover{
     width:100%;
     height:380px;
 }

 #user-pic{
     margin-top: -122px;
     position: absolute;
     width: 155px;
     height: 155px;
     margin-left: 45%;
     border-radius:50%;
     border:4px solid black;
 }
</style>
<img id="user-cover" src="{{ asset('public' . $user->u_cover) }}"/>
<img id="user-pic" src="{{ asset('public' . $user->u_pic) }}"/>
<b>Username</b> {{$user->u_username}}
<br/>
<br/>
<h1>
    User info :
</h1>
<br/>
<br/>
<br/>
<pre>
{{print_r($user)}}
