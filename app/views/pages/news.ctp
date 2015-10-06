<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/pages">Inicio</a></li>
<li>Noticias</li>
</ul>
<h2>Noticias</h2>
	<?php $news = $this->requestAction('/news/news'); ?>
	<div style="width: 100%; overflow: auto; padding-right: 10px;">
		<p class="noticias_txt" style="text-align: justify; color: black"><br />
			<?php foreach ($news as $new) { ?>
				<strong><span class="noticias_tit"><?php echo $new['News']['title']; ?></span></strong><br />
				<?php echo $new['News']['content']; ?>
				<?php echo $new['News']['description']; ?>
				<br />
				<i>Publicado el <?php echo $time->format('d-m-Y', $new['News']['created']); ?>.</i>
				<br /><br />
			<?php } ?>
		</p>
	</div>
	
	<?php if ($this->Paginator->params['paging']['Pagetext']['pageCount'] > 1) { ?>
	<div class="pagination" align="center">
		<ul>
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
		</ul>
	</div><br />
	<?php } ?>