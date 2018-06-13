	<script src="../../public/js/bootstrap/jquery-3.3.1.js"></script>
    <script src="../../public/js/bootstrap/bootstrap.bundle.min.js"></script>
<?php 
extract($errors);
?>
    	<script type="text/javascript">
    		var target = "<?=$activeBar;?>";
    		$(function(){
    			$("#"+target).addClass('activeBar');
    		});
    	</script>
</body>
</html>