<?php require __DIR__.'/views/header.php';
if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}

$posts = allPosts($pdo);
?>

<div class="startOthers">

    <div class="flexContainerInfo mt-5">
        <!--SELECTION 1 -->
        <div class="cardBox">
            <img class="cardImage" src="app/imgs/site/tools.gif" alt="Photo by Sneaky Elbow on Unsplash" id="selection1">
            <h4 class="cardText" id="selection1">Redskap och verktyg</h4>
        </div>
        <div id="myModal1" class="modal">
          <div class="modalContent">
            <span class="close" id="close1">&times;</span>
            <h4 class="pb-2">Redskap och verktyg till utlåning</h4>
            <p class="infoText">I garagelängan som ligger på Torparegatan har föreningen det första garaget som förråd för:</p>
            <ul class="infoText">
                <li>Gräsklippare</li>
                <li>Mossrivare</li>
                <li>Kompostkvarn</li>
                <li>Högtryckstvätt</li>
                <li>Röjsåg</li>
                <li>Stege</li>
            </ul>
            <p class="infoText">Den här utrustningen får medlemmarna låna gratis. Låna nyckel av någon i styrelsen. Om något går sönder meddela det
            vid återlämnandet av nyckel så föreningen kan åtgärna felet.<p>
          </div>
        </div>
        <!--SELECTION 2 -->
        <div class="cardBox selection2">
            <img class="cardImage" src="app/imgs/site/door.gif" alt="Photo by Daniel von Appen on Unsplash" id="selection2">
            <h4 class="cardText" id="selection2">Kvarterslokal</h4>
        </div>
        <div id="myModal2" class="modal">
          <div class="modalContent">
            <span class="close" id="close2">&times;</span>
            <h4 class="pb-2">Kvarterslokal</h4>
            <p class="infoText">På Hultebackavägen 32 har vi har en mycket bra kvarterslokal som föreningens medlemmar får låna gratis till kalas, fester eller liknande.
            Låna nyckel av någon i styrelsen och boka tid. Lista för tidsbokning sitter på väggen i hallen i lokalen.
            Var och en som lånar lokalen ansvarar för att uppstatta trivselregler efterlevs.</p>
            <p class="infoText">Regler:</p>
            <ul class="infoText">
                <li>Ungdommar under 18 år får inte låna lokalen</li>
                <li>Lokalen får inte bokas mer än två dagar i sträck</li>
                <li>Övernattning får inte ske i lokalen</li>
                <li>Städning enligt städschemat i lokalen</li>
            </ul>
            <p class="infoText">Där finns även en bastu till förfogande. Samma regler för tidsbokning gäller även där.</p>
          </div>
        </div>
        <!--SELECTION 3 -->
        <div class="cardBox selection3">
            <img class="cardImage" src="app/imgs/site/parking.gif" alt="Photo by Michail Sapiton on Unsplash" id="selection3">
            <h4 class="cardText" id="selection3">Parkering</h4>
        </div>
        <!-- The third Modal -->
        <div id="myModal3" class="modal">
          <!-- Modal content -->
          <div class="modalContent">
            <span class="close" id="close3">&times;</span>
            <h4 class="pb-2">Nyttjande av samfällighetens gemensamma parkeringsplatser</h4>
            <p class="infoText">Samfällighetens gemensamma parkeringsplatser är endast avsedda för parkering av personbilar samt släpfordon till personbil. Tänk på att vi inte har speciellt många platser så vår parkering ska inte användas som uppställningsplats.</p>
            <ul class="infoText">
                <li>Parkering får endast ske inom de vita linjerna</li>
                <li>Personbilar får stå parkerade max 7 dygn i sträck. Vid behov av längre uppställningstid skall detta godkännas av styrelsen</li>
                <li>Släpfordon – husvagnar och släpkärror – får stå parkerade max 3 dygn i sträck</li>
                <li>Avställda, oskattade motorfordon får under inga omständigheter nyttja parkeringsplatserna</li>
                <li>Det får inte förekomma någon parkering av fordon på gatan utanför husen eller i vändplatserna</li>
            </ul>
            </div>
          </div>

        <!--SELECTION 4 -->
        <div class="cardBox selection4">
            <img class="cardImage" src="app/imgs/site/documents.gif" alt="Photo by Helloquence on Unsplash" id="selection4">
            <h4 class="cardText" id="selection4">Protokoll</h4>
        </div>
        <!-- The fourth Modal -->
        <div id="myModal4" class="modal">
          <!-- Modal content -->
          <div class="modalContent">
            <span class="close" id="close4">&times;</span>
            <h4 class="pb-2">Protokoll från årsmöten</h4>
            <!-- <a href="app/uploadedFiles/protocol/2018.pdf" class="highlightThird" target="_blank">2018</a> -->
            <p>Här kommer protokoll från årsmöten finnas.</p>
            </div>
          </div>
        </div>
    </div>


<?php require __DIR__.'/views/footer.php'; ?>
