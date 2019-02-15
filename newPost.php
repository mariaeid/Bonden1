<?php
require __DIR__.'/views/header.php';
if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}
?>

<div class="backgroundImgForms">
    <form action="/app/posts/store.php" method="post" enctype="multipart/form-data">
        <h3 class="py-2 mt-5" >Lägg till nyhet</h3>
        <div class="form-group col-md-7">
            <label for="title">Titel</label>
            <input class="form-control bodyText" type="text" name="title" required>
        </div>
        <div class="form-group col-md-7">
            <label for="description">Beskrivning</label>
            <textarea class="form-control bodyText" name="description" rows="8" cols="80" required></textarea>
        </div>
        <div class="form-group col-md-7">
            <!-- File upload -->
            <input type="file" name="file" accept=".pdf, .png, .jpg, .gif">
        </div>
        <div class="form-group col-md-7">
            <button type="submit" name="store" class="btn btnFirst mr-3">Lägg till</button>
            <button type="submit" name="cancel" class="btn btnSecond" formnovalidate>Ångra</button>
        </div>
    </form>

<?php require __DIR__.'/views/footer.php'; ?>
