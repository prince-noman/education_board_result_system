<?php
include_once "./autoload.php";

//Delete Students from DB
if ( isset( $_GET['student_id'] ) ) {
    // Get the student from URL
    $id = $_GET['student_id'];
    // Delete query
    connect()->query( "DELETE FROM students WHERE id = '$id'" );
    // Remove student id from URL and send user to the homepage
    header( "location:./" );
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Development Area</title>
    <!-- ALL CSS FILES  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>


    <div class="wrap-table">
        <a href="./create.php" class="btn btn-primary btn-sm">Add new student</a>
        <br>
        <form action="" class="form-inline" method="POST">
            <div class="my-3">
                <select class="form-control" name="ls" id="">
                    <option value="">--select--</option>
                    <option value="Mirpur">Mirpur</option>
                    <option value="Uttara">Uttara</option>
                    <option value="Banani">Banani</option>
                    <option value="Badda">Badda</option>
                    <option value="Gulshan">Gulshan</option>
                </select>

                <select class="form-control" name="edu" id="">
                    <option value="">--select--</option>
                    <option value="PSC">PSC</option>
                    <option value="JSC">JSC</option>
                    <option value="HSC">HSC</option>
                    <option value="BSC">BSC</option>
                </select>

            </div>
            <div class="my-3">
                <input name="search" type="submit" value="search" class="btn btn-primary btn-sm">
            </div>
        </form>
        <br>
        <div class="card shadow-sm">
            <div class="card-body">
                <h2>All Data</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>Reg</th>
                            <!-- <th>Gender</th> -->
                            <th>Education</th>
                            <th>Year</th>
                            <th>Board</th>
                            <th>Edit Result</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>



                        <?php
//Fetching data from DB
$data = connect()->query( "SELECT * FROM students ORDER BY roll ASC" );
$i    = 1;

?>

                        <?php
//Inserting Data into table row

while ( $students = $data->fetch_object() ): ?>
                        <tr>
                            <!-- <td></td> -->
                            <td><?php echo $i;
$i++; ?>
                            </td>
                            <td><?php echo $students->name; ?></td>
                            <td><?php echo $students->roll; ?></td>
                            <td><?php echo $students->reg; ?></td>
                            <td><?php echo $students->education; ?></td>
                            <td><?php echo $students->year; ?></td>
                            <td><?php echo $students->board; ?></td>
                            <td>
                                <?php

if ( $students->bn == NULL || $students->en == NULL ): ?>
                                <a class="btn btn-warning btn-sm"
                                    href="./marks.php?student_id=<?php echo $students->id; ?>">Set
                                    Result</a>
                                <?php else: ?>
                                <a class="btn btn-primary btn-sm" href="./results">Check Results</a>
                                <?php endif;?>
                            </td>

                            <td><img src="./photos/<?php echo $students->photo; ?>" alt=""></td>
                            <td>
                                <a class=" btn btn-sm btn-info"
                                    href="./profile.php?student_id=<?php echo $students->id; ?>">View</a>
                                <a class="btn btn-sm btn-warning"
                                    href="./update_profile.php?student_id=<?php echo $students->id; ?>">Edit</a>
                                <a class="btn btn-sm btn-danger"
                                    href="?student_id=<?php echo $students->id; ?>">Delete</a>
                            </td>
                        </tr>

                        <?php endwhile;?>

                    </tbody>
                </table>
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