<?php
include_once "./autoload.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Single Student Result</title>
    <!-- ALL CSS FILES  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>

    <?php
//Update students data in DB

if ( isset( $_GET['student_id'] ) ) {
    // Get the student from URL
    $id = $_GET['student_id'];
    // Getting Students old data query
    $data    = connect()->query( "SELECT * FROM students WHERE id = '$id' LIMIT 1" );
    $student = $data->fetch_object();

}

?>



    <div class="wrap profile">
        <div class="card shadow-sm">
            <div class="card-body">
                <img src="./photos/<?php echo $student->photo ?>" alt="">
                <h2><?php echo $student->name ?></h2>
                <p><?php echo $student->email ?></p>
                <p><?php echo $student->cell ?></p>
                <a class=" btn btn-primary" href="./index.php">Back</a>
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