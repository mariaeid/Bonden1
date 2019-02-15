<?php
require __DIR__.'/views/header.php';
?>

<div class="backgroundImgOthers">
    <h2 class="py-2 mt-5 mb-2">Styrelsen <?php echo $config['year']; ?> </h2>
    <div class="flexContainerBoardUsers">
        <div class="boxBoard">
            <p class="boardTitle">Ordförande</p>
            <p class="boardText">Sven Svensson</p>
            <i class="fas fa-2x fa-address-card boardContact" id="contact1"></i>
            <p class="contactDetails" id="contactDetails1"></p>
        </div>
        <div class="boxBoard">
            <p class="boardTitle">Vice ordförande</p>
            <p class="boardText">Anna Andersson</p>
            <i class="fas fa-2x fa-address-card boardContact" id="contact2"></i>
            <p class="contactDetails" id="contactDetails2"></p>
        </div>
        <div class="boxBoard">
            <p class="boardTitle">Kassör</p>
            <p class="boardText">Johanna Johansson</p>
            <i class="fas fa-2x fa-address-card boardContact" id="contact3"></i>
            <p class="contactDetails" id="contactDetails3"></p>
        </div>
        <div class="boxBoard">
            <p class="boardTitle">Sekreterare</p>
            <p class="boardText">Kalle Karlsson</p>
            <i class="fas fa-2x fa-address-card boardContact" id="contact4"></i>
            <p class="contactDetails" id="contactDetails4"></p>
        </div>
    </div>


<?php require __DIR__.'/views/footer.php'; ?>
