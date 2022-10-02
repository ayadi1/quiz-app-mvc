<?php ob_start()?>


<div class="container">
    <h1>Examen</h1>
    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between">
            <a href="./examen/add" role="button" class="btn btn-outline-primary">ajouter</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">examen</th>
                        <th scope="col">date creation</th>
                        <th scope="col">date passation</th>
                        <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($examens as $examen): ?>
                    <form action="./examen/<?= $examen->getId()?>/update" method="post">
                        <tr>
                            <th>
                                <?= $examen->getId()?>
                            </th>
                            <td>
                                <input required type="text" value="<?= $examen->getLabel()?>" name="label">
                            </td>
                            <td>
                                <?= $examen->getDateCreation()?>
                            </td>
                            <td>
                                <input required type="date" value="<?= $examen->getDatePassation()?>"
                                    name="datePassation">
                            </td>
                            <td>
                                <button class="btn btn-primary">
                                    update</i>
                                </button>
                                <a class="btn btn-danger">
                                    delete</i>
                                </a>
                            </td>
                        </tr>
                    </form>
                    <?php
endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

</div>
<?php $content = ob_get_clean();
$title = "index examen";
?>
<?php
require_once __DIR__ . '/../../layout/layout.php';
?>