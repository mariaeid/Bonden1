<?php require __DIR__.'/views/header.php';

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
            <p>I garaget på Torparegatan finns följande verktyg och redskap till fri utlåning:</p>
            <ul>
                <li>Stege</li>
                <li>Gräsklippare</li>
                <li>Skottkärra</li>
            </ul>
          </div>
        </div>
        <!--SELECTION 2 -->
        <div class="cardBox selection2">
            <img class="cardImage" src="app/imgs/site/door.gif" alt="Photo by Daniel von Appen on Unsplash" id="selection2">
            <h4 class="cardText" id="selection2">Föreningslokal</h4>
        </div>
        <div id="myModal2" class="modal">
          <div class="modalContent">
            <span class="close" id="close2">&times;</span>
            <h4 class="pb-2">Föreningslokal</h4>
            <p>Föreningslokalen ligger på Hultebackavägen xx</p>
          </div>
        </div>
        <!--SELECTION 3 -->
        <div class="cardBox selection3">
            <img class="cardImage" src="app/imgs/site/documents.gif" alt="Photo by Helloquence on Unsplash" id="selection3">
            <h4 class="cardText" id="selection3">Protokoll</h4>
        </div>
        <!-- The third Modal -->
        <div id="myModal3" class="modal">
          <!-- Modal content -->
          <div class="modalContent">
            <span class="close" id="close3">&times;</span>
            <h4 class="pb-2">Protokoll från årsmöten</h4>
            <a href="app/uploadedFiles/protocol/2018.pdf" class="highlightThird" target="_blank">2018</a>
            <a href="app/uploadedFiles/protocol/2018.pdf" class="highlightThird" target="_blank">2017</a>
            </div>
          </div>
        </div>
    </div>


<?php require __DIR__.'/views/footer.php'; ?>
