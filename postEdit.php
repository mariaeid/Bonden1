<?php
require __DIR__.'/views/header.php';
if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}

//Getting all posts by calling the function allPosts from functions.php
$posts = allPosts($pdo);
?>

<div class="backgroundImgOthers">
    <article>
        <h1>Redigera inlägg</h1>
        <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
            <form action="app/posts/updateDelete.php" method="post">

                <div class="form-group">
                    <label for="title">Titel</label>
                    <input class="form-control" type="text" name="title" required
                    <?php foreach ($posts as $post): ?>
                        <?php if($_POST['post_id'] === $post['post_id']) : ?>
                            value="<?php echo $post['title']; ?>">
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div><!-- /form-group -->

                <div class="form-group">
                    <label for="description">Beskrivning</label>
                    <?php foreach ($posts as $post): ?>
                        <?php if($_POST['post_id'] === $post['post_id']) : ?>
                            <textarea class="form-control" name="description" rows="8" cols="80" required><?php echo $post['description']; ?></textarea>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div><!-- /form-group -->

                <input class="form-control" type="hidden" name="id"
                <?php foreach ($posts as $post): ?>
                    <?php if($_POST['post_id'] === $post['post_id']) : ?>
                        value="<?php echo $post['post_id']; ?>">
                    <?php endif; ?>
                <?php endforeach; ?>

                <div class="form-group">
                    <button type="submit" name="edit" class="btn btnFirst">Spara</button>
                    <button type="submit" name="cancel" class="btn btnFirst mx-2" formnovalidate>Ångra</button>
                    <button type="submit" name="delete" class="btn btnSecond" onclick="return confirmDeletePost();" formnovalidate ><i class="fa fa-trash-o fa-lg"></i> Ta bort</button>
                </div><!-- /form-group -->

            </form>

    </article>

<?php require __DIR__.'/views/footer.php'; ?>
