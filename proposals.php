<?php
require __DIR__.'/views/header.php';

//Getting all posts by calling the function allPosts from functions.php
$proposals = allProposals($pdo);
?>

<div class="backgroundImgOthers mt-5 p-5">
    <form action="/newProposal.php" method="post">
        <?php if (isset($_SESSION['user'])): ?>
            <button type="submit" name="newLink" class="btn btnSecond float-right"><?php echo "Lägg till motion" ?></button>
        <?php endif; ?>
    </form>
    <div class="flexContainerNews">
        <?php foreach ($proposals as $proposal): ?>
            <div class="boxNews p-5 m-3">
                <div class="px-3 flexContainerRow">
                    <div>
                        <h4 id="<?php echo $proposal['title']?>" class="postTitle highlightFirst"><?php echo $proposal['title']; ?></h3>
                        <p class="newsInfo"><?php echo $proposal['submitted_date']; ?> |
                            <?php if (!empty($proposal['submitted_by'])): ?>
                                <?php echo $proposal['submitted_by'] ?>
                            <?php else: ?>
                                <?php echo "Anonym" ?>
                            <?php endif; ?>
                        </p>
                        <pre class="postText"><?php echo $proposal['description']; ?></pre>
                    </div>
                    <div>
                        <?php if (isset($_SESSION['user'])): ?>
                            <?php if ($proposal['proposal_user_id'] === $_SESSION['user']['user_id']):?>
                                <form action="proposalEdit.php" method="post">
                                    <input type="hidden" name="proposal_id" value="<?php echo $proposal['proposal_id']; ?>">
                                    <button type="submit" name="proposalEdit" class="btn btnFirst">Redigera inlägg</button>
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
