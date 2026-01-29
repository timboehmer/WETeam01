
<div class="container">
    <div class="card mt-4">
        <legend class="card-header">
            <div class="d-flex justify-content-between mt-2">
                <div class="h5"><strong><h1><i class="bi bi-kanban"></i> <?= $title; ?></h1></strong></div>
                <div class="h5"><strong></strong></div>
            </div>
        </legend>
        <div class="card-body">

            <div id="toolbar" >
                <a href="<?=base_url('/boards/ced_edit/0/0/')?>">
                    <button class="btn btn-primary mb-2" type="button" name="btnNeu" id="btnNeu">
                        <i class="bi bi-plus-lg"></i> Neues Board erstellen</button>
                </a>
            </div>

            <table class="table table-responsive table-bordered table-striped table-hover w-100"
                   data-show-columns="true"
                   data-show-toggle="true"
                   data-toggle="table"
                   data-search="true"
                   data-sort-stable="true"
                   data-toolbar="#toolbar">
                <thead>
                <tr>
                    <th data-field="id" data-sortable="true">BoardID</th>
                    <th data-field="boardsid">Bezeichnung</th>
                    <th data-fied="action">Bearbeiten</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach( $boards as $item ): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['board'] ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?=base_url('/boards/ced_edit/' . $item['id'] . '/1/')?>">
                                    <button type='button' name='btnBearbeiten' id='btnBearbeiten' class='btn'><i style="color: Dodgerblue;" class="fas fa-edit"></i></button>
                                </a>
                                <a href="<?=base_url('/boards/ced_edit/' . $item['id'] . '/2/')?>">
                                    <button type='submit' name='btnLoeschen' id='btnLoeschen' class='btn'><i style="color: Dodgerblue;" class="fas fa-trash"></i></button>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>