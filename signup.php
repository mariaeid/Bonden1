<?php
require __DIR__.'/views/header.php';
?>

<div class="backgroundImgForms">
    <form action="/app/auth/add.php" method="post">
        <h1 class="py-2 mt-5">Skapa konto</h1>
        <div class="form-group col-md-6">
            <?php if (isset($_SESSION['error'])): ?>
                <p class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']);?></p>
            <?php endif; ?>
        </div><!-- /form-group -->

        <div class="form-group">
            <div class="col-md-6">
                <label for="name">Namn</label>
                <input class="form-control" type="name" name="name" required value=
                <?php if (isset($_SESSION['save']['nameSave'])):?>
                    "<?php echo $_SESSION['save']['nameSave']?>"
                    <?php unset($_SESSION['save']['nameSave']);?>
                <?php endif; ?>>
                <small class="form-text">Ange för- och efternamn</small>
            </div>
        </div><!-- /form-group -->

        <div class="form-group">
            <div class="col-md-6">
                <label for="cohabitant">Namn på ev. sambo/make/maka</label>
                <input class="form-control" type="cohabitant" name="cohabitant" value=
                <?php if (isset($_SESSION['save']['cohabitantSave'])):?>
                    "<?php echo $_SESSION['save']['cohabitantSave']?>"
                    <?php unset($_SESSION['save']['cohabitantSave']);?>
                <?php endif; ?>>
                <small class="form-text">Ange för- och efternamn</small>
            </div>
        </div><!-- /form-group -->

        <div class="form-group">
            <div class="col-md-6">
                <label for="email">Mail</label>
                <input class="form-control" type="email" name="email" required value=
                <?php if (isset($_SESSION['save']['emailSave'])):?>
                    "<?php echo $_SESSION['save']['emailSave']?>"
                    <?php unset($_SESSION['save']['emailSave']);?>
                <?php endif; ?>>
            </div>
        </div><!-- /form-group -->

        <div class="form-group">
            <div class="col-md-6">
                <label for="phone">Telefon</label>
                <input class="form-control" type="tel" name="phone" required value=
                <?php if (isset($_SESSION['save']['phoneSave'])):?>
                    "<?php echo $_SESSION['save']['phoneSave']?>"
                    <?php unset($_SESSION['save']['phoneSave']);?>
                <?php endif; ?>>
            </div>
        </div><!-- /form-group -->

        <div class="form-group">
            <div class="form-group col-md-6">
                <label for="street">Gata</label>
                <select class="form-control" name="street" required>
                    <option selected></option>
                    <option value="Hultebackavägen">Hultebackavägen</option>
                    <option value="Torparegatan">Torparegatan</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="street_no">Nummer</label>
                <input class="form-control" type="number" name="street_no" min="1" max="999" required value=
                    <?php if (isset($_SESSION['save']['street_noSave'])):?>
                        "<?php echo $_SESSION['save']['street_noSave']?>"
                        <?php unset($_SESSION['save']['street_noSave']);?>
                    <?php endif; ?>>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6">
                <label for="password">Lösenord</label>
                <input class="form-control" type="password" name="password" required>
            </div>
        </div><!-- /form-group -->

        <div class="form-group">
            <div class="col-md-6">
                <label for="confirmPassword">Bekräfta lösenord</label>
                <input class="form-control" type="password" name="confirmPassword" required>
            </div>
        </div><!-- /form-group -->

        <div class="form-check ml-5 my-3">
            <input type="checkbox" class="form-check-input" required>
            <label class="form-check-label">Jag har läst och godkänner <a href="terms.php" target = _blank class="highlightForth font-weight-bold">villkoren</a> </label>
         </div>

        <button type="submit" name="add" class="btn btnFirst m-3">Skapa konto</button>
        <button type="submit" name="cancel" class="btn btnSecond" formnovalidate>Ångra</button>
    </form>

<?php require __DIR__.'/views/footer.php'; ?>
