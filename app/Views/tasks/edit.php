<div class="container">
    <div class="card bg-light mt-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="h5"><strong>Task <?= isset($_POST['btnLoeschen']) ? ' löschen' : ' bearbeiten oder neu erstellen'?></strong></div>
                <div class="h5"><strong></strong></div>
            </div>
        </div>
        <div class="card-body">

            <form action="<?= base_url('tasks/submit_edit') ?>" method="post">
                <input type="hidden" name="id" value="<?= isset($tasks['id']) ? $tasks['id'] : '' ?>">
                <input type="hidden" name="boardid" value="<?= $boardid ?? '' ?>">

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
                    <label for="taskartenid" class="col-sm-2 col-form-label">Taskart:</label>
                    <div class="col-sm-10">
                        <select name="taskartenid" class="form-select <?= ($error['taskartenid'] ?? '') ? 'is-invalid' : '' ?>">
                            <option value="">Taskart auswählen</option>

                            <?php foreach($taskarten as $art): ?>
                                <option value="<?= $art['id'] ?>" <?= ($tasks['taskartenid'] ?? '') == $art['id'] ? 'selected' : '' ?>>
                                    <?= esc($art['taskart']) ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                        <div class="invalid-feedback">
                            <?= $error['taskartenid'] ?? '' ?>
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
                    <label for="spaltenid" class="col-sm-2 col-form-label">Status (Spalte):</label>
                    <div class="col-sm-10">
                        <select name="spaltenid" class="form-select <?= ($error['spaltenid'] ?? '') ? 'is-invalid' : '' ?>">

                            <?php
                            $selectedId = $tasks['spaltenid'] ?? $spaltenid ?? '';
                            ?>

                            <?php foreach($spalten as $spalte): ?>
                                <option value="<?= $spalte['id'] ?>" <?= $selectedId == $spalte['id'] ? 'selected' : '' ?>>
                                    <?= esc($spalte['spalte']) ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                        <div class="invalid-feedback">
                            <?= $error['spaltenid'] ?? '' ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="Erinnerung" class="col-sm-2 col-form-label">Erinnerung:</label>
                    <div class="col-sm-10">
                        <select name="erinnerung" id="erinnerung_select" class="form-select <?=(isset($error['erinnerung']))?'is-invalid':''?>">
                            <option value="0" <?= (isset($tasks['erinnerung']) && $tasks['erinnerung'] == 0) ? 'selected' : '' ?>>Nein</option>
                            <option value="1" <?= (isset($tasks['erinnerung']) && $tasks['erinnerung'] == 1) ? 'selected' : '' ?>>Ja</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-2" id="reminder_row" style="display: none;">
                    <label for="Erinnerungsdatum" class="col-sm-2 col-form-label">Erinnerungsdatum:</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" name="erinnerungsdatum" class="form-control <?=(isset($error['erinnerungsdatum']))?'is-invalid':''?>"
                               value="<?= (isset($tasks['erinnerungsdatum']) && $tasks['erinnerungsdatum'] != '') ? date('Y-m-d\TH:i', strtotime($tasks['erinnerungsdatum'])) : '' ?>">
                        <div class="invalid-feedback">
                            <?=(isset($error['erinnerungsdatum'])) ?$error['erinnerungsdatum']:''?>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const reminderSelect = document.getElementById('erinnerung_select');
        const reminderRow = document.getElementById('reminder_row');

        function toggleDateFields() {
            if (reminderSelect.value == "1") {
                reminderRow.style.display = "flex";
            } else {
                reminderRow.style.display = "none";
            }
        }

        toggleDateFields();

        reminderSelect.addEventListener('change', toggleDateFields);
    });
</script>

