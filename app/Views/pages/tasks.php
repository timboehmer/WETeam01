<div class="container-fluid"><div class="container">
        <div class="card me-2 mt-4">
            <legend class="card-header">
                <div class="d-flex justify-content-between mt-2">
                    <div class="h5"><strong><h1><i class="fa-solid fa-clipboard-list"></i> Tasks</h1></strong></div>
                </div>
            </legend>
            <div class="card-body">

                <div id="toolbar" >
                    <a href="<?=base_url('/tasks/index_edit/')?>">
                        <button class="btn btn-primary mb-2" type="button" name="btnNeu" id="btnNeu">
                            <i class="fa-solid fa-file-pen"></i> Bearbeiten</button>
                    </a>
                </div>

                <table class="table table-responsive table-bordered table-striped table-hover w-100 d-block d-md-table"
                       data-show-columns="true"
                       data-show-toggle="true"
                       data-toggle="table"
                       data-search="true"
                       data-sort-stable="true"
                       data-toolbar="#toolbar">

                    <thead>
                    <tr>
                        <th data-sortable="true">TaskID</th>
                        <th>Bezeichnung</th>
                        <th data-sortable="true">Erinnerungsdatum</th>
                        <th>Notizen</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($tasks)): ?>
                        <?php foreach($tasks as $task): ?>
                            <tr>
                                <td><?= $task['id'] ?></td>
                                <td><?= $task['tasks'] ?></td>
                                <td><?= $task['erinnerungsdatum'] ?></td>
                                <td><?= $task['notizen']?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>