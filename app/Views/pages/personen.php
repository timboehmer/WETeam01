<div class="container-fluid"><div class="container">
        <div class="card me-2 mt-4">
            <legend class="card-header">
                <div class="d-flex justify-content-between mt-2">
                    <div class="h5"><strong><h1>Personen-Tabelle</h1></strong></div>
                </div>
            </legend>
            <div class="card-body">

                <div id="toolbar" >
                    <a href="<?=base_url('/personen/index_edit')?>">
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
                        <th data-sortable="true">ID</th>
                        <th data-sortable="true">Vorname</th>
                        <th data-sortable="true">Name</th>
                        <th>Straße</th>
                        <th>PLZ</th>
                        <th>Ort</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($personen)): ?>
                        <?php foreach($personen as $person): ?>
                            <tr>
                                <td><?= $person['id'] ?></td>
                                <td><?= $person['vorname'] ?></td>
                                <td><?= $person['name'] ?></td>
                                <td><?= $person['strasse'] ?></td>
                                <td><?= $person['plz'] ?></td>
                                <td><?= $person['ort'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>