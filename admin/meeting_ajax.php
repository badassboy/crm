<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM meeting");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$trash = '<a href="delete-meeting.php?trash='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';
	$edit = '<a href="edit-latest.php?edit='.$id.'">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			  </a>';



	

	$title = $result['title'];
	$meetingDate = $result['meeting_date'];
	$start = $result['meeting_start'];
	$end = $result['meeting_end'];
	$related = $result['related'];
	

	$json[] = array(
		
		"title" => $title,
		"meeting_date" => $meetingDate,
		"start" => $start,
		"end" => $end,
		"related" => $related,
		"edit" => $edit,
		"delete" => $trash
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







