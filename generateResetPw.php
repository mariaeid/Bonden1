<?php
require __DIR__.'/views/header.php';
?>

    <div class="backgroundImgForms">
        <form action="/app/auth/generateResetPw.php" method="post">
            <h3 class="py-2 mt-5">Återställ lösenord</h3>
            <!-- Showing error message if the form has been submitted with errors -->
            <?php if (isset($_SESSION['error'])): ?>
                <p class="alert alert-danger col-md-6"><?php echo $_SESSION['error']; unset($_SESSION['error']);?></p>
            <?php endif; ?>

            <div class="form-group">
                <label for="email">Mail</label>
                <!-- If a user has submitted the form with errors, the data previously entered is shown in the value of the field -->
                <input class="form-control col-md-6" type="email" name="email" required value=
                    <?php if (isset($_SESSION['emailSave'])):?>
                        "<?php echo $_SESSION['emailSave']?>"
                        <?php unset($_SESSION['emailSave']);?>
                    <?php endif; ?>>
            </div><!-- /form-group -->
            <button type="submit" class="btn btnFirst mr-3" name="reset">Återställ lösenord</button>
            <button type="submit" class="btn btnSecond" name="cancel" formnovalidate>Ångra</button>
        </form>

<?php require __DIR__.'/views/footer.php'; ?>
