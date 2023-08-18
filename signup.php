<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type = "text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">  </script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'> 
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
    <link rel="stylesheet" href="mycss.css">
    <style>
        option{
            color: black;
        }
    </style>
</head>

<body>
    <?php 
    #DATABASE CONNECTION
    $host = 'localhost';
    $psw = 'login@123';
    $user = 'login';
    $db= 'userlog';
    $conn = new mysqli($host,$user,$psw,$db);
$uname = '';
$pwd = '';
$email = '';
$rank = '';
if ($conn->$connect_error) {
    # code...
    die('err connecting database');
}
echo 'conected';
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $uname = $_POST['username'];
    $pwd = $_POST['password'];
    $email = $_POST['email'];
    $rank = $_POST['rank'];
    $sql = "SELECT * FROM  users WHERE username='$uname' AND password='$pwd'";
$result = mysqli_query($conn, $sql)  ;
$count = mysqli_num_rows($result);  
$sql = "INSERT INTO users (username,password,email,rank) VALUES ('$uname','$pwd','$email','$rank')";
if ($count==1) {
    # code...
    echo 'connected good client';
}
if ($conn->query($sql)==TRUE) {
    # code...
    echo 'inserted';
 

}
else{
    echo 'something went wrong';
}

}
?>


    <div class="bg">
    </div>
    <div class="container " style="background: transparent;">

        <h1 style="text-align: center;">Chess Companion</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" style="border: 2px solid white;overflow: hidden;width: 50%;padding:10px;position: relative;left: 30%;top: 20vh;" id="chessform">
            <div class="form-group">
    
              <label for="username">Enter your name</label>
              <input required type="text" name='username' class="form-control" id="username"  placeholder="Username..">
             <br>
             <label for="email">Enter your email</label>
             <input required type="email" class="form-control" id="email" name='email'  placeholder="example@gmail.com">
            <br>
            <label for="rank">What's your rank?</label>
          <select name="rank" id="ranks" style="color: black;">
            <option value="GM">Grand Master(GM)</option>
            <option value="M">Master(M)</option>
            <option value="IM" selected>Intermediate(IM)</option>
            <option value="Bg">Beginner</option>
          </select>
           <br>
           <br>
             <label  for="pwd">Enter your password</label>
             <div>
                <input required type="password" class="form-control" id="pwd" name='password'  placeholder="password..">
                <img src="https://cdn-icons-png.flaticon.com/512/6803/6803345.png" alt="show" style="width: 30px;height: 30px;position: absolute;right: 30px;top: 257px;" id="show">
             </div>

             <br>
             <a href="signIn.html">Already One?</a>
            </div>
        
        <center>    <button type="submit" class="btn btn-primary">Submit</button>
    </center>      
    </form>
      </div>
  <script src="index2.js"></script>
    <script>

$(document).ready(function(){
    $('#chessform').on('submit',(e)=>{
        if (autenciation($('#username').val(),$('#pwd').val())&&$('#email').val()) {
            setName($('#username').val());
         
        }else{
            alert('invalid try again!')
            e.preventDefault();
        }
    })
    function autenciation(uname,pwd){
        let rgx  = /^[a-zA-Z\-]+$/;
if (uname.length>2&&pwd.length>=6&& uname.match(rgx)) {
    return true;
}
return false;
    }
$('#show').on('click',function()
{if (this.alt=='show') {
    this.alt = 'hide';
    $('#pwd').attr('type','text');
    this.src = 'https://static-00.iconduck.com/assets.00/eye-password-hide-icon-512x512-iv45hct9.png';  
 
}else{
    this.src ="https://cdn-icons-png.flaticon.com/512/6803/6803345.png";
    this.alt = 'show';
      $('#pwd').attr('type','password') ;

}

})

})
    </script>
</body>
</html>