<?php 
    if(isset($errors) && !empty($errors)){
        extract($errors);
            if(isset($data[0]) && !empty($data[0])){
                extract($data[0]);
            }   
    }
?>   
        <div id="content">
            <div class="container lead text-center mt-3" id="title"><span class="text-orange">- </span>News Feed<span class="text-orange"> -</span></div>
                <?php echo $DOM;?>
        </div>
            
