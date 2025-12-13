<div class="container-fluid"><div class="container">
        <div class="card me-2 mt-4">
            <legend class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="h5"><strong><h1>Dynamische Personen-Tabelle</h1></strong></div>
                    <div class="h5"><strong></strong></div>
                </div>
            </legend>
            <div class="card-body">

                <div id="toolbar" class="btn-group mt-2 ms-2">
                    <a href="#"><button class="btn btn-primary mb-2" type="button" value="button">Toolbar</button></a>
                </div>

                <table class="table table-responsive table-striped table-hover d-table"
                       data-show-columns="true"
                       showColumnsToggleAll="true"
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
                        <th class="text-end">Bearbeiten</th>
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
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('/personen/ced_edit/' . $person['id'] . '/1/')?>">
                                            <button type='button' name='btnBearbeiten' id='btnBearbeiten' class='btn'><i class="fas fa-edit text-primary"></i></button>
                                        </a>
                                        <a href="<?= base_url()?>/personen/ced_edit/<?= $person['id'] ?>/2/">
                                            <button type='submit' name='btnLoeschen' id='btnLoeschen' class='btn'><i style="color: Dodgerblue;" class="fas fa-trash"></i></button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>