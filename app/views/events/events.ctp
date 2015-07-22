<?php
$e = "";
$i = 0;

foreach ($events as $event){
	$e[$i] = $event['Event'];
	$e[$i]['url'] = $this->base . "/events/view/" . base64_encode(base64_encode($event['Event']['id']));
	$i++;
}

//debug($e);
echo json_encode($e);
?>