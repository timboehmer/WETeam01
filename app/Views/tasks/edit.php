<div class="container">
    <div class="card bg-light mt-4">
        <legend class="card-header">
            <div class="d-flex justify-content-between">
                <div class="h5"><strong>Task <?= isset($_POST['btnLoeschen']) ? ' löschen' : ' bearbeiten oder neu erstellen'?></strong></div>
                <div class="h5"><strong></strong></div>
            </div>
        </legend>
        <div class="card-body">

            <form action="<?= base_url('tasks/submit_edit') ?>" method="post">

                <div class="form-group row mb-2">
                    <label for="Bezeichnung" class="col-sm-2 col-form-label">Bezeichnung:</label>
                    <div class="col-sm-10">
                        <input type="hidden" id="id" name="id" value="<?=isset($tasks['id']) ? $tasks['id'] : '' ?>">
                        <input type="text" class="form-control <?=(isset($error['tasks']))?'is-invalid':''?>"  id="tasks" name="tasks" placeholder="Bezeichnung des Tasks"
                               value="<?=isset($tasks['tasks']) ? $tasks['tasks'] : '' ?>" >
                        <div class="invalid-feedback">
                            <?=(isset($error['tasks'])) ?$error['tasks']:''?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="TaskartenID" class="col-sm-2 col-form-label">Taskart:</label>
                    <div class="col-sm-10">
                        <select name="taskartenid" class="form-select <?=(isset($error['taskartenid']))?'is-invalid':''?>" required>
                            <option value="">Taskart auswählen</option>
                            <option value="1" <?= (isset($tasks['taskartenid']) && $tasks['taskartenid'] == 1) ? 'selected' : '' ?>>Aufgabe</option>
                            <option value="2" <?= (isset($tasks['taskartenid']) && $tasks['taskartenid'] == 2) ? 'selected' : '' ?>>Bug</option>
                            <option value="3" <?= (isset($tasks['taskartenid']) && $tasks['taskartenid'] == 3) ? 'selected' : '' ?>>Idee</option>
                        </select>
                        <div class="invalid-feedback">
                            <?=(isset($error['taskartenid'])) ?$error['taskartenid']:''?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="PersonenID" class="col-sm-2 col-form-label">PersonenID:</label>
                    <div class="col-sm-10">
                        <input type="hidden" id="id" name="id" value="<?=isset($tasks['id']) ? $tasks['id'] : '' ?>">
                        <input type="text" class="form-control <?=(isset($error['personenid']))?'is-invalid':''?>"  id="personenid" name="personenid" placeholder="PersonenID"
                               value="<?=isset($tasks['personenid']) ? $tasks['personenid'] : '' ?>" >
                        <div class="invalid-feedback">
                            <?=(isset($error['personenid'])) ?$error['personenid']:''?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="SpaltenID" class="col-sm-2 col-form-label">Status (SpaltenID):</label>
                    <div class="col-sm-10">
                        <select name="spaltenid" class="form-select <?=(isset($error['spaltenid']))?'is-invalid':''?>" required>
                            <option value="1" <?= (isset($tasks['spaltenid']) && $tasks['spaltenid'] == 1) ? 'selected' : '' ?>>ToDo</option>
                            <option value="2" <?= (isset($tasks['spaltenid']) && $tasks['spaltenid'] == 2) ? 'selected' : '' ?>>In Bearbeitung</option>
                            <option value="3" <?= (isset($tasks['spaltenid']) && $tasks['spaltenid'] == 3) ? 'selected' : '' ?>>Erledigt</option>
                        </select>
                        <div class="invalid-feedback">
                            <?=(isset($error['spaltenid'])) ?$error['spaltenid']:''?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="Erinnerungsdatum" class="col-sm-2 col-form-label">Erinnerungsdatum:</label>
                    <div class="col-sm-10">
                        <input type="datetime-local"
                               name="erinnerungsdatum"
                               class="form-control <?=(isset($error['erinnerungsdatum']))?'is-invalid':''?>"
                               value="<?= isset($task['erinnerungsdatum']) ? date('Y-m-d\TH:i', strtotime($task['erinnerungsdatum'])) : '' ?>">
                        <div class="invalid-feedback">
                            <?=(isset($error['erinnerungsdatum'])) ?$error['erinnerungsdatum']:''?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="Erinnerung" class="col-sm-2 col-form-label">Erinnerung:</label>
                    <div class="col-sm-10">
                        <select name="erinnerung" class="form-select <?=(isset($error['erinnerung']))?'is-invalid':''?>">
                            <option value="0" <?= (isset($tasks['erinnerung']) && $tasks['erinnerung'] == 0) ? 'selected' : '' ?>>Nein</option>
                            <option value="1" <?= (isset($tasks['erinnerung']) && $tasks['erinnerung'] == 1) ? 'selected' : '' ?>>Ja</option>
                        </select>
                        <div class="invalid-feedback">
                            <?=(isset($error['erinnerung'])) ?$error['erinnerung']:''?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="Notizen" class="col-sm-2 col-form-label">Notizen:</label>
                    <div class="col-sm-10">
                        <input type="hidden" id="id" name="id" value="<?=isset($tasks['id']) ? $tasks['id'] : '' ?>">
                        <input type="text" class="form-control <?=(isset($error['notizen']))?'is-invalid':''?>"  id="notizen" name="notizen" placeholder=""
                               value="<?=isset($tasks['notizen']) ? $tasks['notizen'] : '' ?>" >
                        <div class="invalid-feedback">
                            <?=(isset($error['notizen'])) ?$error['notizen']:''?>
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

