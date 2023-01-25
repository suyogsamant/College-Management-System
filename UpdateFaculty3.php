<?php

$con=mysqli_connect('localhost','root','','projecttycomp');

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    
    $sql="SELECT * FROM faculty WHERE Firstname='$id'";
    $run_sql=mysqli_query($con,$sql);
    
    while($row=mysqli_fetch_array($run_sql)){
        $per_Firstname=$row[2];
        $per_Lastname=$row[3];
        $per_Address=$row[4];
        $per_DOB=$row[5];
		$per_Gender=$row[6];
		$per_Email=$row[7];
		$per_PhoneNo=$row[8];
		$per_Course=$row[9];
		$per_CourseID=$row[10];
		$per_Designation=$row[11];
		$per_Qualification=$row[12];
		$per_AadhaarNo=$row[13];
		$per_Caste=$row[14];
    }
    
?>
<form class="form-horizontal" method="post">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Information</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
                <div class="box-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">First Name:</label>
                            <input type="text" class="form-control form-rounded" name="firstname" id="firstname" value="<?php echo $per_Firstname;?>" placeholder="First Name" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Last Name:</label>
                            <input type="text" class="form-control form-rounded" name="lastname" id="lastname" value="<?php echo $per_Lastname;?>" placeholder="Last Name" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control form-rounded" name="address" id="address" value="<?php echo $per_Address;?>" placeholder="Address" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="dob">DOB:</label>
                            <input type="date" class="form-control form-rounded" name="dob"  id="dob" value="<?php echo $per_DOB;?>" placeholder="DOB" />
                        </div>                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="gender">Gender:</label>
                            <input type="text" class="form-control form-rounded" name="gender" id="gender" value="<?php echo $per_Gender;?>" placeholder="Gender" />
                        </div>
                        <div class="form-group col-md-5">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control form-rounded" name="email" id="email" value="<?php echo $per_Email;?>" placeholder="Email" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phoneno">Phone Number:</label>
                            <input type="number" class="form-control form-rounded" name="phoneno" id="phoneno" value="<?php echo $per_PhoneNo;?>" placeholder="Phone Number" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="course">Course:</label>
                            <input type="text" class="form-control form-rounded" name="course" id="course" value="<?php echo $per_Course;?>" placeholder="Course"/>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="courseid">CourseID:</label>
                            <input type="text" class="form-control form-rounded" name="courseid" id="courseid" value="<?php echo $per_CourseID;?>" placeholder="CourseID"/>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="desig">Designation:</label>
                            <input type="text" class="form-control form-rounded" name="desig" id="desig" value="<?php echo $per_Designation;?>" placeholder="Designation">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="qualify">Qualification</label>
                            <input type="text" class="form-control form-rounded" name="qualify" id="qualify" value="<?php echo $per_Qualification;?>" placeholder="Qualification"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="aadhaar">Aadhaar_No:</label>
                            <input type="number" class="form-control form-rounded" name="aadhaar" id="aadhaar" value="<?php echo $per_AadhaarNo;?>" placeholder="Aadhaar_No" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="caste">Caste:</label>
                            <input type="text" class="form-control form-rounded" name="caste" id="caste" value="<?php echo $per_Caste;?>" placeholder="Caste" />
                        </div>
                    </div>                    
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <a href="EditFaculty.php"><button type="button" class="btn btn-danger">Cancel</button> </a>
            <button type="submit" class="btn btn-primary" name="btnEdit">Save</button>
        </div>
    </div>
</form>

<?php
}//end if
?>