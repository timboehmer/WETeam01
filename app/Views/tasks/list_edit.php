<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4 px-2">

        <div class="d-flex align-items-center gap-3">
            <h1 class="mb-0"><i class="fa-solid fa-list-check"></i> <?= esc($title) ?></h1>

            <div class="dropdown">
                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="boardDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Board wechseln
                </button>
                <ul class="dropdown-menu" aria-labelledby="boardDropdown">
                    <?php if(!empty($boards)): ?>
                        <?php foreach($boards as $board): ?>
                            <li>
                                <a class="dropdown-item <?= ($board['id'] == $aktuellesBoardID) ? 'active' : '' ?>"
                                   href="<?= base_url('tasks') ?>?boardid=<?= $board['id'] ?>">
                                    <?= esc($board['board']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><span class="dropdown-item text-muted">Keine Boards vorhanden</span></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <a href="<?= base_url('tasks/ced_edit/0/0') ?>?boardid=<?= $aktuellesBoardID ?>" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Neu
        </a>
    </div>

    <div class="row flex-nowrap overflow-auto pb-4">

        <?php if (empty($spalten)): ?>
            <div class="col-12">
                <div class="alert alert-warning">
                    Es wurden keine Spalten gefunden.
                </div>
            </div>
        <?php else: ?>

            <?php foreach ($spalten as $spalte): ?>

                <div class="col" style="min-width: 350px;">

                    <div class="card bg-light">

                        <div class="card-header fw-bold text-center">
                            <?= esc($spalte['spalte']) ?>
                            <?php if(!empty($spalte['spaltenbeschreibung'])): ?>
                                <div class="card-subtitle text-muted small">
                                    <?= esc($spalte['spaltenbeschreibung']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body d-flex flex-column">

                            <?php foreach ($tasks as $task): ?>
                                <?php if ($task['spaltenid'] == $spalte['id']): ?>

                                    <div class="card shadow-sm mb-3">
                                        <div class="card-body p-3">

                                            <div class="d-flex justify-content-between align-items-start">
                                                <h5 class="card-title fw-bold mb-1">
                                                    <i class="fa-solid <?= $task['taskartenicon'] ?>"></i> <?= esc($task['tasks']) ?>
                                                </h5>

                                                <div class="dropdown">
                                                    <button class="btn btn-link btn-sm text-muted p-0" type="button" data-bs-toggle="dropdown">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item" href="<?= base_url('tasks/ced_edit/' . $task['id'] . '/1') ?>">
                                                                <i class="fa-solid fa-pen text-primary me-2"></i> Bearbeiten
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-danger" href="<?= base_url('tasks/ced_edit/' . $task['id'] . '/2') ?>">
                                                                <i class="fa-solid fa-trash me-2"></i> Löschen
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <p class="card-text text-muted small mb-3">
                                                <?= esc($task['notizen']) ?>
                                            </p>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-secondary">
                                                    <i class="fa-regular fa-calendar-days me-1"></i>
                                                    <?= date('d.m.Y', strtotime($task['erstelldatum'])) ?>
                                                </small>

                                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                                     style="width: 30px; height: 30px; font-size: 12px;"
                                                     title="Person ID: <?= $task['personenid'] ?>">
                                                    <?= $task['personenid'] ?>
                                                </div>
                                            </div>

                                            <?php if ($task['erinnerung'] == 1): ?>
                                                <div class="mt-2 text-danger small">
                                                    <i class="fa-solid fa-bell"></i> <?= date('d.m.Y H:i', strtotime($task['erinnerungsdatum'])) ?>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <div class="mt-auto pt-3">
                                <a href="<?= base_url('tasks/ced_edit/0/0/' . $spalte['id']) ?>"
                                   class="btn btn-outline-secondary w-100">
                                    <i class="fa-solid fa-plus"></i> Task hinzufügen
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>

    </div>
</div>