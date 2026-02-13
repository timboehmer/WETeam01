<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4 px-2">
        <div class="d-flex align-items-center gap-3">
            <h1 class="display-5 fw-bold text-success"><i class="bi bi-list-task"></i>
                <?= esc($title)?>
            </h1>
            <br>
            <div class="dropdown">
                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="boardDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-arrow-down-up"></i> Board wechseln
                </button>
                <ul class="dropdown-menu" aria-labelledby="boardDropdown">
                    <?php if (!empty($boards)): ?>
                    <?php foreach ($boards as $board): ?>
                    <li>
                        <a class="dropdown-item <?=($board['id'] == $aktuelleBoardID) ? 'active' : ''?>"
                            href="<?= base_url('tasks')?>?boardid=<?= $board['id']?>">
                            <?= esc($board['board'])?>
                        </a>
                    </li>
                    <?php
    endforeach; ?>
                    <?php
else: ?>
                    <li><span class="dropdown-item text-muted">Keine Boards vorhanden</span></li>
                    <?php
endif; ?>
                </ul>
            </div>
        </div>

        <div class="d-flex gap-2">
            <input type="text" id="suchetasks" class="form-control" placeholder="Tasks durchsuchen...">

            <a href="<?= base_url('tasks/ced_edit/0/0')?>?boardid=<?= $aktuelleBoardID?>"
                class="btn btn-primary text-nowrap">
                <i class="fa-solid fa-plus"></i> Neuer Task
            </a>
        </div>
    </div>

    <div class="row flex-nowrap overflow-auto pb-4">

        <?php if (empty($spalten)): ?>
        <div class="col-12">
            <div class="alert alert-warning">Es wurden keine Spalten gefunden.</div>
        </div>
        <?php
else: ?>

        <?php foreach ($spalten as $spalte): ?>
        <div class="col" style="min-width: 350px;">
            <div class="card bg-light h-100">
                <div class="card-header fw-bold text-center">
                    <?= esc($spalte['spalte'])?>
                    <?php if (!empty($spalte['spaltenbeschreibung'])): ?>
                    <div class="card-subtitle text-muted small">
                        <?= esc($spalte['spaltenbeschreibung'])?>
                    </div>
                    <?php
        endif; ?>
                </div>

                <div class="card-body d-flex flex-column dragula-container" spaltenid="<?= $spalte['id']?>">

                    <?php foreach ($tasks as $task): ?>
                    <?php if ($task['spaltenid'] == $spalte['id']): ?>

                    <div class="card shadow-sm mb-3 taskkarte" tasksid="<?= $task['id']?>" sortid="<?= $task['id']?>"
                        suchtext="<?= strtolower(esc($task['tasks']) . ' ' . esc($task['notizen']) . ' ' . esc($task['vorname'] ?? '') . ' ' . esc($task['name'] ?? ''))?>">

                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <h5 class="card-title fw-bold mb-1">
                                    <i class="fa-solid <?= $task['taskartenicon']?>"></i>
                                    <?= esc($task['tasks'])?>
                                </h5>
                                <div class="dropdown">
                                    <button class="btn btn-link btn-sm text-muted p-0" type="button"
                                        data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item"
                                                href="<?= base_url('tasks/ced_edit/' . $task['id'] . '/1')?>">
                                                <i class="bi bi-pencil-square me-2"></i> Bearbeiten
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger"
                                                href="<?= base_url('tasks/ced_edit/' . $task['id'] . '/2')?>">
                                                <i class="bi bi-trash me-2"></i> Löschen
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <p class="card-text text-muted small mb-3">
                                <?= esc($task['notizen'])?>
                            </p>

                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-secondary">
                                    <i class="fa-regular fa-calendar-days me-1"></i>
                                    <?= date('d.m.Y', strtotime($task['erstelldatum']))?>
                                </small>

                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 30px; height: 30px; font-size: 12px;"
                                    title="<?= esc($task['vorname'] ?? '') . ' ' . esc($task['name'] ?? '')?>">
                                    <?= $task['kuerzel'] ?? $task['personenid']?>
                                </div>
                            </div>

                            <?php if ($task['erinnerung'] == 1): ?>
                            <div class="mt-2 text-danger small">
                                <i class="fa-solid fa-bell"></i>
                                <?= date('d.m.Y H:i', strtotime($task['erinnerungsdatum']))?>
                            </div>
                            <?php
                endif; ?>
                        </div>
                    </div>
                    <?php
            endif; ?>
                    <?php
        endforeach; ?>

                </div>

                <div class="card-footer bg-transparent border-top-0">
                    <a href="<?= base_url('tasks/ced_edit/0/0/' . $spalte['id'])?>"
                        class="btn btn-outline-secondary w-100">
                        <i class="fa-solid fa-plus"></i> Task hinzufügen
                    </a>
                </div>
            </div>
        </div>
        <?php
    endforeach; ?>

        <?php
endif; ?>

    </div>
</div>

<script>
    const baseurl = "<?= base_url()?>";

    var update = true;

    $(document).ready(function () {
        onSucheChange();

        // Dragula Initialisierung
        let drake = dragula({
            isContainer: function (el) {
                return el.classList.contains('dragula-container');
            },
            moves: function (el, source, handle, sibling) {
                return true;
            },
            accepts: function (el, target, source, sibling) {
                return true;
            },
            invalid: function (el, handle) {
                return false;
            },
            direction: 'vertical',
            copy: false,
            copySortSource: false,
            revertOnSpill: false,
            removeOnSpill: false,
            mirrorContainer: document.body,
            ignoreInputTextSelection: true,
            slideFactorX: 0,
            slideFactorY: 0,
        });

        drake.on('drag',  function (el, target, source, sibling) {
            update = false;
        });

        drake.on('drop' , function (el, target, source, sibling) {
            update = true;

            let sortId = (sibling) ? sibling.getAttribute("sortid") : 0;

            updateTaskBoard(
                el.getAttribute("tasksid"),
                source.getAttribute("spaltenid"),
                target.getAttribute("spaltenid"),
                sortId
            );
        });
    });

    function updateTaskBoard(tasksid = 0, sourcespaltenid = 0, targetspaltenid = 0, taskssortid = 0) {
        $.ajax({
            url: baseurl + '/tasks/submittaskboard',
            method: 'post',
            data: {
                tasksid: tasksid,
                sourcespaltenid: sourcespaltenid,
                targetspaltenid: targetspaltenid,
                taskssortid: taskssortid
            },
            dataType: 'json',
            success: function (response) {
                console.log("Task verschoben");
            },
            error: function (xhr) {
                 if (typeof bootbox !==  'undefined') {
                    bootbox.alert("<span class='red'>Achtung:</span> Es ist ein Serverfehler aufgetreten: " + xhr.status + " " + xhr.statusText + "!");
                } else {
                    alert("Achtung: Serverfehler " + xhr.status);
                }
            }
        });
    }

    function onSucheChange() {
        var timeout = null;

        function handleInputChange() {
            Suche();
        }
        document.getElementById('suchetasks').addEventListener('inp ut', function () {
            clearTimeout(timeout);
            timeout = setTimeout(handleInputChange, 500);
        });
    }

    function Suche() {
        var zusuchen = $('#suchetasks').val();
        var elemente = document.getElementsByClassName('taskkarte');

        if (zusuchen == '') update = true;
        else update = false;

        for (var i = 0; i < elemente.length; i++) {
            elemente[i].style.display = '';

            if (zusuchen != '') {
                if (elemente[i].getAttribute('suchtext').toLowerCase().indexOf(zusuchen.toLowerCase()) === -1) {
                    elemente[i].style.display = 'none';
                }
            }
     }
</script>