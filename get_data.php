<?php

include 'Config.php'; 

$course_id = $_POST['course_data'];

$sem_query = "SELECT * FROM semester WHERE CourseID = $course_id";
$sem_result = mysqli_query($connect, $sem_query);

$output = '<option value="">Select Semester</option>';

while($sem_row = mysqli_fetch_assoc($sem_result)){
    $output .= '<option value="'.$sem_row['SemID'].'">'.$sem_row['SemName'].'</option>';
}
echo $output;

?>