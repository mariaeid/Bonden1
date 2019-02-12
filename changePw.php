<?php
require __DIR__.'/views/header.php';
if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}

?>

<div class="backgroundImgOthers">
    <article>
        <h1 class="mb-3">Byt lösenord</h1>

        <form action="/app/auth/editPw.php" method="post">

            <!-- Displaying error messages if there were any when the form was submitted -->
            <div class="form-group col-sm-5">
                <?php if (isset($_SESSION['error'])): ?>
                    <p class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']);?></p>
                <?php endif; ?>
            </div><!-- /form-group -->

            <div class="form-group col-sm-5">
                <label for="currentPassword">Nuvarande lösenord</label>
                <input class="form-control" type="password" name="currentPassword" required>
            </div><!-- /form-group -->

            <div class="form-group col-sm-5">
                <label for="newPassword">Nytt lösenord</label>
                <input class="form-control" type="password" name="newPassword" required>
            </div><!-- /form-group -->

            <div class="form-group col-sm-5">
                <label for="confirmPassword">Bekräfta nytt lösenord</label>
                <input class="form-control" type="password" name="confirmPassword" required>
            </div><!-- /form-group -->

            <button type="submit" name="editPw" class="btn btnFirst mx-3">Spara</button>
            <button type="submit" name="cancel" class="btn btnFirst" formnovalidate>Ångra</button>

        </form>

    </article>

<?php require __DIR__.'/views/footer.php'; ?>
