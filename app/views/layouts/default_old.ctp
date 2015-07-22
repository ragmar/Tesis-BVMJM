<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //__('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $scripts_for_layout;
		
		echo $this->Html->css('themes/rocket/jquery-wijmo');
		
		echo $this->Html->css('themes/wijmo/jquery.wijmo.wijsuperpanel');
		echo $this->Html->css('themes/wijmo/jquery.wijmo.wijmenu');
		echo $this->Html->script('jquery-1.7.1.min');
		echo $this->Html->script('jquery-ui-1.8.18.custom.min');
		echo $this->Html->script('jquery.mousewheel.min');
		echo $this->Html->script('jquery.bgiframe-2.1.3-pre');
		echo $this->Html->script('wijmo/jquery.wijmo.wijutil');
		echo $this->Html->script('wijmo/jquery.wijmo.wijsuperpanel');
		echo $this->Html->script('wijmo/jquery.wijmo.wijmenu');
	?>
	<script type="text/javascript">
        $(document).ready(function () {
            $("#menu").wijmenu();
        });
    </script>
</head>
<body>
	<div id="container">
		<div id="header" style="background-color: white;">
		<?php
			echo $this->Html->link(
				$this->Html->image('logo.jpg', array('alt'=> __('BMJM', true), 'border' => '0')),
				'http://www.bmjm.com/',
				array('target' => '_blank', 'escape' => false)
			);
		?>
		<!-- <h1><?php //echo $this->Html->link(__('CakePHP: the rapid development php framework', true), 'http://cakephp.org'); ?></h1> -->
		
		<div class="container">

        <div>
            <!-- Begin demo markup -->
            <ul id="menu">
                <li><a href="#">Breaking News</a>
                    <ul>
                        <li><a href="#">Entertainment</a></li>
                        <li><a href="http://www.w3schools.com/tags/html5.asp">Politics</a></li>
                        <li><a href="#">A&amp;E</a></li>
                        <li><a href="#">Sports</a> </li>
                        <li><a href="#">Local</a></li>
                        <li><a href="#">Health</a></li>
                    </ul>
                </li>
                <li><a href="#">Entertainment</a>
                    <ul>
                        <li><a href="#">Celebrity news</a></li>
                        <li><a href="#">Gossip</a></li>
                        <li><a href="#">Movies</a></li>
                        <li><a href="#">Music</a>
                            <ul>
                                <li><a href="#">Alternative</a></li>
                                <li><a href="#">Country</a></li>
                                <li><a href="#">Dance</a></li>
                                <li><a href="#">Electronica</a></li>
                                <li><a href="#">Metal</a></li>
                                <li><a href="#">Pop</a></li>
                                <li><a href="#">Rock</a>
                                    <ul>
                                        <li><a href="#">Bands</a>
                                            <ul>
                                                <li><a href="#">Dokken</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Fan Clubs</a></li>
                                        <li><a href="#">Songs</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Slide shows</a></li>
                        <li><a href="#">Red carpet</a></li>
                    </ul>
                </li>
                <li><a href="#">Finance</a>
                    <ul>
                        <li><a href="#">Personal</a>
                            <ul>
                                <li><a href="#">Loans</a></li>
                                <li><a href="#">Savings</a></li>
                                <li><a href="#">Mortgage</a></li>
                                <li><a href="#">Debt</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Business</a></li>
                    </ul>
                </li>
                <li><a href="#">Food &#38; Cooking</a>
                    <ul>
                        <li><a href="#">Breakfast</a></li>
                        <li><a href="#">Lunch</a></li>
                        <li><a href="#">Dinner</a></li>
                        <li><a href="#">Dessert</a>
                            <ul>
                                <li><a href="#">Dump Cake</a></li>
                                <li><a href="#">Doritos</a></li>
                                <li><a href="#">Both please.</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Politics</a></li>
                <li><a href="#">Sports</a></li>
            </ul>

            <!-- End demo markup -->
            <div class="demo-options">
                <!-- Begin options markup -->
                <!-- End options markup -->
            </div>
        </div>
    </div>
		
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
		<div id="footer" style="background-color: white;">
			<?php echo $this->Html->link(
					$this->Html->image('bajofooter.jpg', array('alt'=> __('', true), 'border' => '0')),
					'',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>