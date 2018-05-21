<?php
session_start();

require_once 'db.php';

if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
    $query = "SELECT * FROM user WHERE email='$email' AND password='$pass'";
    $result = $dbcon->query($query);
    $row = mysqli_fetch_array($result);
    $name = $row['username'];
    $id = $row['id'];
    $role = $row['role'];

    if($name != '' && $email != ''){
        $_SESSION['login']='true';
        $_SESSION['role'] = $role;
        $_SESSION['id'] = $id;
        
        if($role == 1){
            echo "<script>alert('you are a admin')</script>";
            echo "<script type = 'text/javascript'> document.location = 'admin.php'; </script>"; 
        }
        
    else{
        echo "<script>alert('you are a user')</script>";
        echo "<script type = 'text/javascript'> document.location = 'user.php'; </script>"; 
    }
    

}
else{
    echo "<script>alert('you are nothing')</script>";
        echo "<script type = 'text/javascript'> document.location = 'log.php'; </script>"; 
}
}
?>