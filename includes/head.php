<title>Food Menu Generator</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"
	content="BOX SHOP Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css"
	media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- start slider -->
<script src="js/responsiveslides.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
<!--end slider -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css"
	media="screen" />
<script type="text/javascript">
			$(window).load(function() {
				$("#flexiselDemo").flexisel({
					visibleItems: 5,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
			    	responsiveBreakpoints: { 
			    		portrait: { 
			    			changePoint:480,
			    			visibleItems: 1
			    		}, 
			    		landscape: { 
			    			changePoint:640,
			    			visibleItems: 2
			    		},
			    		tablet: { 
			    			changePoint:768,
			    			visibleItems: 3
			    		}
			    	}
			    });
			    
			});
		</script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<style>
.label {
	width: 100px;
	text-align: right;
	float: left;
	padding-right: 10px;
	font-weight: bold;
}

#register-form label.error {
	color: #FB3A3A;
	font-weight: normal;
	font-size: 13px;
	float: left;
	width: 100%;
}

h1 {
	font-family: Helvetica;
	font-weight: 100;
	color: #333;
	padding-bottom: 20px;
}
</style>
<script src="js/jquery.validate.min.js"></script>
<script>
    $(function () {

        $("#register-form").validate({});

    });
</script>
<script>
    function loadperpage(field) {
    	$(window.location).attr('href', '?per='+field.value);
    }
</script>
<link href="css/pagination.css" rel="stylesheet">