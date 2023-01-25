<?php 
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['designation'])) {
    echo "You are logged out";
    header('location:Index.php');
}
?>

<?php
    $connect = mysqli_connect("localhost", "root", "", "projecttycomp");
    $query = "SELECT * FROM subject ORDER BY ID ASC";
    $result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>College Management System</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>		
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/AttendanceStyle.css">

    <!-- Datatables -->
	<script type="text/javascript" charset="utf-8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

    <style>
		.form-rounded {
			border-radius: 4rem;
		}
	</style>

    <script>
        jQuery(function($) {
            $(".sidebar-dropdown > a").click(function() {
                $(".sidebar-submenu").slideUp(200);
                if (
                    $(this)
                    .parent()
                    .hasClass("active")
                ) {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                        .parent()
                        .removeClass("active");
                } else {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                        .next(".sidebar-submenu")
                        .slideDown(200);
                    $(this)
                        .parent()
                        .addClass("active");
                }
            });

            $("#close-sidebar").click(function() {
                $(".page-wrapper").removeClass("toggled");
            });
            $("#show-sidebar").click(function() {
                $(".page-wrapper").addClass("toggled");
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#subject_data').DataTable({
                dom: 'lBfrtip',
                buttons: [
					'excel', 'pdf', 'print'
                ],
                "lengthMenu": [
                    [10, 25, 50, -1], [10, 25, 50, "All"]
                ]
            });
        });
    </script>

    <script>
        var close = document.getElementsByClassName("closebtn");
        var i;

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function() {
                    div.style.display = "none";
                }, 600);
            }
        }
    </script>
</head>

<body>
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="Dashboard.php"><h3 style="font-family:Lucida Handwriting;">College Management System</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item">
                        <a class="nav-link" href="Logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars" style="font-size:24px"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#"></a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-info">
                        <h5><span class="user-name"><strong><?php echo $_SESSION['username'];?></strong></span></h5>
                        <span class="user-role"><?php echo $_SESSION['designation'];?></span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div class="input-group">
                        <input type="text" class="form-control form-rounded search-menu" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar">
                            <a href="Dashboard.php">
                                <i class="fas fa-university"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-code-branch"></i>
                                <span>Course</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="AddCourse.php">Add Course</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-tasks"></i>
                                <span>Semester</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="AddSemester.php">Add Semester</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-sitemap"></i>
                                <span>Subject</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="AddSubject.php">Add Subjects</a>
                                    </li>
                                    <li>
                                        <a href="ViewSubject.php">View Subjects</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-user-graduate"></i>
                                <span>Student</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="AddStudent.php">Add Student</a>
                                    </li>
                                    <li>
                                        <a href="UpdateStudent.php">Update Student</a>
                                    </li>
                                    <li>
                                        <a href="ViewStudent.php">View Student</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span>Faculty</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="AddFaculty.php">Add Faculty</a>
                                    </li>
                                    <li>
                                        <a href="UpdateFaculty.php">Update Faculty</a>
                                    </li>
                                    <li>
                                        <a href="ViewFaculty.php">View Faculty</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-file-alt"></i>
                                <span>Marksheet</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="Marksheet.php">Marksheet</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>
                                <span>Attendance</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="AddAttendance.php">Add Attendance</a>
                                    </li>
                                    <li>
                                        <a href="ViewAttendance.php">View Attendance</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
        </nav>

        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <div class="table-responsive">
                    
                    <form action="#" method="post">
                        <div class="container box">

                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label>Semester: </label>
                            <select class="select" name="s" placeholder="select">
                                <option value="">Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>

                            &nbsp&nbsp&nbsp&nbsp <label>Department: </label>
                            <select class="select" name="c" placeholder="select">
                                <option value="">Select</option>
                                <option value="13">Computer</option>
                                <option value="3">Mechanical</option>
								<option value="20">Electrical & Electronics</option>
                            </select>

                            &nbsp&nbsp&nbsp&nbsp <label>Theory/Practical: </label>
                            <select class="select" name="t" placeholder="select">
                                <option value="">Select</option>
                                <option value="Theory">Theory</option>
                                <option value="Practical">Practical</option>
                            </select>

                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" name="submit" id="search" value="Search" class="btn btn-info" />
                        </div><br>
                    </form>

                    <?php

                    if (isset($_POST['submit'])) 
                    {
                        $s =  $_POST['s'];
                        $c =  $_POST['c'];
                        $t =  $_POST['t'];

                        if ($t != "" && $s != "" && $c != "") 
                        {
                            include "Config.php";

                            $sql = ("SELECT * FROM subject WHERE CourseID='" . $c . "' AND SemID='" . $s . "'")
                                or die(mysqli_connect_error());

                            $data = mysqli_query($connect, $sql);
                            $total = mysqli_num_rows($data);

                            if ($total != 0) 
                            {
                                $sql2 = ("SELECT * FROM course where CourseID='" . $c . "'")
                                    or die(mysqli_connect_error());

                                $data2 = mysqli_query($connect, $sql2);

                                echo "<form action='#' method='post'>";
                                echo "<table class='a' style='width:100%' >
                                        <tr>
                                            <th>SUBJECTID</th>
                                            <th>SUBJECT</th>
                                            <th>COURSE</th>
                                            <th>SEMESTER</th>
                                            <th>Theory/Practical</th>
                                            <th>SELECT</th>
                                        </tr>";

                                while ($result2 = mysqli_fetch_array($data2)) 
                                {
                                    while ($result = mysqli_fetch_array($data)) 
                                    {
                                        echo "<tr><td>" . $result['SubjectID'] . "</td>
                                                <td>" . $result['SubjectName'] . "</td>
                                                <td>" . $result2['CourseName'] . "</td>
                                                <td>" . $result['SemID'] . "</td>
                                                <td>" . $t . "</td>
                                                <td><input type='radio' name='sub' value=" . $result['SubjectID'] . "></td>"
                                            ."</tr>";
                                    }
                                }

                                echo "</table><br>";
                                echo "<div class='container'>";
                                echo "<input type='hidden' name='s' VALUE=" . $_POST['s'] . ">";
                                echo "<input type='hidden' name='c' VALUE=" . $_POST['c'] . ">";
                                echo "<input type='hidden' name='t' VALUE=" . $_POST['t'] . ">";
                                echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='submit' name='next' id='search' value='Search' class='btn btn-info' />";
                                echo "</div> ";
                                echo "</form>";
                            } 
                            else 
                            {
                                echo "Error: " . $sql . "<br>" . $connect->error;
                            }
                        } 
                        else 
                        {
                            echo "<div class='alert'>
                                    <span class='closebtn'>&times;</span>  
                                    <strong>!</strong> Not selected all fields 
                                </div>";
                        }
                    }
                    
                    ?>

                    <?php

                    if (isset($_POST['next'])) 
                    {
                        include "Config.php";

                        $s =  $_POST['s'];
                        $c =  $_POST['c'];
                        $sub =  $_POST['sub'];
                        $t =  $_POST['t'];

                        if ($sub != "") 
                        {
                            echo "<form action='#' method='post'>";

                            $query1 = ("SELECT * FROM subject WHERE CourseID='" . $c . "' AND SemID='" . $s . "' AND SubjectID='" . $sub . "'")
                                or die(mysqli_connect_error());

                            $row1 = mysqli_query($connect, $query1);

                            while ($fetch1 = mysqli_fetch_array($row1)) 
                            {
                                $sql2 = ("SELECT  * FROM course where CourseID='" . $c . "'")
                                    or die(mysqli_connect_error());

                                $data2 = mysqli_query($connect, $sql2);

                                echo "<div class='container box'>";
                                echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label class='thicker'>Subject: " . $fetch1['SubjectName'] . "&nbsp&nbsp&nbsp&nbsp&nbsp";
                                echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTheory/Practical: " . $t . "&nbsp&nbsp";
                                echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDepartment: ";

                                while ($result2 = mysqli_fetch_array($data2)) 
                                {
                                    echo $result2['CourseName'] . "&nbsp&nbsp&nbsp&nbsp&nbsp";
                                }
                                echo "&nbsp&nbsp&nbsp&nbspSemester: " . $s . "</label><br><hr>";
                                echo "&nbsp&nbsp&nbsp&nbsp&nbsp<label class='thicker'>  Date: &nbsp </label><input type='date' name='txtstartdate'  >
                                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label>TO</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                        <label class='thicker'>Date: &nbsp</label><input type='date' name='txtenddate'  >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                                echo "<label class='thicker'>All:&nbsp&nbsp <input type='checkbox' name='total' value='total'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                                echo "<input type='hidden' name='s' VALUE=" . $_POST['s'] . ">";
                                echo "<input type='hidden' name='c' VALUE=" . $_POST['c'] . ">";
                                echo "<input type='hidden' name='t' VALUE=" . $_POST['t'] . ">";
                                echo "<input type='hidden' name='t' VALUE=" . $_POST['t'] . ">";
                                echo "<input type='hidden' name='sub' VALUE=" . $_POST['sub'] . ">";
                                echo "<input type='submit' name='last'  value='Search' class='btn btn-info' ><br>";
                                echo "</div> ";
                            }
                            echo "</div> ";
                            echo "</form>";
                        } 
                        else 
                        {
                            include "Config.php";

                            $sql = ("SELECT * FROM subject where CourseID='" . $c . "' AND SemID='" . $s . "'")
                                or die(mysqli_connect_error());

                            $data = mysqli_query($connect, $sql);
                            $total = mysqli_num_rows($data);

                            if ($total != 0) 
                            {
                                $sql2 = ("SELECT * FROM course where CourseID='" . $c . "'")
                                    or die(mysqli_connect_error());

                                $data2 = mysqli_query($connect, $sql2);
                                
                                echo "<form action='#' method='post'>";
                                echo "<br><table class='a' style='width:60%' >
                                    <tr>
                                    <th>SUBJECTID</th>
                                    <th>SUBJECT</th>
                                    <th>COURSE</th>
                                    <th>SEMESTER</th>
                                    <th>TYPE</th>
                                    <th>SELECT</th>
                                    </tr>";

                                while ($result2 = mysqli_fetch_array($data2)) 
                                {
                                    while ($result = mysqli_fetch_array($data)) 
                                    {
                                        echo "<tr><td>" . $result['SubjectID'] . "</td>
                                            <td>" . $result['SubjectName'] . "</td>
                                            <td>" . $result2['CourseName'] . "</td>
                                            <td>" . $result['SemID'] . "</td>
                                            <td>" . $t . "</td>
                                            <td><input type='radio' name='sub' value=" . $result['SubjectID'] . "></td>"
                                            . "</tr>";
                                    }
                                }

                                echo "</table><br>";
                                echo "<div class='container'>";
                                echo "<input type='hidden' name='s' VALUE=" . $_POST['s'] . ">";
                                echo "<input type='hidden' name='c' VALUE=" . $_POST['c'] . ">";
                                echo "<input type='hidden' name='t' VALUE=" . $_POST['t'] . ">";
                                echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='submit' name='next' id='search' value='Search' class='btn btn-info' />";
                                echo "</div> ";
                                echo "</form>";
                                echo "<div class='alert'>
                                <span class='closebtn'>&times;</span>  
                                <strong>!</strong> No subject is selected 
                                </div>";
                            } 
                            else 
                            {
                                echo "Error: " . $sql . "<br>" . $connect->error;
                            }
                        }
                    }

                    ?>

                    <?php

                    if (isset($_POST['last'])) 
                    {
                        $txtstartdate = $_POST['txtstartdate'];
                        $txtenddate = $_POST['txtenddate'];
                        $s =  $_POST['s'];
                        $c =  $_POST['c'];
                        $sub =  $_POST['sub'];
                        $t =  $_POST['t'];
                        @$to = $_POST['total'];

                        if ($txtstartdate != "" && $txtenddate != "") 
                        {
                            if ($txtstartdate != "" && $txtenddate != "" && $to != "") 
                            {
                                $query = ("SELECT * FROM student where SemName='" . $s . "' and CourseID='" . $c . "'")
                                    or die(mysqli_connect_error());

                                $row = mysqli_query($connect, $query);
                                $to = mysqli_num_rows($row);

                                if ($to != 0) 
                                {
                                    echo "<div class='container-box'>";
                                    echo "<table  class='a' style='width:50%; float:left' >
                                            <tr>
                                                <th>EnrollmentNo</th>
                                                <th>Name</th>
                                            </tr>";

                                    while ($fetch = mysqli_fetch_array($row)) 
                                    {
                                        echo '<tr><td>' . $fetch['EnrollmentNo'] . '</td><td>' . $fetch['Firstname'] . ' '. $fetch['Lastname'] . '</td></tr>';
                                    }

                                    echo '</table>';
                                }
                                echo "<table  class='b' style='width:50%; float:right'>";

                                $sql2 = ("SELECT * FROM attendance WHERE SubjectID='" . $sub . "' AND CourseID='" . $c . "' AND SemName='" . $s . "' AND Type='" . $t . "'  AND Date between '" . $txtstartdate . "' and '" . $txtenddate . "' order by Date ")
                                    or die(mysqli_connect_error());

                                $data = mysqli_query($connect, $sql2);
                                $row2 = mysqli_num_rows($data);

                                $sql = ("SELECT * FROM attendance WHERE SubjectID='" . $sub . "' AND CourseID='" . $c . "' AND SemName='" . $s . "' AND Type='" . $t . "'  AND Date between '" . $txtstartdate . "' and '" . $txtenddate . "'  group by Date")
                                    or die(mysqli_connect_error());

                                $row3 = mysqli_query($connect, $sql);
                                $total = mysqli_num_rows($row3);

                                echo "<br><tr>
                                            <th>Present</th>
                                            <th>Absent</th>
                                            <th>Total </th>
                                            <th>Percentage%</th>
                                        </tr>";

                                if ($row2 > 0) 
                                {
                                    $cols = $total;
                                    $col = 1;
                                    $r = $to;
                                    $counter = 1;

                                    while ($row2 = mysqli_fetch_array($data)) 
                                    {
                                        $sql3 = ("Select count(*) as total1 FROM attendance where SubjectID='" . $sub . "' AND CourseID='" . $c . "' AND SemName='" . $s . "' AND Type='" . $t . "'  AND Date between '" . $txtstartdate . "' and '" . $txtenddate . "' and Attendance = 'P' group by EnrollmentNo")
                                            or die(mysqli_connect_error());

                                        $row4 = mysqli_query($connect, $sql3);

                                        while ($fetch2 = mysqli_fetch_array($row4)) 
                                        {
                                            $P = floor($fetch2['total1'] * 100 / $total);
                                            $A = $total - $fetch2['total1'];

                                            if (($counter % $col) == 1) 
                                            {
                                                echo '<tr>';
                                            }
                                            if ($counter <= $r) 
                                            {
                                                echo  '<td>' . $fetch2['total1'] . '</td>';
                                                echo  '<td>' . $A . '</td>';
                                                echo  '<td>' . $total . '</td>';
                                                echo  '<td>' . $P . '%</td>';
                                            }
                                            if (($counter % $col) == 0) 
                                            {
                                                echo '</tr>';
                                            }
                                            $counter++;
                                        }
                                    }
                                    echo '</table>';
                                    echo "</div>";
                                }
                            } 
                            else 
                            {
                                $query = ("SELECT * FROM student WHERE SemName='" . $s . "' AND CourseID='" . $c . "'")
                                    or die(mysqli_connect_error());

                                $row = mysqli_query($connect, $query);
                                $to = mysqli_num_rows($row);

                                if ($to != 0) 
                                {
                                    echo "<br><div class='container-box'>";
                                    echo "<table id='tblTwo' class='a' style='width:40%; float:left' >
                                            <tr>
                                                <th>EnrollmentNo</th>
                                                <th>Name</th>															
                                            </tr>";

                                    while ($fetch = mysqli_fetch_array($row)) 
                                    {
                                        echo '<tr><td>' . $fetch['EnrollmentNo'] . '</td><td>' . $fetch['Firstname'] . ' '. $fetch['Lastname'] .'</td></tr>';
                                    }

                                    echo '</table>';
                                    echo "<br><table  class='b'  >";

                                    $sql2 = ("SELECT EnrollmentNo,Attendance FROM attendance where SubjectID='" . $sub . "' AND CourseID='" . $c . "' AND SemName='" . $s . "' AND Type='" . $t . "'  AND Date between '" . $txtstartdate . "' and '" . $txtenddate . "'")
                                        or die(mysqli_connect_error());

                                    $data = mysqli_query($connect, $sql2);
                                    $rows = mysqli_num_rows($data);

                                    $sql = ("Select  Count(*) FROM attendance where SubjectID='" . $sub . "' AND CourseID='" . $c . "' AND SemName='" . $s . "' AND Type='" . $t . "'  AND Date between '" . $txtstartdate . "' and '" . $txtenddate . "' group by Date")
                                        or die(mysqli_connect_error());

                                    $row3 = mysqli_query($connect, $sql);
                                    $total = mysqli_num_rows($row3);

                                    $sql4 = ("SELECT distinct DAY(Date) FROM attendance where Date between '" . $txtstartdate . "' and ' " . $txtenddate . "' group by Date")
                                        or die(mysqli_connect_error());

                                    $data4 = mysqli_query($connect, $sql4);
                                    $rows2 = mysqli_num_rows($data4);

                                    while ($row5 = mysqli_fetch_array($data4)) 
                                    {
                                        $cols = $total;
                                        $r = $rows2;
                                        $counter = 0;
                                        $D = $row5['DAY(Date)'];

                                        if (($counter % $cols) == 1) {
                                            echo '<tr>';
                                        }

                                        if ($counter <= $r) {
                                            echo  '<th>' . $D . '</th>';
                                        }

                                        if ($cols == 1) {
                                            if (($counter % $cols) == 0) {
                                                echo '</tr>';
                                            }
                                        } 
                                        else {
                                            if (($counter % $cols) == 1) {
                                                echo '</tr>';
                                            }
                                        }
                                    }

                                    if ($rows > 0) 
                                    {
                                        $cols = $total;
                                        $r = $rows;
                                        $counter = 1;

                                        while ($row2 = mysqli_fetch_array($data)) 
                                        {
                                            $sql3 = ("SELECT * FROM attendance where EnrollmentNo='" . $row2['EnrollmentNo'] . "' and SUBJECTID='" . $sub . "' AND Date between '" . $txtstartdate . "' and '" . $txtenddate . "' order by Date")
                                                or die(mysqli_connect_error());

                                            $data2 = mysqli_query($connect, $sql3);

                                            while ($row4 = mysqli_fetch_array($data2)) 
                                            {
                                                if (($counter % $cols) == 1) {
                                                    echo '<tr>';
                                                }
                                                if ($counter <= $r) {
                                                    echo  '<td>' . $row4['Attendance'] . '</td>';
                                                }
                                                if (($counter % $cols) == 0) {
                                                    echo '</tr>';
                                                }
                                                $counter++;
                                            }
                                        }
                                        echo '</table>';
                                        echo '</div>';
                                    }
                                }
                            }
                        } 
                        else 
                        {
                            echo "<div class='alert'>
                                    <span class='closebtn'>&times;</span>  
                                    <strong>!</strong> date field is empty
                                </div>";
                        }
                    }

                    ?>

                </div>
            </div>
        </main>
        <!-- page-content" -->
    </div>
</body>

</html>