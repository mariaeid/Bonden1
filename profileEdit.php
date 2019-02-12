<?php
require __DIR__.'/views/header.php';
if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}
?>

<div class="backgroundImgOthers">

    <article>
        <h1>Ändra uppgifter</h1>

        <form action="app/auth/editDelete.php" method="post">

            <!-- Displaying error messages if there were any when the form was submitted -->
            <div class="form-group col-sm-7">
                <?php if (isset($_SESSION['error'])): ?>
                    <p class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']);?></p>
                <?php endif; ?>
            </div><!-- /form-group -->

            <div class="form-group row">
                <div class="col-sm-7">
                    <label for="name">Namn <small> (för- och efternamn)</small></label>
                    <!-- If a user has submitted the form with errors, the data previously entered is shown in the value of the field -->
                    <input class="form-control" type="text" name="name" value="<?php echo $_SESSION['user']['name'];?>" required>
                </div>
            </div><!-- /form-group -->

            <div class="form-group row">
                <div class="col-sm-7">
                    <label for="cohabitant">Namn på ev. sambo/make/maka <small> (för- och efternamn)</small></label>
                    <!-- If a user has submitted the form with errors, the data previously entered is shown in the value of the field -->
                    <input class="form-control" type="text" name="cohabitant" value="<?php echo $_SESSION['user']['cohabitant'];?>">
                </div>
            </div><!-- /form-group -->

            <div class="form-group row">
                <div class="col-sm-7">
                    <label for="email">Mail</label>
                    <input class="form-control" type="email" name="email" value="<?php echo $_SESSION['user']['email'];?>" required>
                </div>
            </div><!-- /form-group -->

            <div class="form-group row">
                <div class="col-sm-7">
                    <label for="phone">Telefon</label>
                    <input class="form-control" type="text" name="phone" value="<?php echo $_SESSION['user']['phone'];?>" required>
                </div>
            </div><!-- /form-group -->

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="street">Gata</label>
                    <select class="form-control" name="street" value="<?php echo $_SESSION['user']['street'];?>" required>
                        <option <?php if($_SESSION['user']['street'] === "Hultebackavägen") echo 'selected'; ?>>Hultebackavägen</option>
                        <option <?php if($_SESSION['user']['street'] === "Torparegatan") echo 'selected'; ?>>Torparegatan</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="street_no">Nummer</label>
                    <input class="form-control" type="text" name="street_no" value="<?php echo $_SESSION['user']['street_no'];?>" required>
                </div>
            </div>

            <button type="submit" name="edit" class="btn btnFirst">Spara</button>
            <button type="submit" name="cancel" class="btn btnFirst mx-2" formnovalidate>Ångra</button>
            <button type="submit" name="delete" class="btn btnSecond" onclick="return confirmDeleteAccount();" formnovalidate ><i class="fa fa-trash-o fa-lg"></i> Ta bort</button>
        </form>
    </article>

<?php require __DIR__.'/views/footer.php'; ?>
