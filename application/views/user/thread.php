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
       <?php foreach($thread->result_array() as $hh):
			
		?>
        <a href="<?=base_url();?>index.php/ecommerce/forum">Home</a> > <a href="<?=base_url();?>index.php/ecommerce/forum">Forum</a> > <?=$hh['title'];?>
        <?php endforeach;?>
		<div id="content">
        	<div id="templatemo_search">
                <form action="#" method="get">
                  <input type="text" value="Search" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
			<br />
			<br />
			<h4><a href="<?=base_url()?>index.php/ecommerce/post_reply/<?=$this->uri->segment(3)?>" class="thread">Post Reply</a></h4>
		 <?php
			
			foreach($thread->result_array() as $thread):
			echo "<blockquote>";
			echo "<h4>".$thread['title']."</h4>";
			echo "<h5>".$thread['body']."</h5><br />";
			echo $thread['inserted_date']." | By : ".$thread['inserted_by'];
		?>
		</blockquote>
		
		<?php 
			endforeach;
			$no = 1;
			foreach($post->result_array() as $com):
			echo "<blockquote>";
			echo "#".$no."<h5>".$com['post']."</h5><br />";
			echo $com['inserted_date']." | By : ".$com['inserted_by'];
			$no += 1;
			echo "</blockquote>";
			endforeach;


		?>
		
		<p />
			<!--div id="contact_form">
			<?php echo form_open('ecommerce/createComment'); ?>
						
						<label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
						<div class="cleaner h10"></div>
							
						<label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
						<div class="cleaner h10"></div>
							
						<label for="subject">Subject:</label> <input type="text" name="subject" id="subject" class="input_field" />
						<div class="cleaner h10"></div>
			
						<label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
						<div class="cleaner h10"></div>
						
						<input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />
						<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
						
					</form>
				</div-->
		
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    
   <?php include "user_template/footer.php";?>
   
</div>

</body>
</html>
