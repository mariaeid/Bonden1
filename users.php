<?php
require __DIR__.'/views/header.php';

if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}

$users = allUsers($pdo);
?>

<div class="backgroundImgOthers mt-5 p-5">
    <h2 class="mb-3">Föreningens Medlemmar</h2>
    <div class="flexContainerBoardUsers">
        <?php foreach ($users as $user): ?>
            <div class="boxUsers">
                <form action="/profileEdit.php" method="post">
                    <h6 class="py-3 highlightFirst font-weight-bold"><?php echo $user['street'].' '.$user['street_no'] ?></h6>
                    <p><?php echo $user['name'] ?>
                        <?php if (!empty($user['cohabitant'])): ?>
                            <span class="highlightFirst font-weight-bold"><? echo ' '.'&'.' '?></span>
                            <? echo $user['cohabitant'] ?>
                        <?php endif; ?> </p>
                    <a class="mailtoUsers" href="mailto:<?php echo "Mail: ".$user['email'] ?>"><?php echo "Mail: ".$user['email'] ?></a>
                    <p><?php echo "Tel: ".$user['phone'] ?></p>
                    <?php if ($_SESSION['user']['email'] === $user['email']): ?>
                        <button type="submit" name="newLink" class="btn btnFirst"><?php echo "Ändra uppgifter" ?></button>
                    <?php endif; ?>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

<?php require __DIR__.'/views/footer.php'; ?>
<!--  -->
