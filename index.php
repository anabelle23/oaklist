<?php

include("dbConfig.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $website_title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet"> 
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.easydropdown.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
<!-- start menu -->     
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- end menu -->
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!-- top scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
   <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>		
</head>
<body>
 
   	 <?php 
	 include("header.php");
	 ?> 
       <div class="login container-fluid">
         <div class="wrap">
		 
     	    <div class="rsidebar span_1_of_left">
			
				   <section  class="sky-form ">
                 
 <div class="panel-group" id="accordion">
 
 <?php
 $sl = mysqli_query($con,"SELECT * FROM category");
 
 $count=0;
 
 $all_cats = array();
 
 while($rv = mysqli_fetch_array($sl))
 {
	    
	 if($rv['parent'] !=""){continue;}
     
     array_push($all_cats,$rv['name']); 

	 
 }
 ?>
 
 
 <?php
 
 $uq = array_unique($all_cats);
 
 foreach($uq as $v)
 {
	 $count++;
	 
 ?>
 
  <div class="panel panel-default">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo htmlentities($count); ?>">
       <?php echo htmlentities($v); ?>  </a>
      
	  
	  </h4>
    <div id="collapse<?php echo htmlentities($count); ?>" class="panel-collapse collapse in ">
    <div class="panel-body">
	  
	  
	   <?php
	 
	 $cnt=0;
	 
 
 
 
	 
  $sl = mysqli_query($con,"SELECT * FROM category WHERE parent='$v' ");
 
 while($rvx = mysqli_fetch_array($sl))
 {
	  $cat = $rvx['name'];
	   $slwy = mysqli_query($con,"SELECT * FROM item WHERE category='$cat' ");
 
	 while($rvxwy = mysqli_fetch_array($slwy))
	 {
		 
		 
		 $cnt++;
		 
		 
	 }
	 
	 
	 ?>
	 
	 	<label class="checkbox"><a href="<?php echo $rvx['name']?>"> <?php echo htmlentities($rvx['name']); ?> (<?php echo htmlentities($cnt); ?>)</a></label>
 <?php
  
  $cnt=0;
 }

 
?> 

	  
	  </div>
    </div>
  </div>
  
  
  <?php
  }
  
  ?>
 
  
  
  
  
</div>



				</section>
				
				
		        
		</div>


		<div class="cont span_2_of_3">
		 
			    <div class="box1">
				
				<?php
				
				if(isset($_GET['idy']))
				{
					$get_idy = $_GET['idy'];
		 
				
				$sel = mysqli_query($con,"SELECT * FROM item WHERE category='$get_idy' ");
				
				while($row = mysqli_fetch_array($sel))
				{
					
					$posted_by  = $row['c1'];
					
				?>
				
				   <div class="col_1_of_single1 span_1_of_single1"><a  href="single.php?item_id=<?php echo htmlentities($row['id']); ?>">
				     <div class="view1 view-fifth1">
				  	  <div class="top_box">
					  	<h3 class="m_1"><?php echo htmlentities($row['item_name']); ?></h3>
					  	<p class="m_2">
					
				<?php					
						$selt = mysqli_query($con,"SELECT * FROM c1 WHERE id='$posted_by' ");
				
						while($rowt = mysqli_fetch_array($selt))
						{
							echo htmlentities($rowt['firstname'])." ".htmlentities($rowt['lastname']);
						}
				?>
						
						
						</p>
				         <div class="grid_img">
						   <div class="css3"><img src="<?php echo str_replace("../","",htmlentities($row['image1']) ); ?>" class="img-responsive" style="width:100%; height:160px;" alt=""/></div>
					        
	                    </div>
                       <div class="price">₦<?php echo htmlentities($row['item_price']); ?></div>
					   </div>
					    </div>
			    	    <div class="clear"></div>
			    	</a></div>
				<?php 
				}
				}
				
				else
					
				
				{ 
				
				$sel = mysqli_query($con,"SELECT * FROM item ");
				
				while($row = mysqli_fetch_array($sel))
				{
					$posted_by  = $row['c1'];
				?>
				   <div class="col_1_of_single1 span_1_of_single1"><a  href="single.php?item_id=<?php echo htmlentities($row['id']); ?>">
				     <div class="view1 view-fifth1">
				  	  <div class="top_box">
					  	<h3 class="m_1"><?php echo htmlentities($row['item_name']); ?></h3>
					  	<p class="m_2">
					
				<?php					
						$selt = mysqli_query($con,"SELECT * FROM c1 WHERE id='$posted_by' ");
				
						while($rowt = mysqli_fetch_array($selt))
						{
							echo htmlentities($rowt['firstname'])." ".htmlentities($rowt['lastname']);
						}
				?>	
						</p>
				         <div class="grid_img">
						   <div class="css3"><img src="<?php echo str_replace("../","",htmlentities($row['image1']) ); ?>" class="img-responsive" style="width:300px; height:160px;" alt=""/></div>
					        
	      </div>
            <div class="price">₦<?php echo htmlentities($row['item_price']); ?></div>
						 </div>
					    </div>
			    	    <div class="clear"></div>
						</a></div>
				<?php 
				}	
				}
				?>
				 <div class="clear"></div>
			   </div>
			   </div>
			  <div class="clear"></div>
			</div>
		</div>

	<?php
	include("footer.php");
	?>
       <script type="text/javascript">
			$(document).ready(function() {
				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
		 		};	
				$().UItoTop({ easingType: 'easeOutQuart' });	
			});
		</script>
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>