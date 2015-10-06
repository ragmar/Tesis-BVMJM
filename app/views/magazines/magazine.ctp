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
$name = marc21_decode($item['245']);
$author = marc21_decode($item['100']);
?>
<h2><?php echo $name['a']; ?></h2>
<h3><?php echo $author['a']; ?></h3>
<div class="row">
	<?php if ($years) { ?>
		<?php foreach ($years as $i => $v): ?>
		<?php
			$numero = explode(', ', $v);
			$vol_ano = $numero[0];
			$numero = explode(' (', $numero[1]);
			$num = $numero[0];
			$fec = $numero[1];
			$fec = str_replace(")", "", $fec);
			$fec = str_replace(" ", "", $fec);
			$fec = explode('.', $fec);
		?>
		<div class="span3" style="height: 160px; text-align: center;">
			<div style="margin: 5px; height: 120px; padding: 10px; background-color: brown;">
				<?php echo $this->Html->link($vol_ano . ' - ' . $num . ' - ' . $fec[0] . '-' . $fec[1] . '-' . $fec[2], '/magazines/view/' . $this->passedArgs[0] . '/' . $i, array('style' => 'color: white;'));?>
			</div>
		</div>
		<?php endforeach; ?>
	<?php } else { ?>
		<br />
		<p style="text-align: center;">No hay obras publicadas.</p>
	<?php } ?>
</div>