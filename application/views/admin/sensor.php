<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Forum MI 3B Jos | Admin</title>
<link href="<?=base_url();?>/style/css/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?=base_url();?>style/css/ddsmoothmenu.css" />

<script type="text/javascript" src="<?=base_url();?>style/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>style/js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
  mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<link rel="stylesheet" type="text/css" href="<?=base_url();?>style/css/styles.css" />
<script language="javascript" type="text/javascript" src="<?=base_url();?>style/scripts/mootools-1.2.1-core.js"></script>
<script language="javascript" type="text/javascript" src="<?=base_url();?>style/scripts/mootools-1.2-more.js"></script>
<script language="javascript" type="text/javascript" src="<?=base_url();?>style/scripts/slideitmoo-1.1.js"></script>
<script language="javascript" type="text/javascript">
	window.addEvents({
		'domready': function(){
			/* thumbnails example , div containers */
			new SlideItMoo({
						overallContainer: 'SlideItMoo_outer',
						elementScrolled: 'SlideItMoo_inner',
						thumbsContainer: 'SlideItMoo_items',		
						itemsVisible: 5,
						elemsSlide: 2,
						duration: 200,
						itemsSelector: '.SlideItMoo_element',
						itemWidth: 171,
						showControls:1});
		},
		
	});

	function clearText(field)
	{
		if (field.defaultValue == field.value) field.value = '';
		else if (field.value == '') field.value = field.defaultValue;
	}
</script>

</head>
<?php include "admin_template/header.php"?>
    
    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><?php echo anchor('ecommerce/admin', 'Home');?></li>
			<li><?php echo anchor('ecommerce/index', 'User');?></li>
			<li><?php echo anchor('ecommerce/admin/4', 'Forum', array('class'=>'selected'));?></li>
			
        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    
    <div class="cleaner h20"></div>
    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">
     
        <?php include "admin_template/sidebar.php";?>
        
        <div id="content">
		<h3>Admin Menu</h3> <br />
                	<h4><a href="<?=base_url();?>index.php/admin/forum/1">Manage Thread</a> | <a href="<?=base_url();?>index.php/admin/forum/2">Manage Post</a> | <a href="<?=base_url();?>index.php/admin/forum/3">Manage Word Sensor</a></h4>
					<h5>Sensor</h5><br />
					<a href="<?=base_url();?>index.php/admin/forum/3/add" class="thread">+ | Add Sensor Word</a><p />
<div class="pagination"><?=$links;?><?=form_open('admin/forum/search/3');?><input type="text" value="Search" name="search" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" /><input type="submit"></form></div>
<div class="table"><table border="0" align="center" cellpadding="5" cellspacing="0">
  <tr bgcolor="azure">
    <th width="40%" align="center">Word</th>
    <th align="center">Sensored</th>
    <th align="center">Status</th>
    <th width="20%" align="center">Action</th>
  </tr>
					<?php
					
					$field = 0;
					foreach($sensor->result_array() as $thr):?>
	<tr align="center" 
		onmouseover="this.style.backgroundColor='#c4c4c4';"
		onmouseout="this.style.backgroundColor='<?php if($field%2==0){echo "#ECECEC";}else{echo "#ffffff";} ?>';">
    <td ><?php echo "$thr[word]"; ?></td>
	<td ><?php echo "$thr[sensored]"; ?></td>
    <td ><?php if($thr['is_deleted'] == 0) echo "Actived";else echo "Not Actived"; ?></td>
    <td ><a href="<?=base_url();?>index.php/admin/forum/3/edit/<?=$thr['id'];?>"><img src="<?=base_url();?>/style/images/edit.gif" height="20"></a> <a href="<?=base_url();?>index.php/admin/forum/3/view/<?=$thr['id'];?>"><img src="<?=base_url();?>/style/images/view.png" height="25"></a> <a href="<?=base_url();?>index.php/admin/forum/3/delete/<?=$thr['id'];?>"><img src="<?=base_url();?>/style/images/delete.png" height="20"></a></td>
    </tr>
					<?php $field++; endforeach;?>
	</table></div>

<div class="pagination"><?=$links;?><?=form_open('admin/forum/search/3');?><input type="text" value="Search" name="search" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" /><input type="submit"></form></div>
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    
   <?php include "admin_template/footer.php";?>   
   
</div>

</body>
</html>
