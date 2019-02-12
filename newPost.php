<?php
require __DIR__.'/views/header.php';
if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}
?>

<div class="backgroundImgOthers">

    <article>

        <form action="/app/posts/store.php" method="post" enctype="multipart/form-data">
            <h4 class="pb-3">Lägg till nyhet</h4>
            <div class="form-group">
                <label for="title">Titel</label>
                <input class="form-control" type="text" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Beskrivning</label>
                <textarea class="form-control" name="description" rows="8" cols="80" required></textarea>
            </div>
            <div class="form-group">
                <!-- File upload -->
                <input type="file" name="file" accept=".pdf, .png, .jpg, .gif">
            </div>
            <div class="form-group">
                <button type="submit" name="store" class="btn btnFirst mt-3">Lägg till</button>
                <button type="submit" name="cancel" class="btn btnFirst mt-3" formnovalidate>Ångra</button>
            </div>
        </form>

    </article>

</div>

<?php require __DIR__.'/views/footer.php'; ?>
