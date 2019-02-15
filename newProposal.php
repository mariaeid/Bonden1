<?php
require __DIR__.'/views/header.php';
if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}
?>

<div class="backgroundImgForms">
    <form action="/app/proposals/store.php" method="post" enctype="multipart/form-data">
        <h3 class="py-2 mt-5">Lägg till motion</h3>
        <div class="form-group col-md-7">
            <label for="title">Titel</label>
            <input class="form-control bodyText" type="text" name="title" required>
        </div>
        <div class="form-group col-md-7">
            <label for="description">Beskrivning</label>
            <textarea class="form-control bodyText" name="description" rows="8" cols="80" required></textarea>
        </div>
        <div class="form-group col-md-7">
            <label for="title">Inskickad av (frivilligt)</label>
            <input class="form-control bodyText" type="text" name="submittedBy">
        </div>
        <div class="form-group">
            <button type="submit" name="store" class="btn btnFirst mt-3 mx-3">Lägg till</button>
            <button type="submit" name="cancel" class="btn btnSecond mt-3" formnovalidate>Ångra</button>
        </div>
    </form>


<?php require __DIR__.'/views/footer.php'; ?>
