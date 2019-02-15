<?php
require __DIR__.'/views/header.php';

//Getting all posts by calling the function allPosts from functions.php
$posts = allPosts($pdo);
?>

<div class="startMain">
    <div class="textBoxIndex">
        <div class="py-1">
            <h1 class="startTitle"><?php echo $config['title']; ?> </h1>
            <p class="py-3 px-5 startText">Välkommen till samfälligheten Bonden ett. Här hittar ni information om vad som är på gång inom föreningen, protokoll från från årsmöten, information om  samfällighetens lokal och redskap som finns till utlåning samt kontaktuppgifter styrelse och medlemmar.</p>
            <?php if (!isset($_SESSION['user'])): ?>
                <p class="startText pb-3 px-5">Medlem i föreningen?
                    <a class="highlightThird" href="/login.php">Logga in</a>
                    eller
                    <a class="highlightThird" href="/signup.php">skapa användare</a>
                    för att få tillgång till alla funktionaliteter.</p>
            <?php endif; ?>
        </div>
    </div>
</div>



<?php require __DIR__.'/views/footer.php'; ?>
