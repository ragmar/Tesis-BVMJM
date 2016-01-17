<?php
function marc21_decode($camp = null) {
	if (!empty($camp)) {
		$c = explode('^', $camp);
		$indicators = $c[0];
		unset($c[0]);

		$i = 0;
		foreach ($c as $v){
			$c[substr($v, 0, 1)] = substr($v, 1, strlen($v)-1);
			$i++;
			unset($c[$i]);
		}
		$c['indicators'] = $indicators;
		return $c;
	} else {
		return false;
	}
}
?>



<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '2'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li><a href="<?php echo $this->base; ?>/iconographies">Iconografía Musical Venezolana</a></li>
  <li>
  <a href="<?php echo $this->base; ?>/iconographies/view/<?php echo $item['Item']['id']; ?>">
  	<?php
		if (!empty($item['Item']['245'])) {
			$title = marc21_decode($item['Item']['245']);
			if ($title) {
				echo $title['a'];
				if (isset($title['b'])) {echo ' ' . $title['b'];}
				if (isset($title['c'])) {echo ' ' . $title['c'];}
				if (isset($title['h'])) {echo ' ' . $title['h'];}
			}
		}
	?>
	</a>
	</li>
  	<li>Formato MARC21</li>
</ul>
<?php } else if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '1'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li><a href="<?php echo $this->base; ?>/iconographies">Iconografía Musical Venezolana</a></li>
  <li>
  <a href="<?php echo $this->base; ?>/iconographies/view/<?php echo $item['Item']['id']; ?>">
  	<?php
		if (!empty($item['Item']['245'])) {
			$title = marc21_decode($item['Item']['245']);
			if ($title) {
				echo $title['a'];
				if (isset($title['b'])) {echo ' ' . $title['b'];}
				if (isset($title['c'])) {echo ' ' . $title['c'];}
				if (isset($title['h'])) {echo ' ' . $title['h'];}
			}
		}
	?>
	</a>
	</li>
  	<li>Formato MARC21</li>
</ul>
<?php } else { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/pages">Inicio</a></li>
<li><a href="<?php echo $this->base; ?>/iconographies">Iconografía Musical Venezolana</a></li>
  <li>
  <a href="<?php echo $this->base; ?>/iconographies/view/<?php echo $item['Item']['id']; ?>">
  	<?php
		if (!empty($item['Item']['245'])) {
			$title = marc21_decode($item['Item']['245']);
			if ($title) {
				echo $title['a'];
				if (isset($title['b'])) {echo ' ' . $title['b'];}
				if (isset($title['c'])) {echo ' ' . $title['c'];}
				if (isset($title['h'])) {echo ' ' . $title['h'];}
			}
		}
	?>
	</a>
	</li>
  	<li>Formato MARC21</li>
</ul>
<?php } ?>


<h2>Formato MARC21</h2>

<br />

<div style="margin-left: 20px;">
<?php
	//debug($item);
	
	//unset($item['User']);
	//unset($item['ItemsPicture']);
	//unset($item['UserItems']);
	unset($item['Item']['id']);
	unset($item['Item']['type']);
	unset($item['Item']['user_id']);
	unset($item['Item']['item_file_path']);
	unset($item['Item']['item_file_name']);
	unset($item['Item']['item_file_size']);
	unset($item['Item']['item_content_type']);
	unset($item['Item']['cover_name']);
	unset($item['Item']['cover_path']);
	unset($item['Item']['cover_type']);
	unset($item['Item']['cover_size']);
	unset($item['Item']['published']);
	unset($item['Item']['created']);
	unset($item['Item']['modified']);
    unset($item['Item']['converted']);
    unset($item['Item']['found_pdf']);
	//debug($item['Item']);
	foreach ($item['Item'] as $i => $j):
	//debug($i . " - " . $j);
		if ($j != "") {
			echo '=' . $i . '&nbsp;&nbsp;' . str_replace('^', '$', $j) . '<br>';
		}
	endforeach;
?>
</div>