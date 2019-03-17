<?php
require __DIR__.'/views/header.php';
if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}
?>

<div class="backgroundImgOthers">
    <h2 class="py-2 mt-5 mb-2">Styrelsen 2019</h2>
    <div class="flexContainerBoardUsers">
        <div class="boxBoard">
            <p class="boardTitle">Ordförande</p>
            <p class="boardText">Emil Järleborg</p>
            <i class="fas fa-2x fa-address-card"></i>
            <a class="mailtoBoard" href="mailto:emil.jarleborg@icloud.com">emil.jarleborg@icloud.com</a>
            <p class="fontMedium">Telefon: 0733-999 393</p>
        </div>
        <div class="boxBoard">
            <p class="boardTitle">Kassör</p>
            <p class="boardText">Elin Fritzson</p>
            <i class="fas fa-2x fa-address-card"></i>
            <a class="mailtoBoard" href="mailto:efritzon@hotmail.com">efritzon@hotmail.com</a>
            <p class="fontMedium">Telefon: 0737-088 626</p>
        </div>
        <div class="boxBoard">
            <p class="boardTitle">Sekreterare</p>
            <p class="boardText">Christoffer Jangevik</p>
            <i class="fas fa-2x fa-address-card"></i>
            <a class="mailtoBoard" href="mailto:jangevik@gmail.com">jangevik@gmail.com</a>
            <p class="fontMedium">Telefon: 0736-440 211</p>
        </div>
        <div class="boxBoard">
            <p class="boardTitle">Suppleant</p>
            <p class="boardText">Erik Andersson</p>
            <i class="fas fa-2x fa-address-card"></i>
            <a class="mailtoBoard" href="mailto:kloght@gmail.com">kloght@gmail.com</a>
        </div>
        <div class="boxBoard">
            <p class="boardTitle">Suppleant</p>
            <p class="boardText">Jessica Larsson</p>
            <i class="fas fa-2x fa-address-card"></i>
            <a class="mailtoBoard" href="mailto:najklarsson@gmail.com">najklarsson@gmail.com</a>
        </div>
    </div>


<?php require __DIR__.'/views/footer.php'; ?>
