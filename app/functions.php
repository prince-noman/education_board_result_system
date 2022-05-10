<?php

// Form Validate msg

function validate( $msg, $type = 'danger' ) {
    return "<p class= \"alert alert-$type\"> $msg <button class =\"close\" data-dismiss=\"alert\">&times;</button> </p>";
}

/**
 * Grade Calculation Function
 */

function grade( $marks ) {

    $grade = '';

    if ( $marks >= 0 && $marks < 33 ) {
        $grade = 'F';
    } else

    if ( $marks >= 33 && $marks < 40 ) {
        $grade = 'D';
    } else

    if ( $marks >= 40 && $marks < 50 ) {
        $grade = 'C';
    } else

    if ( $marks >= 50 && $marks < 60 ) {
        $grade = 'B';
    } else

    if ( $marks >= 60 && $marks < 70 ) {
        $grade = 'A-';
    } else

    if ( $marks >= 70 && $marks < 80 ) {
        $grade = 'A';
    } else

    if ( $marks >= 80 && $marks < 100 ) {
        $grade = 'A+';
    } else {
        $grade = 'Invalid GPA';
    }

    return $grade;

}

/**
 *GPA calculation
 */

function gpa( $marks ) {
    $gpa = '';

    if ( $marks >= 0 && $marks < 33 ) {
        $gpa = 0;
    } else

    if ( $marks >= 33 && $marks < 40 ) {
        $gpa = 1;
    } else

    if ( $marks >= 40 && $marks < 50 ) {
        $gpa = 2;
    } else

    if ( $marks >= 50 && $marks < 60 ) {
        $gpa = 3;
    } else

    if ( $marks >= 60 && $marks < 70 ) {
        $gpa = 3.5;
    } else

    if ( $marks >= 70 && $marks < 80 ) {
        $gpa = 4;
    } else

    if ( $marks >= 80 && $marks < 100 ) {
        $gpa = 5;
    } else {
        $gpa = 'Invalid GPA';
    }

    return $gpa;
}

/**
 * CGPA calculation
 */

function cgpa( $bn, $en, $math, $sc, $ssc, $reli ) {

    if ( $bn < 33 || $en < 33 || $math < 33 || $sc < 33 || $ssc < 33 || $reli < 33 ) {
        echo "Failed";
    } else {
        $total = gpa( $bn ) + gpa( $en ) + gpa( $math ) + gpa( $sc ) + gpa( $ssc ) + gpa( $reli );
        return round( $total / 6, 2 );
    }

}

/**
 * Final Result
 */

function result( $bn, $en, $math, $sc, $ssc, $reli ) {

    if ( $bn < 33 || $en < 33 || $math < 33 || $sc < 33 || $ssc < 33 || $reli < 33 ) {
        echo "<span style=\"color:red;font-weight:bold;\">Failed<span></span></span>";
    } else {
        echo "<span style=\"color:green;font-weight:bold;\">Passed<span></span></span>";
    }

}