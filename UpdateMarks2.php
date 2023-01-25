<?php

include_once("Config.php");

$input = filter_input_array(INPUT_POST);

if ($input['action'] == 'edit') {
    $update_field = '';
    if (isset($input['PA1'])) {
        $update_field .= "PA1='" . $input['PA1'] . "'";
    } else if (isset($input['PA2'])) {
        $update_field .= "PA2='" . $input['PA2'] . "'";
    }else if (isset($input['Average'])) {
        $update_field .= "Average='" . $input['Average'] . "'";
    } else if (isset($input['Theory'])) {
        $update_field .= "Theory='" . $input['Theory'] . "'";
    } else if (isset($input['Practical'])) {
        $update_field .= "Practical='" . $input['Practical'] . "'";
    } else if (isset($input['Termwork'])) {
        $update_field .= "Termwork='" . $input['Termwork'] . "'";
    }
    if ($update_field && $input['EnrollmentNo']) {
        $sql_query = "UPDATE marksheet2 SET $update_field WHERE EnrollmentNo='" . $input['EnrollmentNo'] . "'";
        mysqli_query($connect, $sql_query) or die("database error:" . mysqli_error($connect));
    }
}

?>