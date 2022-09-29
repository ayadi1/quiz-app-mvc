<?php ob_start() ?>
<?php
    function optionSelected($choix, $currentId)
    {
        return (isset($_SESSION['examen'][$choix])  && $_SESSION['examen'][$choix] == $currentId) ? "selected" : "";
    }
?>

<div class="container">
    
    
    <div class="w-50 m-auto">
            <h1>ajouter Examen</h1>
        <div class="mt-5">
            <form method="post" action="./add">
                <div>
                    <label for="">filiere</label>
                    <select required class="form-select" name="filiere" onchange="submit()" id="selectFiliere">
                        <!-- <option value="" hidden></option> -->
                        <?php foreach ($filieres as $filiere) : ?>

                            <option <?= optionSelected('idFiliere', $filiere->getId())  ?> value="<?= $filiere->getId(); ?>"><?= $filiere->getLabel(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
        </div>


        <div class="mt-5">
            <label for="">module</label>
            <select class="form-select" name="module" id="" onchange="submit()">
                <?php if (isset($idFiliere)) : ?>
                    <?php foreach ($modules as $module) : ?>
                        <option <?= optionSelected('module', $module->getId()) ?>" value="<?= $module->getId() ?>"><?= $module->getLable(); ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
       

        <div class="mt-5">
            <label for="">competence</label>
            <select class="form-select" name="competence" id="" onchange="submit()">
                <?php if (isset($idModule)) : ?>
                    <?php foreach ($competences as $competence) : ?>
                        <option <?= optionSelected('competence', $competence->getId()) ?>" value="<?= $competence->getId() ?>"><?= $competence->getLIB_COMP(); ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>

            </select>
        </div>
        </form>

    </div>
    
</div>
<?php  $content  =ob_get_clean();
$title = "ajouter Examen";
?>
<?php 
require_once __DIR__. '/../../layout/layout.php';
?>