<?php
require __DIR__.'/views/header.php';
if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}

//Getting all posts by calling the function allPosts from functions.php
$posts = allPosts($pdo);
?>

<div class="backgroundImgOthers">
    <div class="flexContainerPostsProposals">
        <form action="/newPost.php" method="post" class="postProposalsAdd mb-3">
            <?php if (isset($_SESSION['user'])): ?>
                <button type="submit" name="newLink" class="btn btnSecond"><?php echo "Lägg till nyhet" ?></button>
            <?php endif; ?>
        </form>
        <?php foreach ($posts as $post): ?>
        <div class="boxPostsProposals">
            <div class="px-3 textBoxPostsProposals">
                <div class="pr-3">
                    <h4 id="<?php echo $post['title']?>" class="postTitle highlightFirst"><?php echo $post['title']; ?></h3>
                    <p class="newsInfo"><?php echo $post['submitted_date']; ?> | <?php echo $post['name']; ?></p>
                    <pre class="postText"><?php echo $post['description']; ?></pre>
                    <?php if (!empty($post['file_name'])): ?>
                        <a href="app/uploadedFiles/attachment/<?php echo $post['file_name']?>" download="BilagaBonden1" class="highlightFirst"><?php echo "Se bilaga" ?></a>
                    <?php endif; ?>
                </div>
                <div>
                    <?php if (isset($_SESSION['user'])): ?>
                        <?php if ($post['post_user_id'] === $_SESSION['user']['user_id']):?>
                            <form action="/postEdit.php" method="post">
                                <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                                <button type="submit" name="postEdit" class="btn btnFirstEdit">Redigera inlägg</button>
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
