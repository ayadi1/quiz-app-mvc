<?php ob_start()?>
<?php
function optionSelected($choix, $currentId)
{
    return (isset($_SESSION['examen'][$choix]) && $_SESSION['examen'][$choix] == $currentId) ? "selected" : "";
}
?>

<div class="container"> 


    <div class="w-50 m-auto">
        <h1>ajouter Examen</h1>
        <form method="post" class="border p-3 bg-light mt-4" action="./add">
            <div class="">
                <div>
                    <label for="">filiere</label>
                    <select required class="form-select" name="filiere" onchange="submit()" id="selectFiliere">
                        <!-- <option value="" hidden></option> -->
                        <?php foreach ($filieres as $filiere): ?>

                        <option <?= optionSelected('idFiliere', $filiere->getId())?> value="
                            <?= $filiere->getId(); ?>">
                            <?= $filiere->getLabel(); ?>
                        </option>
                        <?php
endforeach; ?>
                    </select>
                </div>
            </div>


            <div class="mt-2">
                <label for="">module</label>
                <select class="form-select" name="module" id="" onchange="submit()">
                    <?php if (isset($idFiliere)): ?>
                    <?php foreach ($modules as $module): ?>
                    <option <?= optionSelected('idModule', $module->getId())?> value="
                        <?= $module->getId()?>">
                        <?= $module->getLabel(); ?>
                    </option>
                    <?php
    endforeach; ?>
                    <?php
endif; ?>
                </select>
            </div>


            <div class="mt-2">
                <label for="">competence</label>
                <select class="form-select" name="competence" id="" onchange="submit()">
                    <?php if (isset($idModule)): ?>
                    <?php foreach ($competenses as $competence): ?>
                    <option <?= optionSelected('idCompetence', $competence->getId())?> value="
                        <?= $competence->getId()?>">
                        <?= $competence->getLabel(); ?>
                    </option>
                    <?php
    endforeach; ?>
                    <?php
endif; ?>

                </select>
            </div>
            <?php if ($idCompetence): ?>
            <div class="form-group mt-2">
                <label for="label">label</label>
                <input type="text" name="label" class="form-control" placeholder="label" id="label">
                <?php if (isset($_SESSION['errors']['addExam']['label'])): ?>
                <small class="fs-6 text-danger">
                    <?= $_SESSION['errors']['addExam']['label']?>
                    <?php unset($_SESSION['errors']['addExam']['label'])?>
                </small>
                <?php
    endif; ?>
            </div>
            <div class="form-group mt-2">
                <label for="datePassation">date de passation</label>
                <input type="date" name="datePassation" class="form-control" placeholder="date de passation"
                    id="datePassation">
            </div>
            <?php if (isset($_SESSION['errors']['addExam']['datePassation'])): ?>
            <small class="fs-6 text-danger">
                <?= $_SESSION['errors']['addExam']['datePassation']?>
                <?php unset($_SESSION['errors']['addExam']['datePassation'])?>
            </small>
            <?php
    endif; ?>
            <input type="submit" class="btn btn-outline-primary w-100 mt-2" value="ajouter" />

            <?php
endif; ?>
        </form>

    </div>

</div>
<?php $content = ob_get_clean();
$title = "ajouter Examen";
?>
<?php
require_once __DIR__ . '/../../layout/layout.php';
?>