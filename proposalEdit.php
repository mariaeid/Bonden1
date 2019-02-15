<?php
require __DIR__.'/views/header.php';
if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}

//Getting all proposals by calling the function allProposals from functions.php
$proposals = allProposals($pdo);
?>

<div class="backgroundImgForms">
    <h3 class="py-2 mt-5">Redigera motion</h3>
    <form action="app/proposals/updateDelete.php" method="post">
        <input type="hidden" name="proposal_id" value="<?php echo $proposal['proposal_id']; ?>">

        <div class="form-group">
            <label for="title">Titel</label>
            <input class="form-control bodyText" type="text" name="title" required
            <?php foreach ($proposals as $proposal): ?>
                <?php if($_POST['proposal_id'] === $proposal['proposal_id']) : ?>
                    value="<?php echo $proposal['title']; ?>">
                <?php endif; ?>
            <?php endforeach; ?>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="description">Beskrivning</label>
            <?php foreach ($proposals as $proposal): ?>
                <?php if($_POST['proposal_id'] === $proposal['proposal_id']) : ?>
                    <textarea class="form-control bodyText" name="description" rows="8" cols="80" required><?php echo $proposal['description']; ?></textarea>
                <?php endif; ?>
            <?php endforeach; ?>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="submittedBy">Inskickad av</label>
            <input class="form-control bodyText" type="text" name="submittedBy"
            <?php foreach ($proposals as $proposal): ?>
                <?php if($_POST['proposal_id'] === $proposal['proposal_id']) : ?>
                    value="<?php echo $proposal['submitted_by']; ?>">
                <?php endif; ?>
            <?php endforeach; ?>
        </div><!-- /form-group -->

        <input class="form-control" type="hidden" name="id"
        <?php foreach ($proposals as $proposal): ?>
            <?php if($_POST['proposal_id'] === $proposal['proposal_id']) : ?>
                value="<?php echo $proposal['proposal_id']; ?>">
            <?php endif; ?>
        <?php endforeach; ?>

        <div class="form-group">
            <button type="submit" name="edit" class="btn btnFirst">Spara</button>
            <button type="submit" name="cancel" class="btn btnFirst mx-2" formnovalidate>Ångra</button>
            <button type="submit" name="delete" class="btn btnSecond" onclick="return confirmDeletePost();" formnovalidate ><i class="fa fa-trash-o fa-lg"></i> Ta bort</button>
        </div><!-- /form-group -->

    </form>


<?php require __DIR__.'/views/footer.php'; ?>
