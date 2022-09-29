<?php ob_start() ?>


<div class="container">
    <h1>!!- title here -!!</h1>
        
    
</div>
<?php  $content  =ob_get_clean();
$title = "!!- title here -!!";
?>
<?php 
require_once __DIR__. '/../../layout/layout.php';
?>