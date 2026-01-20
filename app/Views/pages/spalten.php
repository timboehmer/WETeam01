<div class="container-fluid"><div class="container">
        <div class="card me-2 mt-4">
            <legend class="card-header">
                <div class="d-flex justify-content-between mt-2">
                    <div class="h5"><strong><h1><i class="fa-solid fa-clipboard-list"></i> Spalten</h1></strong></div>
                </div>
            </legend>
            <div class="card-body">

                <div id="toolbar" >
                    <a href="<?=base_url('/spalten/index_edit/')?>">
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
                        <th data-sortable="true">SpaltenID</th>
                        <th>Board</th>
                        <th data-sortable="true">SortID</th>
                        <th>Spalte</th>
                        <th>Spaltenbezeichnung</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($spalten)): ?>
                        <?php foreach($spalten as $spalte): ?>
                            <tr>
                                <td><?= $spalte['id'] ?></td>
                                <td><?= $spalte['boardsid'] ?></td>
                                <td><?= $spalte['sortid'] ?></td>
                                <td><?= $spalte['spalte']?></td>
                                <td><?= $spalte['spaltenbeschreibung']?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>