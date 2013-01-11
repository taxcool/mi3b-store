<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MI 3B Jos</title>
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

<?php /*
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; */ ?>

<script type="text/javascript">

ddsmoothmenu.init({
  mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>


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
<?php include "user_template/header.php";?>
    
    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><?php echo anchor('ecommerce/index', 'Home');?></li>
            <li><?php echo anchor('ecommerce/produk', 'Produk');?></li>
            <li><?php echo anchor('ecommerce/news', 'News');?></li>
            <li><?php echo anchor('ecommerce/forum', 'Forum', array('class'=>'selected'));?></li>
            <li><?php echo anchor('ecommerce/caratransaksi', 'Cara Transaksi');?></li>
            <li><?php echo anchor('ecommerce/contact', 'Contact Us');?></li>
			<li><?php echo anchor('ecommerce/admin', 'Admin');?></li>
        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    
    <div class="cleaner h20"></div>
    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">
    	        
        <?php include "user_template/sidebar.php";?>
        
        <div id="content">
        	<div id="templatemo_search">
                <form action="#" method="get">
                  <input type="text" value="Search" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
			<br>       
        
		 <?php
			//echo $output;
			
			foreach($threadCat->result_array() as $thread):
			echo "<blockquote>";
			echo "<h4>".$thread['thread']."</h4>";
		?>
		
		<?php 
			
			echo "<br />";
			foreach($comment->result_array() as $com):
			echo "<h6>".$com['comment']."</h6><br />";
			echo "By : <i>".$com['inserted_by']."</i> | Comment : ??? | Like : ???";
			endforeach;
			

		?>
		</blockquote>
		<?php endforeach;  ?>
		
		<p />
		
		
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    
   <?php include "user_template/footer.php";?>
   
</div>

</body>
</html>
