
<?php 

$title = 'User Login';
require_once 'includes/header.php'; 
require_once 'db/conn.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    $new_password = md5($password.$username);

    $result = $user->getUser($username,$new_password);

    if(!$result){
        echo "<div class='alert-danger'>Username or Password is Incorrect! Please try again. </div>";
    }
    else{
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $result['id'];
        header("Location: viewrecords.php");
    }
}

?>

<h1 class="text-center"><?php echo $title ?> </h1>

<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="post">

<table class="table table-sm">
    <tr>
        <td><label for="username">Username: *</label></td>
        <td><input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">

        
    </td>
    </tr>
    <tr>
    <td><label for="password">Password: *</label></td>
    <td><input type="password" name="password" class="form-control" id="password" >

    

    </td>
    </tr>
</table>
<input type="submit" value="login" class="btn btn-primary btn-block"><br/>
<a href="a">Forgot Password</a>
</form>


<?php require_once 'includes/footer.php'; ?>