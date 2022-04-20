<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM task");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$trash = '<a href="delete-task.php?trash='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';
	$edit = '<a href="edit-latest.php?edit='.$id.'">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			  </a>';



	

	$subject = $result['subject'];
	$task_date = $result['dueDate'];
	$status = $result['status'];
	$priority = $result['priority'];
	

	$json[] = array(
		
		"subject" => $subject,
		"task_date" => $task_date,
		"status" => $status,
		"priority" => $priority,
		"edit" => $edit,
		"delete" => $trash
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







