<!doctype html>
<html lang="en">

<main>
    <form>
    <div class="card">

        <div class="card-header">Spalten erstellen</div>
        <div class="card-body p-2">
            <div class="form-group row p-2">
                <label for="Spalten-Bezeichnung" class="col-sm-2 col-form-label">Spalten-Bezeichnung</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="spaltenBez" placeholder="Bezeichnung eingeben">
                </div>
            </div>
            <div class="form-group row p-2">
                <label for="Spaltenbeschreibung" class="col-sm-2 col-form-label">Spaltenbeschreibung</label>
                <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row p-2">
                <label for="SortID" class="col-sm-2 col-form-label">SortID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="spaltenBez" placeholder="SortID eingeben">
                </div>
            </div>
            <div class="form-group row p-2">
                <label for="BoardSelect" class="col-sm-2 col-form-label">Board auswählen</label>
                <div class="col-sm-10">
                <select class="form-group" id="BoardID">
                    <option>Allgemeine ToDos</option>
                    <option>ToDos die aktuell bearbeitet werden</option>
                </select>
                </div>
            </div>
            <div class="form-group row p-2 mt-4">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Speichern</button>
                    <button type="button" class="btn btn-secondary">Abbrechen</button>
                </div>

        </div>
    </div>
    </form>
</main>

</html>


