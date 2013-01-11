<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forum | MI 3B Jos</title>
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
<script type="text/javascript"  src="<?php echo base_url() ?>style/js/tiny_mce/tiny_mce.js"></script>
<script language="javascript"  type="text/javascript">
      tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        skin : "o2k7",
        plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",
 
        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,undo,redo,|,cut,copy,paste,pastetext,pasteword,|,search,replace",
        theme_advanced_buttons2 : "emotions,iespell,media,advhr,|,print,|,ltr,rtl",
        theme_advanced_buttons3 : "",
        //theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,
        content_css : "css/word.css",
        template_external_list_url : "lists/template_list.js",
        external_link_list_url : "lists/link_list.js",
        external_image_list_url : "lists/image_list.js",
        media_external_list_url : "lists/media_list.js",
 
         
    });
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
<script>
$(function() {
	
	$( "#tabse" ).tabs();
	
	});
	
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
<?php include "user_template/header.php"?>
    
    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><?php echo anchor('ecommerce/index', 'Home');?></li>
            <li><?php echo anchor('ecommerce/produk', 'Produk' );?></li>
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
    	<?php include "user_template/sidebar.php"?>
		<a href="<?=base_url();?>index.php/ecommerce/forum">Home</a> > <a href="<?=base_url();?>index.php/ecommerce/forum">Forum</a>
		<?php foreach($category->result_array() as $hh):?>
        <?php if($this->uri->segment(3) == null){ ?>
			
		<?php }else{ ?> > <?=$hh['category']; } ?>
        <?php endforeach;?>
        <div id="content" class="forum">
		<div id="templatemo_search">
                <form action="#" method="get">
                  <input type="text" value="Search" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
			<br />
			<?php			
				
				foreach($category->result_array() as $cat):
				
				?>
				<br /><h3><a href="<?=base_url();?>index.php/ecommerce/forum/<?=$cat['id'];?>"><?php echo $cat['category'];?></a></h3>
			<?php
				if($this->uri->segment(3)== null){
					echo "";
				}else{
			?>
				<br /><h4><a href="<?=base_url();?>index.php/ecommerce/forum/new_thread/<?=$cat['id'];?>" class="thread"><? echo "Add Thread";?></a></h4>
			<?php } 
			?>
				<blockquote>
			<?php
				echo "<h5>Last Thread</h5>";
				foreach($thread->result_array() as $row):
				$num = $row['id'];
				$this->db->like('id_thread', $num);
				$this->db->from('post');
				$replies = $this->db->count_all_results();
				
				
				$this->db->where('id', $num);
				$this->db->from('thread');
				$query = $this->db->get();
				
				if($cat['id']==$row['id_category']){	
				
			?>		
					<h5>
					<a href="#" id="expand"><img src="<?=base_url();?>/style/images/templatemo_list.png"></a>					
					<a href="<?=base_url();?>index.php/ecommerce/thread/<?=$row['id'];?>">
					<?php echo $row['title'];?>
					</a>
					</h5><br />
					
					<h6>Replies : <a href="<?=base_url();?>index.php/ecommerce/thread/<?=$row['id'];?>"><?php echo $replies; ?></a> | viewed : <?php foreach($query->result_array() as $viewed): echo $viewed['viewed']; endforeach;?> |<i> <?php echo $row['inserted_date'];?> </i>| by : <?php echo $row['inserted_by'];?></h6>
					
					<p>
				
			<?php 				
				}
				endforeach;
				echo "</blockquote>";

				endforeach; 
				
			//	echo $output;
			?>
			<?php 
			if($this->uri->segment(4)== null){
					echo "";
				}else if($this->uri->segment(4)== !null){
				
			?>
			<div id="contact_form">
			<?php echo form_open('ecommerce/createThread/'.$this->uri->segment(4)); ?>
						<input type="hidden" id="author" name="id" value="<?php echo $this->uri->segment(4);?>"/>
						
						<label for="author">Title:</label> <input type="text" id="author" name="title" class="required input_field" />
						<div class="cleaner h10"></div>
						
						<label for="comments">Body:</label> 
						<textarea name="comments" id="comments" rows="0" cols="0" class="required"></textarea>
						<div class="cleaner h10"></div>
												
						<input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />
						<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
						
					</form>
				</div>
			<?php }  ?>
            
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    
   <?php include "user_template/footer.php"?>
   
</div>

</body>
</html>
