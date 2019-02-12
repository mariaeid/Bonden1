<?php
require __DIR__.'/views/header.php';

//Getting all posts by calling the function allPosts from functions.php
$posts = allPosts($pdo);
?>

<div class="backgroundImgOthers mt-5 p-5">
    <form action="/newpost.php" method="post">
        <?php if (isset($_SESSION['user'])): ?>
            <button type="submit" name="newLink" class="btn btnSecond float-right"><?php echo "Lägg till nyhet" ?></button>
        <?php endif; ?>
    </form>
    <div class="flexContainerPostsProposals">
        <?php foreach ($posts as $post): ?>
            <div class="boxPostsProposals p-5 m-3">
                <div class="px-3 flexContainerRow">
                    <div>
                        <h4 id="<?php echo $post['title']?>" class="postTitle highlightFirst"><?php echo $post['title']; ?></h3>
                        <p class="newsInfo"><?php echo $post['submitted_date']; ?> | <?php echo $post['name']; ?></p>
                        <pre class="postText"><?php echo $post['description']; ?></pre>
                        <?php if (!empty($post['file_name'])): ?>
                            <a href="app/uploadedFiles/attachment/<?php echo $post['file_name']?>" download="BilagaBonden1" class="highlightFirst small"><?php echo "Se bilaga" ?></a>
                        <?php endif; ?>
                    </div>
                    <div>
                        <?php if (isset($_SESSION['user'])): ?>
                            <?php if ($post['post_user_id'] === $_SESSION['user']['user_id']):?>
                                <form action="/postEdit.php" method="post">
                                    <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                                    <button type="submit" name="postEdit" class="btn btnFirst">Redigera inlägg</button>
                                </form>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require __DIR__.'/views/footer.php'; ?>
