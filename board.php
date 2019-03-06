<?php
require __DIR__.'/views/header.php';
if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}
?>

<div class="backgroundImgOthers">
    <h2 class="py-2 mt-5 mb-2">Styrelsen 2019</h2>
    <div class="flexContainerBoardUsers">
        <div class="boxBoard">
            <p class="boardTitle">Ordförande</p>
            <p class="boardText">Förnamn Efternamn</p>
            <i class="fas fa-2x fa-address-card"></i>
            <a class="mailtoBoard" href="mailto:förnamn.efternamn@gmail.com">förnamn.efternamn@mail.com</a>
            <p>Telefon: 0700 000 000</p>
        </div>
        <div class="boxBoard">
            <p class="boardTitle">Vice ordförande</p>
            <p class="boardText">Förnamn Efternamn</p>
            <i class="fas fa-2x fa-address-card"></i>
            <a class="mailtoBoard" href="mailto:förnamn.efternamn@gmail.com">förnamn.efternamn@mail.com</a>
            <p>Telefon: 0700 000 000</p>
        </div>
        <div class="boxBoard">
            <p class="boardTitle">Kassör</p>
            <p class="boardText">Förnamn Efternamn</p>
            <i class="fas fa-2x fa-address-card"></i>
            <a class="mailtoBoard" href="mailto:förnamn.efternamn@gmail.com">förnamn.efternamn@mail.com</a>
            <p>Telefon: 0700 000 000</p>
        </div>
        <div class="boxBoard">
            <p class="boardTitle">Sekreterare</p>
            <p class="boardText">Förnamn Efternamn</p>
            <i class="fas fa-2x fa-address-card"></i>
            <a class="mailtoBoard" href="mailto:förnamn.efternamn@gmail.com">förnamn.efternamn@mail.com</a>
            <p>Telefon: 0700 000 000</p>
        </div>
    </div>


<?php require __DIR__.'/views/footer.php'; ?>
