<?php

 if(isset($_POST['signup'])){
     $screenName=$_POST['screenName'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     if(empty($screenName) or empty($email) or empty($password)){
        $error="all fields are required";
     }else{
         $email=$getFromU->checkInput($email);
         $password=$getFromU->checkInput($password);
         $screenName=$getFromU->checkInput($screenName);
         if(!filter_var($email)){
             $error="invalid email format";
         }elseif (strlen($screenName)>20){
             $error="name must be 6-20 length";
         }elseif (strlen($password)<5){
             $error="password is too short";
         }else{
             if($getFromU->checkEmail($email)===false){
                 $error="email address is already used";
             }else{

                    $getFromU->register($email, $password, $screenName);
             }
         }


     }
 }
?>
<form method="post">
<div class="signup-div"> 
	<h3>Sign up </h3>
	<ul>
		<li>
		    <input type="text" name="screenName" placeholder="Full Name"/>
		</li>
		<li>
		    <input type="email" name="email" placeholder="Email"/>
		</li>
		<li>
			<input type="password" name="password" placeholder="Password"/>
		</li>
		<li>
			<input type="submit" name="signup" Value="Signup for Twitter">
		</li>
	</ul>
    <?php
        if(isset($error)){
            echo "	 <li class=\"error-li\">
	  <div class=\"span-fp-error\">'.$error.'</div>
	 </li>";
        }
    ?>



</div>
</form>