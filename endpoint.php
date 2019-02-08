<?php
$status='Error';
$result=0;

if ($json = json_decode(file_get_contents("php://input"))){
	$operation = $json->operation;
	$values = $json->values;
	$status='OK';
	switch ($operation) {
		case 'sum':
			$result = $values[0]+$values[1];
		break;
		case 'subtraction':
			$result = $values[0]-$values[1];
		break;
		case 'division':
			if ($values[1]!=0) {
				$result = $values[0]/$values[1];
			} else {
				$status='Error';
			}
		break;
		case 'multiplication':
			$result = $values[0]*$values[1];
		break;
	}
} 

echo json_encode([
	'Result'=>$result,
	'Status'=>$status
]);

?>
