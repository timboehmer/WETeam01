<style>
    .hover-card {
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,.125);
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        border-color: darkgrey;
    }
    .icon-large {
        font-size: 3rem;
        margin-bottom: 1rem;
    }
    .card-actions {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 10;
    }
</style>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-5">
        <div class="text-start">
            <h1 class="display-5 fw-bold text-success"><i class="bi bi-lightbulb-fill"></i> <?= esc($title); ?></h1>
            <p class="lead text-muted">Verwaltung der Taskarten</p>
        </div>

        <a href="<?=base_url('/taskarten/ced_edit/0/0/')?>" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-lg"></i> Neue Taskart erstellen
        </a>
    </div>

    <div class="row g-4">

        <?php if(empty($taskarten)): ?>
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Keine Taskarten gefunden.
                </div>
            </div>
        <?php else: ?>

            <?php foreach($taskarten as $item): ?>
                <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm hover-card text-center position-relative">

                        <div class="dropdown card-actions">
                            <button class="btn btn-link text-secondary p-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="<?=base_url('/taskarten/ced_edit/' . $item['id'] . '/1/')?>">
                                        <i class="bi bi-pencil-square me-2 text-primary"></i> Bearbeiten
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="<?=base_url('/taskarten/ced_edit/' . $item['id'] . '/2/')?>">
                                        <i class="bi bi-trash me-2"></i> Löschen
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-center align-items-center p-3">

                            <i class="fa <?=$item['taskartenicon']?> icon-large"></i>

                            <h3 class="card-title text-truncate w-100 border-0 pb-0" style="font-size: 1.75rem" title="<?= esc($item['taskart']) ?>">
                                <?= esc($item['taskart']) ?>
                            </h3>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>

    </div>
</div>