<?php
include_once "./autoload.php";

// Fetch single student id
if ( isset( $_GET['student_id'] ) ) {
    // Get the student from URL
    $id = $_GET['student_id'];
    // Getting Students old data query
    $data    = connect()->query( "SELECT * FROM students WHERE id = '$id' LIMIT 1" );
    $student = $data->fetch_object();
} else {
    header( "location:./" );
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $student->name ?></title>
    <!-- ALL CSS FILES  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>

    <?php

// Get students marks from DB

if ( isset( $_POST['result_add'] ) ) {
    $bn   = $_POST['bn'];
    $en   = $_POST['en'];
    $math = $_POST['math'];
    $sc   = $_POST['sc'];
    $ssc  = $_POST['ssc'];
    $reli = $_POST['reli'];

// Marks Form Validation

    if ( empty( $bn ) || empty( $en ) ) {
        $msg = validate( 'All fields are require!' );
    } else {
        connect()->query( "UPDATE students SET bn = '$bn', en='$en', math= '$math', sc = '$sc', ssc= '$ssc', reli= '$reli' WHERE id = '$id' " );
        header( "location:.//marks.php?student_id=$id" );
        $msg = validate( 'Results Updated', 'success' );
    }

}

?>


    <div class="wrap">
        <a href="./" class="btn btn-primary btn-sm">Back</a>
        <br>
        <br>
        <div class="card shadow-sm">
            <div class="card-body">
                <h2>Set Marks</h2>
                <?php echo $msg ?? ''; ?>
                <form action="" method="POST">

                    <div class="profile">
                        <img src="./photos/<?php echo $student->photo; ?>" alt="">
                        <h2><?php echo $student->name ?></h2>
                        <p>Roll: <?php echo $student->roll ?></p>
                        <p>Registration No: <?php echo $student->reg ?></p>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">Bangla</label>
                        <input name="bn" class="form-control" type="text" value="<?php echo $student->bn ?>">
                    </div>
                    <div class="form-group">
                        <label for="">English</label>
                        <input name="en" class="form-control" type="text" value="<?php echo $student->en ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Math</label>
                        <input name="math" class="form-control" type="text" value="<?php echo $student->math ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Science</label>
                        <input name="sc" class="form-control" type="text" value="<?php echo $student->sc ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Social Science</label>
                        <input name="ssc" class="form-control" type="text" value="<?php echo $student->ssc ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Religion</label>
                        <input name="reli" class="form-control" type="text" value="<?php echo $student->reli ?>">
                    </div>

                    <div class="form-group">
                        <input name="result_add" class="btn btn-primary" type="submit" value="Set Result">
                    </div>
                </form>
            </div>
        </div>
    </div>








    <!-- JS FILES  -->
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>




</body>

</html>