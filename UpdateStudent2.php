<?php
	$con=mysqli_connect('localhost','root','','projecttycomp')
		or die("connection failed".mysqli_connect_error());
	
	$request=$_REQUEST;
	$col =array(
		0	=>  'EnrollmentNo',
		1   =>  'Firstname',
		2	=>  'Middlename',
		3   =>  'Lastname',
		4   =>  'Address',
		5	=>  'DOB',
		6	=>  'Gender',
		7	=>  'Email',
		8	=>  'PhoneNo',
		9   =>  'PCNo',
		10	=>  'Course',
		11	=>  'CourseID',
		12	=>  'SemName',
		13	=>  'AadhaarNo',
		14	=>  'Caste',
		15	=>  'LastQualification',
		16	=>  'Status'	
	);
	
	$sql ="SELECT * FROM student";
	$query=mysqli_query($con,$sql);
	$totalData=mysqli_num_rows($query);
	$totalFilter=$totalData;
	
	//Search
	$sql ="SELECT * FROM student WHERE 1=1";
	if(!empty($request['search']['value'])){
		$sql.=" AND (EnrollmentNo Like '".$request['search']['value']."%' ";
		$sql.=" OR Firstname Like '".$request['search']['value']."%' ";
		$sql.=" OR Middlename Like '".$request['search']['value']."%' ";
		$sql.=" OR Lastname Like '".$request['search']['value']."%' ";
		$sql.=" OR Address Like '".$request['search']['value']."%' ";
		$sql.=" OR DOB Like '".$request['search']['value']."%' ";
		$sql.=" OR Gender Like '".$request['search']['value']."%' ";
		$sql.=" OR Email Like '".$request['search']['value']."%' ";
		$sql.=" OR PhoneNo Like '".$request['search']['value']."%' ";
		$sql.=" OR PCNo Like '".$request['search']['value']."%' ";
		$sql.=" OR Course Like '".$request['search']['value']."%' ";
		$sql.=" OR CourseID Like '".$request['search']['value']."%' ";
		$sql.=" OR SemName Like '".$request['search']['value']."%' ";
		$sql.=" OR AadhaarNo Like '".$request['search']['value']."%' ";
		$sql.=" OR Caste Like '".$request['search']['value']."%' ";
		$sql.=" OR LastQualification Like '".$request['search']['value']."%' ";
		$sql.=" OR Status Like '".$request['search']['value']."%' )";
	}
	
	$query=mysqli_query($con,$sql);
	$totalData=mysqli_num_rows($query);
	
	//Order
	$sql.=" ORDER BY ".$col[$request['order'][0]['column']]." ".$request['order'][0]['dir']." LIMIT ".$request['start'].", ".$request['length']." ";
	
	$query=mysqli_query($con,$sql);
	$data=array();
	
	while($row=mysqli_fetch_array($query)){
		$subdata=array();
		$subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Edit</button>
					<a href="UpdateStudent.php?delete='.$row[0].'" onclick="return confirm(\'Are You Sure ?\')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash">&nbsp;</i>Delete</a>';
		$subdata[]=$row[0];
		$subdata[]=$row[1];
		$subdata[]=$row[2];
		$subdata[]=$row[3]; 
		$subdata[]=$row[4]; 
		$subdata[]=$row[5];
		$subdata[]=$row[6];
		$subdata[]=$row[7];
		$subdata[]=$row[8];
		$subdata[]=$row[9];
		$subdata[]=$row[10];
		$subdata[]=$row[11];
		$subdata[]=$row[12];
		$subdata[]=$row[13];
		$subdata[]=$row[14]; 
		$subdata[]=$row[15];
		$subdata[]=$row[16];
		$data[]=$subdata;
	}
	$json_data=array(
		"draw"              =>  intval($request['draw']),
		"recordsTotal"      =>  intval($totalData),
		"recordsFiltered"   =>  intval($totalFilter),
		"data"              =>  $data
	);
	echo json_encode($json_data);
?>