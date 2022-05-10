<?php
include_once "./autoload.php";

// Get the single student from DB

if ( isset( $_GET['student_id'] ) ) {
    $id      = $_GET['student_id'];
    $data    = connect()->query( "SELECT * FROM students WHERE id ='$id' LIMIT 1" );
    $student = $data->fetch_object();
} else {
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

    <?php
//Update students data in DB

if ( isset( $_POST['update'] ) ) {

    $id = $student->id;

    $name      = $_POST['name'];
    $email     = $_POST['email'];
    $cell      = $_POST['cell'];
    $gender    = $_POST['gender'] ?? '';
    $roll      = $_POST['roll'];
    $reg       = $_POST['reg'];
    $year      = $_POST['year'];
    $education = $_POST['education'];
    $board     = $_POST['board'];
    $location  = $_POST['location'];

//Photo information
    $file           = $_FILES['photo'];
    $photo_name     = time() . "_" . rand() . "_" . $file['name'];
    $photo_tmp_name = $file['tmp_name'];

// Form Validation
    if ( empty( $name ) || empty( $email ) ) {
        $msg = validate( 'All fields are required!' );
    } else {

        connect()->query( "UPDATE students SET name ='$name', email= '$email', cell ='$cell', gender = '$gender', roll ='$roll', reg='$reg', year='$year', education = '$education', board= '$board', location ='$location', photo='$photo_name' WHERE id ='$id'" );

        move_uploaded_file( $photo_tmp_name, "./photos/" . $photo_name );
        header( "location:./update_profile.php?student_id=$id" );
        $msg = validate( 'Profile Updated', 'success' );
    }

}

?>


    <div class="wrap">
        <a href="./" class="btn btn-primary btn-sm">All Students</a>
        <br>
        <br>
        <div class="card shadow-sm">
            <div class="card-body">
                <h2>Update Students Details</h2>
                <?php echo $msg ?? ''; ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input name="name" class="form-control" type="text" value="<?php echo $student->name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input name="email" class="form-control" type="text" value="<?php echo $student->email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Cell</label>
                        <input name="cell" class="form-control" type="text" value="<?php echo $student->cell; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <input name="gender" class="" type="radio" value="Male" id="male" <?php echo ( $student->gender ==
    "Male" ? 'checked="checked"' : '' ); ?>> <label for="male">Male</label>

                        <input name="gender" class="" type="radio" value="Female" id="female" <?php echo ( $student->gender
    ==
    "Female" ? 'checked="checked"' : '' ); ?>>
                        <label for="female">Female</label>

                    </div>
                    <div class="form-group">
                        <label for="year">Roll</label>
                        <input name="roll" class="form-control" type="text" value="<?php echo $student->roll; ?>">
                    </div>
                    <div class="form-group">
                        <label for="year">Registration No</label>
                        <input name="reg" class="form-control" type="text" value="<?php echo $student->reg; ?>">
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input name="year" class="form-control" type="text" value="<?php echo $student->year; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Education</label>
                        <select class="form-control" name="education" id="">
                            <option value="">--select--</option>
                            <option <?php

if ( $student->education == 'HSC' ) {
    echo ' selected="selected"';
}

?> value="HSC">HSC/Alim/Equivalent</option>
                            <option <?php

if ( $student->education == 'JSC' ) {
    echo ' selected="selected"';
}

?> value="JSC">JSC/JDC</option>
                            <option <?php

if ( $student->education == 'SSC' ) {
    echo ' selected="selected"';
}

?> value="SSC">SSC/Dakhil</option>
                            <option <?php

if ( $student->education == 'SSC-Voc' ) {
    echo ' selected="selected"';
}

?> value="SSC-Voc">SSC(Vocational)</option>
                            <option <?php

if ( $student->education == 'HSC-Alim' ) {
    echo ' selected="selected"';
}

?> value="HSC-Alim">HSC/Alim</option>
                            <option <?php

if ( $student->education == 'HSC-Voc' ) {
    echo ' selected="selected"';
}

?> value="HSC-Voc">HSC(Vocational)</option>
                            <option <?php

if ( $student->education == 'HSC-BM' ) {
    echo ' selected="selected"';
}

?> value="HSC-BM">HSC(BM)</option>
                            <option <?php

if ( $student->education == 'HSC-DC' ) {
    echo ' selected="selected"';
}

?> value="HSC-DC">Diploma in Commerce</option>
                            <option <?php

if ( $student->education == 'HSC-DB' ) {
    echo ' selected="selected"';
}

?> value="HSC-DB">Diploma in Business Studies</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="board">Board</label>
                        <select class="form-control" name="board">
                            <option value="" selected>Select One</option>
                            <option <?php

if ( $student->board == 'barisal' ) {
    echo ' selected="selected"';
}

?> value="barisal">Barisal</option>
                            <option <?php

if ( $student->board == 'chittagong' ) {
    echo ' selected="selected"';
}

?> value="chittagong">Chittagong</option>
                            <option <?php

if ( $student->board == 'comilla' ) {
    echo ' selected="selected"';
}

?> value="comilla">Comilla</option>
                            <option <?php

if ( $student->board == 'dhaka' ) {
    echo ' selected="selected"';
}

?> value="dhaka">Dhaka</option>
                            <option <?php

if ( $student->board == 'dinajpur' ) {
    echo ' selected="selected"';
}

?> value="dinajpur">Dinajpur</option>
                            <option <?php

if ( $student->board == 'jessore' ) {
    echo ' selected="selected"';
}

?> value="jessore">Jessore</option>
                            <option <?php

if ( $student->board == 'rajshahi' ) {
    echo ' selected="selected"';
}

?> value="rajshahi">Rajshahi</option>
                            <option <?php

if ( $student->board == 'sylhet' ) {
    echo ' selected="selected"';
}

?> value="sylhet">Sylhet</option>
                            <option <?php

if ( $student->board == 'madrasah' ) {
    echo ' selected="selected"';
}

?> value="madrasah">Madrasah</option>
                            <option <?php

if ( $student->board == 'tec' ) {
    echo ' selected="selected"';
}

?> value="tec">Technical</option>
                            <option <?php

if ( $student->board == 'dibs' ) {
    echo ' selected="selected"';
}

?> value="dibs">DIBS(Dhaka)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Location</label>
                        <select class="form-control" name="location" id="">
                            <option value="">--select--</option>
                            <option <?php

if ( $student->location == 'Mirpur' ) {
    echo ' selected="selected"';
}

?> value="Mirpur">Mirpur</option>
                            <option <?php

if ( $student->location == 'Uttara' ) {
    echo ' selected="selected"';
}

?> value="Uttara">Uttara</option>
                            <option <?php

if ( $student->location == 'Banani' ) {
    echo ' selected="selected"';
}

?> value="Banani">Banani</option>
                            <option <?php

if ( $student->location == 'Badda' ) {
    echo ' selected="selected"';
}

?> value="Badda">Badda</option>
                            <option <?php

if ( $student->location == 'Gulshan' ) {
    echo ' selected="selected"';
}

?> value="Gulshan">Gulshan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Photo</label>
                        <hr>
                        <img id="preview" src="./photos/<?php echo $student->photo; ?>" alt=""
                            style="max-width: 100%; display:block;">
                        <input name="photo" class="d-none" type="file" id="image_upload">
                        <label for="image_upload"> <img
                                style="width: 70px; height: 70px; cursor:pointer; display:block;"
                                src="https://www.manufacturersnigeria.org/img/icons/photoIcon.jpg" alt="" id="">
                        </label>
                    </div>
                    <div class="form-group">
                        <input name="update" class="btn btn-primary" type="submit" value="Update">
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


    <script>
    $('#image_upload').change(function(e) {
        let image = URL.createObjectURL(e.target.files[0]);
        $('#preview').attr('src', image)
    })
    </script>

</body>

</html>