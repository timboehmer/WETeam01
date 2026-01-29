<div class="container">
    <div class="card bg-light mt-4">
        <legend class="card-header">
            <div class="d-flex justify-content-between">
                <div class="h5"><strong>Board <?= isset($_POST['btnLoeschen']) ? ' löschen' : ' bearbeiten oder neu erstellen'?></strong></div>
                <div class="h5"><strong></strong></div>
            </div>
        </legend>
        <div class="card-body">

            <form action="<?= base_url('boards/submit_edit') ?>" method="post">
                <input type="hidden" name="id" value="<?= $boards['id'] ?? '' ?>">


                <div class="form-group row mb-2">
                    <label for="Board" class="col-sm-2 col-form-label">Board:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?=(isset($error['board']))?'is-invalid':''?>"  id="board" name="board" placeholder="Bezeichnung des Boards"
                               value="<?= $boards['board'] ?? '' ?>" >
                        <div class="invalid-feedback">
                            <?=(isset($error['board'])) ?$error['board']:''?>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">

                        <? if($todo == 0) : ?>
                            <button type="submit" class="btn btn-success mb-2 mr-2" name="btnSpeichern" id="btnSpeichern"><i class="far fa-plus-square"></i> Erstellen</button>
                        <? endif ?>

                        <? if($todo == 1) : ?>
                            <button type="submit" class="btn btn-success mb-2 mr-2" name="btnSpeichern" id="btnSpeichern"><i class="far fa-save"></i> Speichern</button>
                        <? endif ?>

                        <? if($todo == 2) : ?>
                            <button type="submit" class="btn btn-danger mb-2 mr-2" name="btnLoeschen" id="btnbtnLoeschen"><i class="fas fa-trash"></i> Löschen</button>
                        <? endif ?>

                        <button class="btn btn-primary mb-2" type="submit" name="btnAbbrechen" id="btnAbbrechen"><i class="far fa-window-close"></i> Abbrechen</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

