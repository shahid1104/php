<?php
require "../init.php";

if (logged_in() === true) {
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id,'user_id','username','password','name','email');
    //print_r($user_data);
}

if (empty($_POST)===false){
    if (md5($_POST['current_password']) === $user_data['password']){
        if (trim($_POST['new_password']) !== trim($_POST['new_password_again'])){
            //$errors[] = 'your possword don\'t match';
            header('Location: ../view/changepassword.php?errors=your possword don\'t match');
        }
        else if (strlen($_POST['new_password']) < 6){
            //$errors[] = 'please enter min 6 char pass';
            header('Location: ../view/changepassword.php?errors=please enter min 6 char pass');
        }
    }
    else {
        //$errors[] = 'please enter right password';
        header('Location: ../view/changepassword.php?errors=Enter Right Password');
    }

}

?>