<?php
	$con=mysqli_connect('localhost','root','','projecttycomp')
		or die("connection failed".mysqli_connect_error());
	
	$request=$_REQUEST;
	$col =array(
		0   =>  'Firstname',
		1   =>  'Lastname',
		2   =>  'Address',
		3   =>  'DOB',
		4	=>  'Gender',
		5	=>  'Email',
		6	=>  'PhoneNo',
		7	=>  'Course',
		8	=>  'CourseID',
		9	=>  'Designation',
		10	=>  'Qualification',
		11	=>  'AadhaarNo',
		12	=>  'Caste'	
	);
	
	$sql ="SELECT * FROM faculty";
	$query=mysqli_query($con,$sql);
	$totalData=mysqli_num_rows($query);
	$totalFilter=$totalData;
	
	//Search
	$sql ="SELECT * FROM faculty WHERE 1=1";
	if(!empty($request['search']['value'])){
		$sql.=" AND (EnrollmentNo Like '".$request['search']['value']."%' ";
		$sql.=" OR Firstname Like '".$request['search']['value']."%' ";
		$sql.=" OR Lastname Like '".$request['search']['value']."%' ";
		$sql.=" OR Address Like '".$request['search']['value']."%' ";
		$sql.=" OR DOB Like '".$request['search']['value']."%' ";
		$sql.=" OR Gender Like '".$request['search']['value']."%' ";
		$sql.=" OR Email Like '".$request['search']['value']."%' ";
		$sql.=" OR PhoneNo Like '".$request['search']['value']."%' ";
		$sql.=" OR Course Like '".$request['search']['value']."%' ";
		$sql.=" OR CourseID Like '".$request['search']['value']."%' ";
		$sql.=" OR Designation Like '".$request['search']['value']."%' ";
		$sql.=" OR Qualification Like '".$request['search']['value']."%' ";
		$sql.=" OR AadhaarNo Like '".$request['search']['value']."%' ";
		$sql.=" OR Caste Like '".$request['search']['value']."%' ";
	}
	
	$query=mysqli_query($con,$sql);
	$totalData=mysqli_num_rows($query);
	
	//Order
	$sql.=" ORDER BY ".$col[$request['order'][0]['column']]." ".$request['order'][0]['dir']." LIMIT ".$request['start'].", ".$request['length']." ";
	
	$query=mysqli_query($con,$sql);
	$data=array();
	
	while($row=mysqli_fetch_array($query)){
		$subdata=array();
		$subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[2].'"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Edit</button>
					<a href="UpdateFaculty.php?delete='.$row[2].'" onclick="return confirm(\'Are You Sure ?\')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash">&nbsp;</i>Delete</a>';
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