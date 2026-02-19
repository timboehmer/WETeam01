<div class="container py-4">

    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-success"><i class="bi bi-speedometer2"></i> Dashboard</h1>
        <p class="lead text-muted">Team 01, Webentwicklung 2025/26</p>
        <hr class="w-25 mx-auto">
    </div>

    <div class="dashboard-cards">

        <p class="section-label"><i class="bi bi-grid-3x3-gap me-1"></i> Hauptbereiche</p>

        <div class="row g-4 mb-5">
            <div class="col-12 col-md-4">
                <a href="<?= base_url('tasks') ?>" class="dash-card card-tasks">
                    <div class="dash-icon"><i class="fa-solid fa-list-check"></i></div>
                    <h3>Tasks</h3>
                    <p class="dash-desc">Taskboard mit Drag & Drop</p>
                    <span class="dash-btn">Tasks öffnen <i class="bi bi-arrow-right ms-1"></i></span>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="<?= base_url('boards') ?>" class="dash-card card-boards">
                    <div class="dash-icon"><i class="bi bi-kanban"></i></div>
                    <h3>Boards</h3>
                    <p class="dash-desc">Projektboards erstellen & verwalten</p>
                    <span class="dash-btn">Boards öffnen <i class="bi bi-arrow-right ms-1"></i></span>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="<?= base_url('spalten') ?>" class="dash-card card-spalten">
                    <div class="dash-icon"><i class="bi bi-layout-three-columns"></i></div>
                    <h3>Spalten</h3>
                    <p class="dash-desc">Board-Spalten konfigurieren</p>
                    <span class="dash-btn">Spalten öffnen <i class="bi bi-arrow-right ms-1"></i></span>
                </a>
            </div>
        </div>

        <p class="section-label anim-delay-1"><i class="bi bi-gear me-1"></i> Verwaltung</p>

        <div class="row g-4 mb-4">
            <div class="col-12 col-md-6">
                <a href="<?= base_url('personen') ?>" class="dash-card card-personen anim-delay-1">
                    <div class="dash-icon"><i class="fa-solid fa-users"></i></div>
                    <h3>Personen</h3>
                    <p class="dash-desc">Teammitglieder verwalten & zuweisen</p>
                    <span class="dash-btn">Personen öffnen <i class="bi bi-arrow-right ms-1"></i></span>
                </a>
            </div>
            <div class="col-12 col-md-6">
                <a href="<?= base_url('taskarten') ?>" class="dash-card card-taskarten anim-delay-2">
                    <div class="dash-icon"><i class="fa-solid fa-lightbulb"></i></div>
                    <h3>Taskarten</h3>
                    <p class="dash-desc">Bug, Feature, Idee & mehr definieren</p>
                    <span class="dash-btn">Taskarten öffnen <i class="bi bi-arrow-right ms-1"></i></span>
                </a>
            </div>
        </div>

    </div>
</div>
