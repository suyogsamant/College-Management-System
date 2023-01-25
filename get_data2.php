<?php 

include "Config.php"; 

$course_id = $_POST['course_data'];
$semester_id = $_POST['semester_data'];

$subject_query = "SELECT * FROM subject WHERE CourseID = $course_id AND SemID = $semester_id";
$subject_result = mysqli_query($connect, $subject_query);

$output = '<option value="">Select Subject</option>';

while($subject_row = mysqli_fetch_assoc($subject_result)){
    $output .= '<option value="'.$subject_row['SubjectID'].'">'.$subject_row['SubjectName'].'</option>';
}
echo $output;

?>