<!doctype html>
<html lang="en">


    <div class="card">

        <div class="card-header">Spalten</div>
        <div class="card-body p-2 mt-2">

        <a href="<?= base_url('spalten/createspalten') ?>" class="btn btn-primary active mb-2" role="button" aria-pressed="true">Erstellen</a>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Board</th>
                    <th>SortID</th>
                    <th>Spalte</th>
                    <th>Spaltenbeschreibung</th>
                    <th>Bearbeiten</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Allgemeine ToDos</td>
                    <td>100</td>
                    <td>Zu besprechen</td>
                    <td>Noch zu besprechende ToDos</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Allgemeine ToDos</td>
                    <td>200</td>
                    <td>In Bearbeitung</td>
                    <td>ToDos die aktuell bearbeitet werden</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>



