

<?php

if(!isset($active_menu))
{
    $active_menu = '';
}
?>
<?php 
echo '<li>'.$this->Html->link($this->Html->tag('i', '', ['class' => 'icon-home']).'Dashboard', '/Users/Dashboard',['escape' => false]).'</li>';
?>

<?php 
$target=array("2","3");
if(!empty(count(array_intersect($userPages, $target)))){?>
<li class="start ">
	<a href="javascript:;">
	<i class="fa fa-info-circle"></i>
	<span class="title">Sales Invoice</span>
	<span class="arrow "></span>
	</a>
	<ul class="sub-menu">
	   <?php if (in_array("2", $userPages)){?>
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square']).' Create', '/SalesInvoices/Add',['escape' => false]); ?></li>
		<?php }?>
		
		<?php if (in_array("3", $userPages)){?>
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-list-ul']).' List', '/SalesInvoices',['escape' => false]); ?></li>
		<?php }?>
	</ul>
</li>
<?php }?>


<?php 
$target=array("10","11");
if(!empty(count(array_intersect($userPages, $target)))){?>
<li class="start ">
	<a href="javascript:;">

	<i class="fa fa-paragraph"></i>
	<span class="title">Purchase Invoice</span>
	<span class="arrow "></span>
	</a>
	<ul class="sub-menu">
	 <?php if (in_array("10", $userPages)){?>
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square']).' Create', '/PurchaseInvoices/Add',['escape' => false]); ?></li><?php }?>
		 <?php if (in_array("11", $userPages)){?>
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-list-ul']).' List', '/PurchaseInvoices',['escape' => false]); ?></li><?php }?>
	</ul>
</li>
<?php }?>

<?php 
$target=array("19","20","21","22","23","24","25","26","27");
if(!empty(count(array_intersect($userPages, $target)))){
echo '<li>'.$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-folder-open']).'Reports', '/Users/reports',['escape' => false]).'</li>';
}?>
<?php 
$target=array("28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54");
if(!empty(count(array_intersect($userPages, $target)))){
echo '<li>'.$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-bank']).'Vouchers', '/Users/voucherSetup',['escape' => false]).'</li>';
}?>
<?php 
$target=array("55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81");
if(!empty(count(array_intersect($userPages, $target)))){
echo '<li>'.$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-cab']).'Masters & Setup', '/Users/masterSetup',['escape' => false]).'</li>';
}?>

<?php if (in_array("82", $userPages)){
echo '<li>'.$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-edit']).'User Rights', '/userRights/add',['escape' => false]).'</li>';
}?>

<?php 
echo '<li>'.$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-lock']).'Logout', '/Users/logout',['escape' => false]).'</li>';
?>