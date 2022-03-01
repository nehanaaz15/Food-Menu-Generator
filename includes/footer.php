
<div class="footer">
	<div class="wrap">
		<div class="copyright text-center">
			<p>Copyright &copy; 2021 All rights reserved</p>
		</div>
	</div>
</div>

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