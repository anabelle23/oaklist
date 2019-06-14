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
	 
       <div class="single">
         <div class="wrap">
		 
		
		<?php
		
		$get_item_id = $_GET['id'];
		$sl = mysqli_query($con,"SELECT *FROM c1 WHERE id='$get_item_id' ");
		
		$uid="";
		while($row = mysqli_fetch_array($sl))
		{
			
		$uid= $row['id'];
		
		?>
		
		<div class="cont span_2_of_3">
			  <div class="labout span_1_of_a1">
		 
			</div>
 			<div class="cont1 span_2_of_a1">
			 		 
			 
		 	   <table class="table table-striped table-bordered">
	 
	 <thead>
	  
	 
	 </thead>
	 
	 <tbody>
	 
	 <tr>
	 <th> First Name</th>
	 <td> <?php echo htmlentities($row['firstname']); ?></td>
	 </tr>
	 
	 
	 <tr>
	 <th> Email Address</th>
	 <td> <?php echo htmlentities($row['email']); ?></td>
	 </tr>
	 
	 <tr>
	 <th> Phone Number</th>
	 <td> <?php echo htmlentities($row['phone']); ?></td>
	 </tr>
	 
	 <tr>
	 <th> Country</th>
	 <td> <?php echo htmlentities($row['country']); ?></td>
	 </tr>
 
	 
	 </tbody>
	 
	 </table>
 
    		 
		 
    			
              
			</div>
			<div class="clear"></div>
     
     
 
 		
 
     </div>
	 
	 
 
	 
	 <?php
	 }
	 ?>
     <div class="clear"></div>
	 
	  <div class="container">
	  <div class="row">
	  
	  <div class="col-xs-3"></div>
	  <div class="col-xs-9">
				<?php
	 				$sel = mysqli_query($con,"SELECT * FROM item  WHERE c1='$uid'");
				
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
						   <div class="css3"><img src="<?php echo str_replace("../","",htmlentities($row['image1']) ); ?>" class="img-responsive" style="width:200px; height:160px;" alt=""/></div>
					        
	                    </div>
                       <div class="price">N<?php echo htmlentities($row['item_price']); ?></div>
					   </div>
					    </div>
						   </li>
					     </ul>
			    	    <div class="clear"></div>
			    	</a></div>
				
			
				<?php 
				}
				?>
	 
	 </div>
	 </div>
	 </div>
	 
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