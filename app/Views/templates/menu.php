<nav class="navbar navbar-expand-lg">

    <div class="container-fluid">
        <div class="nav d-flex w-100 align-items-center">
            <a href="<?= base_url('/') ?>">
            <img src="<?= base_url('assets/images/navicon.svg') ?>" class="img-fluid" alt="Logo" width="200" height="50">
            </a>
            <ul class="nav nav-pills ms-auto d-flex flex-row">

                <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=  base_url('tasks')?>"><i class="bi bi-list-task"></i> Tasks</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=  base_url('boards')?>"><i class="bi bi-kanban"></i> Boards</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('spalten') ?>"><i class="bi bi-layout-three-columns"></i> Spalten</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-gear"></i></a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url('taskarten') ?>">
                            <i class="bi bi-lightbulb"></i> Taskarten
                        </a>
                        <a class="dropdown-item" href="<?= base_url('personen') ?>">
                            <i class="bi bi-people-fill"></i> Personen
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

