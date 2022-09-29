<?php ob_start() ?>


<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">examen</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
        <?php  foreach($examens as $examen): ?>
            <tr>
                <th><?= $examen->getId()  ?></th>
                <td><?= $examen->getTitle()  ?></td>
                <td>
                    <a class="btn btn-primary">
                    <i class="fa-sharp fa-solid fa-pen-fancy"></i>
                    </a>
                    <a class="btn btn-danger">
                    <i class="fa-sharp fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
          
            
        </tbody>
    </table>
</div>
<?php  $content  =ob_get_clean();
$title = "index examen";
?>
<?php 
require_once __DIR__. '/../../layout/layout.php';
?>