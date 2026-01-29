<!doctype html>
<html lang="en" class="h-100">

<style>
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        transition: all 0.3s ease;
        border-color: #0d6efd;
    }
    .icon-large {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #0d6efd;
    }
</style>

<main>
    <div class="container py-5">

        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-success">Team 01</h1>
            <p class="lead text-muted">Projekt Webentwicklung 2025/26</p>
            <hr class="w-25 mx-auto">
        </div>

        <div class="row g-4"> <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm hover-card text-center">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                        <i class="fa-solid fa-users icon-large"></i>
                        <h3 class="card-title">Übung 04</h3>
                        <p class="card-text text-muted">Verwaltung der Personen-Tabelle</p>
                        <a href="<?= base_url('personen') ?>" class="btn btn-primary mt-3 stretched-link">
                            Personen öffnen
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm hover-card text-center">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                        <i class="fa-solid fa-list-check icon-large"></i>
                        <h3 class="card-title">Übung 05 & 07</h3>
                        <p class="card-text text-muted">Taskboard Ansicht & Verwaltung</p>
                        <a href="<?= base_url('tasks') ?>" class="btn btn-primary mt-3 stretched-link">
                            Tasks öffnen
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm hover-card text-center">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                        <i class="fa-solid fa-table-columns icon-large"></i>
                        <h3 class="card-title">Übung 06</h3>
                        <p class="card-text text-muted">Bearbeitung der Board-Spalten</p>
                        <a href="<?= base_url('spalten') ?>" class="btn btn-primary mt-3 stretched-link">
                            Spalten öffnen
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

</html>