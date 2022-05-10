<?php
include_once "./autoload.php";

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

// Getting form value

if ( isset( $_POST['student_add'] ) ) {
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
        //Sending data into DB
        connect()->query( "INSERT INTO students (name, email, cell, gender, roll, reg, year, education, board, location, photo) VALUES ('$name', '$email', '$cell', '$gender', '$roll', '$reg', '$year', '$education', '$board', '$location', '$photo_name' )" );

        $msg = validate( 'Student Added', 'success' );
        move_uploaded_file( $photo_tmp_name, "./photos/" . $photo_name );
    }

}

?>





    <div class="wrap">
        <a href="./" class="btn btn-primary btn-sm">All Students</a>
        <br>
        <br>
        <div class="card shadow-sm">
            <div class="card-body">
                <h2>Add new students</h2>
                <?php echo $msg ?? ''; ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input name="name" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input name="email" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Cell</label>
                        <input name="cell" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <input name="gender" class="" type="radio" value="Male" id="male"> <label
                            for="male">Male</label>
                        <input name="gender" class="" type="radio" value="Female" id="female">
                        <label for="female">Female</label>

                    </div>
                    <div class="form-group">
                        <label for="year">Roll</label>
                        <input name="roll" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="year">Registration No</label>
                        <input name="reg" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input name="year" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Education</label>
                        <select class="form-control" name="education" id="">
                            <option value="">--select--</option>
                            <option value="HSC">HSC/Alim/Equivalent</option>
                            <option value="JSC">JSC/JDC</option>
                            <option value="SSC">SSC/Dakhil</option>
                            <option value="SSC-Voc">SSC(Vocational)</option>
                            <option value="HSC-Alim">HSC/Alim</option>
                            <option value="HSC-Voc">HSC(Vocational)</option>
                            <option value="HSC-BM">HSC(BM)</option>
                            <option value="HSC-DC">Diploma in Commerce</option>
                            <option value="HSC-DB">Diploma in Business Studies</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="board">Board</label>
                        <select class="form-control" name="board">
                            <option value="" selected>Select One</option>
                            <option value="barisal">Barisal</option>
                            <option value="chittagong">Chittagong</option>
                            <option value="comilla">Comilla</option>
                            <option value="dhaka">Dhaka</option>
                            <option value="dinajpur">Dinajpur</option>
                            <option value="jessore">Jessore</option>
                            <option value="rajshahi">Rajshahi</option>
                            <option value="sylhet">Sylhet</option>
                            <option value="madrasah">Madrasah</option>
                            <option value="tec">Technical</option>
                            <option value="dibs">DIBS(Dhaka)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Location</label>
                        <select class="form-control" name="location" id="">
                            <option value="">--select--</option>
                            <option value="Mirpur">Mirpur</option>
                            <option value="Uttara">Uttara</option>
                            <option value="Banani">Banani</option>
                            <option value="Badda">Badda</option>
                            <option value="Gulshan">Gulshan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Photo</label>
                        <hr>
                        <img id="preview" src="" alt="" style="max-width: 100%;">
                        <input name="photo" class="d-none" type="file" id="image_upload">
                        <label for="image_upload"> <img
                                style="width: 70px; height: 70px; cursor:pointer; display:block;"
                                src="https://www.manufacturersnigeria.org/img/icons/photoIcon.jpg" alt="" id="">
                        </label>
                    </div>
                    <div class="form-group">
                        <input name="student_add" class="btn btn-primary" type="submit" value="Add">
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