<?php 

$title = 'Success';
require_once 'includes/header.php'; 
require_once 'db/conn.php';

if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['specialty'];

    $orig_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = "$target_dir$contact.$ext";
    move_uploaded_file($orig_file,$destination);

    $isSuccess = $crud->insertAttendees($fname,$lname,$dob,$email,$contact,$specialty,$destination);

    


    if($isSuccess){
        include 'includes/successmessage.php';
    }
    else{
        include 'includes/errormessage.php';
    }

}

?>

    
    <!--

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php //echo $_GET['firstname'] . ' ' . $_GET['lastname'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php //echo $_GET['specialty'] ?></h6>
            <p class="card-text">Date of Birth: <?php //echo $_GET['dob'] ?></p>
            <p class="card-text">Email Adress: <?php //echo $_GET['email'] ?></p>
            <p class="card-text">Contact Number<?php //echo $_GET['phone'] ?></p>
        </div>
    </div>
    
    -->
<img src="<?php echo $destination; ?>" class="rounded-circle" style="width: 20%; heigth: 20%" />
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['specialty'] ?></h6>
            <p class="card-text">Date of Birth: <?php echo $_POST['dob'] ?></p>
            <p class="card-text">Email Adress: <?php echo $_POST['email'] ?></p>
            <p class="card-text">Contact Number<?php echo $_POST['phone'] ?></p>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
<?php require_once 'includes/footer.php'; ?>