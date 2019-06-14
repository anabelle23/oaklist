<?php

include("dbConfig.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $website_title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="css/single.css" rel="stylesheet" type="text/css" media="all" />
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
	 
	 <div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">

					<?php
		
						$get_item_id = $_GET['item_id'];
						
		                $sl = mysqli_query($con,"SELECT *FROM item WHERE id='$get_item_id' ");
		
		
		                while($row = mysqli_fetch_array($sl))
						
						{
			
		            ?>
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="<?php echo str_replace("../","",htmlentities($row['image1'])); ?>" /></div>
						  <div class="tab-pane" id="pic-2"><img src="<?php echo str_replace("../","",htmlentities($row['image2'])); ?>" /></div>
						  <div class="tab-pane" id="pic-3"><img src="<?php echo str_replace("../","",htmlentities($row['image3'])); ?>" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="<?php echo str_replace("../","",htmlentities($row['image1'])); ?>" class="product-img" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="<?php echo str_replace("../","",htmlentities($row['image2'])); ?>" class="product-img" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="<?php echo str_replace("../","",htmlentities($row['image3'])); ?>" class="product-img" /></a></li>
						</ul>
						
					</div>
					<div class="details col-md-6">
					
						<h3 class="product-title"><?php echo htmlentities($row['item_name']); ?></h3>
				
						<p class="product-description"><?php echo htmlentities($row['item_details']); ?></p>
						<h4 class="price">current price: <span>₦<?php echo htmlentities($row['item_price']); ?></span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<div class="action">
						<a href="seller_profile.php?id=<?php echo htmlentities($row['c1']); ?>"><button class="btn-seller">Contact seller</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<br>
<br>
<br>
<?php
	 }
	 ?>
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