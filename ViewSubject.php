<?php 
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['designation'])) {
    echo "You are logged out";
    header('location:Index.php');
}
?>

<?php  
	$connect = mysqli_connect("localhost", "root", "", "projecttycomp");  
	$query ="SELECT * FROM subject ORDER BY ID ASC";  
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
		jQuery(function ($) {
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
		});
	</script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$('#subject_data').DataTable({
				dom: 'lBfrtip',
				buttons: [
					'excel', 'pdf', 'print'
				],
				"lengthMenu": [[10, 25, 50, -1],[10, 25, 50, "All"]]
			});
		});
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
				<h2>List of Subjects</h2>
				<hr>
				<div class="table-responsive">
					<table id="subject_data" class="table table-bordered table-striped ">
						<thead>
							<tr>
								<th>Course ID</th>
								<th>Semester ID</th>
								<th>Subject ID</th>
								<th>Subject Name</th>
								<th>Type</th>
							</tr>
						</thead>
						<tbody>
							<?php  
								while($row = mysqli_fetch_array($result))  
								{  
									echo '  
									<tr>  
										<td>'.$row["CourseID"].'</td>  
										<td>'.$row["SemID"].'</td>  
										<td>'.$row["SubjectID"].'</td>  
										<td>'.$row["SubjectName"].'</td>  
										<td>'.$row["Type"].'</td>  
									</tr>  
									';  
								}  
							?> 
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- page-content" -->
	</div>
</body>

</html>