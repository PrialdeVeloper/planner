	<script src="../../public/js/bootstrap/jquery-3.3.1.js"></script>
    <script src="../../public/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../../public/js/dashboard.js"></script>
<?php 
extract($errors);
?>
    	<script type="text/javascript">
    		var target = "<?=$activeBar;?>";
    		$(function(){
    			$("#"+target).addClass('activeBar');
    		});
    	</script>
    	<script type="text/javascript">
    		$('#textlayer').fadeIn('slow', function () {
   				$('#text').animate({'opacity': 'show', 'paddingTop': 0}, 2000);
			});
    	</script>
</body>
</html>