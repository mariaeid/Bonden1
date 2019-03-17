<?php
require __DIR__.'/views/header.php';
if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}

//Getting all posts by calling the function allPosts from functions.php
$posts = allPosts($pdo);
?>

<!-- TA BORT DENNA??!! -->

<div class="container my-5 py-5">

    <article>
        <h2>Your Posts</h2>
            <?php foreach ($posts as $post): ?>
                <!-- Display posts crteated by the logged in user -->
                <?php if ($post['post_user_id'] === $_SESSION['user']['user_id']):?>
                    <form action="/postEdit.php" method="post">
                        <div class="form-group border border-dark p-3 my-3 posts infoContainer">
                            <a class="siteLink"><?php echo $post['title']; ?></a>
                            <p><?php echo $post['description']; ?></p>
                            <p>Upplagd av <?php echo $post['name'].' '.$post['name']; ?></p>
                            <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                            <button type="submit" name="postEdit" class="btn btnColor btn-sm">Edit</button>
                        </div>
                    </form>
                <?php endif; ?>
            <?php endforeach; ?>
    </article>
    <article>
        <form action="/newPost.php" method="post">
            <div class="form-group">
                <button type="submit" name="newLink" class="btn btn-light">Add a new post</button>
            </div>
        </form>
    </article>

</div>

<?php require __DIR__.'/views/footer.php'; ?>
