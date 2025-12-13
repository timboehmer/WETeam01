<nav class="navbar navbar-expand-lg">

    <div class="container-fluid">
        <div class="nav d-flex w-100 align-items-center">
            <a href="<?= base_url('/') ?>">
            <img src="<?= base_url('assets/images/navicon.svg') ?>" class="img-fluid" alt="Logo" width="200" height="50">
            </a>
            <ul class="nav nav-pills ms-auto d-flex flex-row">

                <li class="nav-item"><a class="nav-link" href="<?=  base_url('tasks')?>"><i class="fa-solid fa-clipboard-list"></i> Tasks</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=  base_url('boards')?>"><i class="fa-solid fa-clipboard"></i> Boards</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('spalten') ?>"><i class="fa-solid fa-table-columns"></i> Spalten</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-gear"></i></a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">
                            In Arbeit
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

