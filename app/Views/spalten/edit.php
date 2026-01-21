<div class="container">
    <div class="card bg-light mt-4">
        <legend class="card-header">
            <div class="d-flex justify-content-between">
                <div class="h5"><strong>Spalten <?= isset($_POST['btnLoeschen']) ? ' löschen' : ' bearbeiten oder neu erstellen'?></strong></div>
                <div class="h5"><strong></strong></div>
            </div>
        </legend>
        <div class="card-body">

            <form action="<?= base_url('spalten/submit_edit') ?>" method="post">
                <input type="hidden" name="id" value="<?= $spalten['id'] ?? '' ?>">


                <div class="form-group row mb-2">
                    <label for="Spalte" class="col-sm-2 col-form-label">Spalte:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?=(isset($error['spalte']))?'is-invalid':''?>"  id="spalte" name="spalte" placeholder="Bezeichnung der Spalte"
                               value="<?= $spalten['spalte'] ?? '' ?>" >
                        <div class="invalid-feedback">
                            <?=(isset($error['spalte'])) ?$error['spalte']:''?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="SortID" class="col-sm-2 col-form-label">SortID:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?=(isset($error['sortid']))?'is-invalid':''?>" id="sortid" name="sortid" placeholder="Sortiernummer der Spalte"
                               value="<?= $spalten['sortid'] ?? '' ?>" >
                        <div class="invalid-feedback">
                            <?=(isset($error['sortid'])) ?$error['sortid']:''?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="Spaltenbeschreibung" class="col-sm-2 col-form-label">Spaltenbeschreibung:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?=(isset($error['spaltenbeschreibung']))?'is-invalid':''?>" id="spaltenbeschreibung" name="spaltenbeschreibung" value="<?= $spalten['spaltenbeschreibung'] ?? '' ?>" >
                        <div class="invalid-feedback">
                            <?=(isset($error['spaltenbeschreibung'])) ?$error['spaltenbeschreibung']:''?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="BoardsID" class="col-sm-2 col-form-label">Board:</label>
                    <div class="col-sm-10">
                        <select name="boardsid" class="form-select">
                            <option value="" <?= (!isset($spalten['boardsid']) || $spalten['boardsid'] == 0 || $spalten['boardsid'] == "") ? 'selected' : '' ?>>
                                Kein Board
                            </option>
                            <option value="1" <?= (isset($spalten['boardsid']) && $spalten['boardsid'] == 1) ? 'selected' : '' ?>>Übung 5</option>
                            <option value="2" <?= (isset($spalten['boardsid']) && $spalten['boardsid'] == 2) ? 'selected' : '' ?>>Übung 6</option>
                            <option value="3" <?= (isset($spalten['boardsid']) && $spalten['boardsid'] == 3) ? 'selected' : '' ?>>Übung 7</option>
                        </select>
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

