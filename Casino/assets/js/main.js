//Games
// Function to load content for first modal
function loadModalBody1() {
  document.getElementById("GamemodalBody1").innerHTML =
    "<p>Spin the reels and try your luck on our slot machines. </p>";
}

// Function to load content for second modal
function loadModalBody2() {
  document.getElementById("GamemodalBody2").innerHTML =
    "<p>Take a seat at the roulette table and place your bets.</p>";
}
// Function to load content for 3 modal
function loadModalBody3() {
  document.getElementById("GamemodalBody3").innerHTML =
    "<p>Test your skills in the classic game of blackjack.</p>";
}

// Function to load content for 4 modal
function loadModalBody4() {
  document.getElementById("GamemodalBody4").innerHTML =
    "<p>This is the content for Popup 2.</p>";
}
// Function to load content for 5 modal
function loadModalBody5() {
  document.getElementById("GamemodalBody5").innerHTML =
    "<p>This is the content for Popup 1.</p>";
}

// Function to load content for 6 modal
function loadModalBody6() {
  document.getElementById("GamemodalBody6").innerHTML =
    "<p>This is the content for Popup 2.</p>";
}

// Event listeners to trigger loading of modal body content when modals are shown
document
  .getElementById("GameModal1")
  .addEventListener("shown.bs.modal", function () {
    loadModalBody1();
  });

document
  .getElementById("GameModal2")
  .addEventListener("shown.bs.modal", function () {
    loadModalBody2();
  });
document
  .getElementById("GameModal3")
  .addEventListener("shown.bs.modal", function () {
    loadModalBody3();
  });

document
  .getElementById("GameModal4")
  .addEventListener("shown.bs.modal", function () {
    loadModalBody4();
  });
document
  .getElementById("GameModal5")
  .addEventListener("shown.bs.modal", function () {
    loadModalBody5();
  });

document
  .getElementById("GameModal6")
  .addEventListener("shown.bs.modal", function () {
    loadModalBody6();
  });

// Events

// Function to load content for first modal
function loadModalBodyEvent1() {
  document.getElementById("EventmodalBody1").innerHTML =
    "<p>Spin the reels and try your luck on our slot machines. </p>";
}

// Function to load content for second modal
function loadModalBodyEvent2() {
  document.getElementById("EventmodalBody2").innerHTML =
    "<p>Take a seat at the roulette table and place your bets.</p>";
}
// Function to load content for 3 modal
function loadModalBodyEvent3() {
  document.getElementById("EventmodalBody3").innerHTML =
    "<p>Test your skills in the classic game of blackjack.</p>";
}

// Function to load content for 4 modal
function loadModalBodyEvent4() {
  document.getElementById("EventmodalBody4").innerHTML =
    "<p>This is the content for Popup 2.</p>";
}
// Function to load content for 5 modal
function loadModalBodyEvent5() {
  document.getElementById("EventmodalBody5").innerHTML =
    "<p>This is the content for Popup 1.</p>";
}

// Function to load content for 6 modal
function loadModalBodyEvent6() {
  document.getElementById("EventmodalBody6").innerHTML =
    "<p>This is the content for Popup 2.</p>";
}
// Event listeners to trigger loading of modal body content when modals are shown
document
  .getElementById("EventModal1")
  .addEventListener("shown.bs.modal", function () {
    loadModalBodyEvent1();
  });

document
  .getElementById("EventModal2")
  .addEventListener("shown.bs.modal", function () {
    loadModalBodyEvent2();
  });
document
  .getElementById("EventModal3")
  .addEventListener("shown.bs.modal", function () {
    loadModalBodyEvent3();
  });

document
  .getElementById("EventModal4")
  .addEventListener("shown.bs.modal", function () {
    loadModalBodyEvent4();
  });
document
  .getElementById("EventModal5")
  .addEventListener("shown.bs.modal", function () {
    loadModalBodyEvent5();
  });

document
  .getElementById("EventModal6")
  .addEventListener("shown.bs.modal", function () {
    loadModalBodyEvent6();
  });
