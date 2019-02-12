'use strict';

// Function for confirmation pop up window - delete post
function confirmDeletePost() {
  if (confirm("Är du säker på att du vill ta bort inlägget?") == true) {
    return true;
  }
  else {
    return false;
  }
};

// Function for confirmation pop up window - delete account
function confirmDeleteAccount() {
  if (confirm("Är du säker på att du vill ta bort ditt konto? Även alla dina poster och inlägg kommer att deletas.") == true) {
    return true;
  }
  else {
    return false;
  }
};

////// START - INFO.PHP JavaScript - Only load when using info.php //////
// If close1 is null we are NOT on info.php page and therefore should not use the following JS
const close1 = document.querySelector('#close1');
if (close1 !== null) {
  // Get the first modal
  const modal1 = document.querySelector('#myModal1');
  const selection1All = document.querySelectorAll('#selection1');

    // When the user clicks on the button, open the modal
    selection1All.forEach(function(selection1) {
      selection1.addEventListener('click', (event) => {
        modal1.style.display = "block";
      });
    });

    // When the user clicks on close, close the modal
    close1.addEventListener('click', (event) => {
            modal1.style.display = "none";
    });

    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener('click', (event) => {
      if (event.target == modal1) {
        modal1.style.display = "none";
      }
    });

  // Get the second modal
  const modal2 = document.querySelector('#myModal2');
  const close2 = document.querySelector('#close2');
  const selection2All = document.querySelectorAll('#selection2');

  // When the user clicks on the button, open the modal
  selection2All.forEach(function(selection2) {
    selection2.addEventListener('click', (event) => {
      modal2.style.display = "block";
    });
  });

  // When the user clicks on close, close the modal
  close2.addEventListener('click', (event) => {
      modal2.style.display = "none";
  });

  // When the user clicks anywhere outside of the modal, close it
  window.addEventListener('click', (event) => {
    if (event.target == modal2) {
      modal2.style.display = "none";
    }
  });

  // Get the third modal
  const modal3 = document.querySelector('#myModal3');
  const close3 = document.querySelector('#close3');
  const selection3All = document.querySelectorAll('#selection3');

  // When the user clicks on the button, open the modal
  selection3All.forEach(function(selection3) {
    selection3.addEventListener('click', (event) => {
      modal3.style.display = "block";
    });
  });

  // When the user clicks on close, close the modal
  close3.addEventListener('click', (event) => {
      modal3.style.display = "none";
  });

  // When the user clicks anywhere outside of the modal, close it
  window.addEventListener('click', (event) => {
    if (event.target == modal3) {
      modal3.style.display = "none";
    }
  });
};
////// END - INFO.PHP JavaScript //////

// BOARD CONTACT START - Load only when using board.PHP

const contact1 = document.querySelector('#contact1');
if (contact1 !== null) {

  // Contact 1
  const contactDetails1 = document.querySelector('#contactDetails1');
  contact1.addEventListener('click', (event) => {
    if (!contactDetails1.textContent) {
      contactDetails1.innerHTML = `Mail: sven@test.com <br> Telefon: 0700 000 000`;
    }
    else {
      contactDetails1.textContent = null;
    }
  });

  // Contact 2
  const contactDetails2 = document.querySelector('#contactDetails2');
  contact2.addEventListener('click', (event) => {
    if (!contactDetails2.textContent) {
      contactDetails2.innerHTML = `Mail: anna@test.com <br> Telefon: 0700 000 000`;
    }
    else {
      contactDetails2.textContent = null;
    }
  });

  // Contact 3
  const contactDetails3 = document.querySelector('#contactDetails3');
  contact3.addEventListener('click', (event) => {
    if (!contactDetails3.textContent) {
      contactDetails3.innerHTML = `Mail: johanna@test.com <br> Telefon: 0700 000 000`;
    }
    else {
      contactDetails3.textContent = null;
    }
  });

  // Contact 4
  const contactDetails4 = document.querySelector('#contactDetails4');
  contact4.addEventListener('click', (event) => {
    if (!contactDetails4.textContent) {
      contactDetails4.innerHTML = `Mail: kalle@test.com <br> Telefon: 0700 000 000`;
    }
    else {
      contactDetails4.textContent = null;
    }
  });


}

// END BOARD.PHP
