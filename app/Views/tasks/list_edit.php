
<div class="container">
    <div class="card mt-4">
        <legend class="card-header">
            <div class="d-flex justify-content-between mt-2">
                <div class="h5"><strong><h1><?= $title; ?></h1></strong></div>
                <div class="h5"><strong></strong></div>
            </div>
        </legend>
        <div class="card-body">

            <div id="toolbar" >
                <a href="<?=base_url('/tasks/ced_edit/0/0/')?>">
                    <button class="btn btn-primary mb-2" type="button" name="btnNeu" id="btnNeu">
                        <i class="fas fa-plus-square"></i> Neu</button>
                </a>
            </div>

            <table class="table table-responsive table-bordered table-striped table-hover w-100 d-block d-md-table"
                   data-show-columns="true"
                   data-show-toggle="true"
                   data-toggle="table"
                   data-search="true"
                   data-sort-stable="true"
                   data-toolbar="#toolbar">

                <thead align="left">
                <tr>
                    <th data-field="id" data-sortable="true">TaskID</th>
                    <th data-field="bezeichnung">Bezeichnung</th>
                    <th data-field="person" data-sortable="true">PersonenID</th>
                    <th data-field="status" data-sortable="true">Status</th>
                    <th data-field="datum" data-sortable="true">Erinnerungsdatum</th>
                    <th data-field="erinnerung">Erinnerung</th>
                    <th data-field="notizen">Notizen</th>
                    <th data-field="action">Aktion</th>
                </tr>
                </thead>
                <tbody>
                <? foreach( $tasks as $item ): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['tasks'] ?></td>
                        <td><?= $item['personenid'] ?></td>
                        <td>
                            <?php
                            switch($item['spaltenid']) {
                                case 1: echo "ToDo"; break;
                                case 2: echo "In Bearbeitung"; break;
                                case 3: echo "Erledigt"; break;
                                default: echo "Unbekannt (" . $item['spaltenid'] . ")";
                            }
                            ?>
                        </td>
                        <td><?= $item['erinnerungsdatum'] ?></td>
                        <td>
                            <?= $item['erinnerung'] == 1 ? '<span>Ja</span>' : 'Nein' ?>
                        </td>
                        <td><?= $item['notizen']?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?=base_url('/tasks/ced_edit/' . $item['id'] . '/1/')?>">
                                    <button type='button' name='btnBearbeiten' id='btnBearbeiten' class='btn'><i style="color: Dodgerblue;" class="fas fa-edit"></i></button>
                                </a>
                                <a href="<?=base_url('/tasks/ced_edit/' . $item['id'] . '/2/')?>">
                                    <button type='submit' name='btnLoeschen' id='btnLoeschen' class='btn'><i style="color: Dodgerblue;" class="fas fa-trash"></i></button>
                                </a>
                            </div>
                        </td>
                    </tr>
                <? endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>