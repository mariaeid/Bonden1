<?php

require __DIR__.'/views/header.php';

if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}

$posts = allPosts($pdo);
$proposals = allProposals($pdo);
?>

<div class="startOthers">
    <div class="flexContainerProfile">
        <div class="profileDetails">
            <div class="textBoxProfileDetails">
                <div>
                    <h3 class="mb-4">Profiluppgifter</h3>
                    <h5 class="py-3"><?php echo $_SESSION['user']['name'];?>
                        <span class="highlightSecond font-weight-bold">
                            <?php if (!empty($_SESSION['user']['cohabitant'])):
                                echo '&' ?>
                            <?php endif; ?>
                        </span>
                        <?php if (!empty($_SESSION['user']['cohabitant'])):
                            echo $_SESSION['user']['cohabitant'] ?>
                        <?php endif; ?></h5>
                        <p> <span class="font-weight-bold">Email: </span><?php echo $_SESSION['user']['email'];?></p>
                        <p> <span class="font-weight-bold">Tel: </span><?php echo $_SESSION['user']['phone'];?></p>
                        <p class="pb-3"> <span class="font-weight-bold">Adress: </span><?php echo $_SESSION['user']['street'].' '.$_SESSION['user']['street_no'];?></p>
                </div>
                <div class="centerButtonsProfile">
                    <form action="/profileEdit.php" method="post">
                        <button type="submit" name="edit" class="btn btnSecond mb-3">Ändra uppgifter</button>
                    </form>
                    <form action="/changePw.php" method="post">
                        <button type="submit" name="changePw" class="btn btnSecond">Byt lösenord </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="postsProposals">
            <div class="textBoxProfile">
                <h3 class="mb-4">Dina Nyhetsposter</h3>
                <div class="mt-5 mb-4">
                    <form action="/newPost.php" method="post">
                        <button type="submit" name="newLink" class="btn btnSecond"><?php echo "Lägg till nyhet" ?></button>
                    </form>
                </div>
                <?php foreach ($posts as $post): ?>
                    <!-- Display posts crteated by the logged in user -->
                    <?php if ($post['post_user_id'] === $_SESSION['user']['user_id']):?>
                        <form action="/postEdit.php" method="post">
                            <div class="form-group border p-3 my-3 posts infoContainer">
                                <div>
                                    <p class="titleEdit"><?php echo $post['title']; ?></p>
                                </div>
                                <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                                <button type="submit" name="postEdit" class="btn btnSecond btn-sm">Redigera inlägg</button>
                            </div>
                        </form>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="textBoxProfile">
                <h3 class="mb-4">Dina Motioner</h3>
                <div class="mt-5 mb-4">
                    <form action="/newProposal.php" method="post">
                        <button type="submit" name="newLink" class="btn btnSecond"><?php echo "Lägg till motion" ?></button>
                    </form>
                </div>
                <?php foreach ($proposals as $proposal): ?>
                    <!-- Display proposals crteated by the logged in user -->
                    <?php if ($proposal['proposal_user_id'] === $_SESSION['user']['user_id']):?>
                        <form action="/postEdit.php" method="post">
                            <div class="form-group border p-3 my-3 posts infoContainer">
                                <div>
                                    <p class="titleEdit"><?php echo $proposal['title']; ?></p>
                                </div>
                                <input type="hidden" name="proposal_id" value="<?php echo $proposal['proposal_id']; ?>">
                                <button type="submit" name="proposalEdit" class="btn btnSecond btn-sm">Redigera inlägg</button>
                            </div>
                        </form>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__.'/views/footer.php'; ?>
