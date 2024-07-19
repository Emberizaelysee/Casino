<?php
// Inclure la connexion à la base de données
require_once 'connection.php';
require_once 'check_remember_me.php';

$conn = new mysqli($host, $user, $pass, $db);
// Vérifier si l'utilisateur est connecté

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.html");
    exit();
}

// Récupérer l'ID utilisateur à partir de la session
$user_id = $_SESSION['user_id'];
$query = "SELECT First_name, Last_Name, Username, Email, Birthday, Gender, Phone, Payment_Info, Avatar_path FROM users WHERE User_ID = ?";
// Récupérer les informations utilisateur
$stmt = $mysqli->prepare($query);

if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($mysqli->error));
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
  <!-- focus-visible:outline-selected focus-visible:rounded-0125 focus-visible:outline focus-visible:outline-2 focus-visible:-outline-offset-2 -->
  <head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Rye&display=swap"
    />

    <!-- Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Titre & Logo -->
    <title>Casino - Profile</title>
    <link
      rel="icon"
      type="image/x-icon"
      href="../../assets/img/logo/logo103.png"
    />

    <!-- CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../assets/css/profile.css" />
    <style>
      body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
      }

      main {
        flex: 1;
        padding-bottom: 30px;
      }
      .fixedNav {
        position: static !important;
      }
      @media screen and (min-width: 768px) {
        .fixedNav {
          position: fixed !important;
          top: 0 !important;
          right: 0 !important;
          left: 0 !important;
          z-index: 1030;
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    <header>
      <nav
        class="nav bg-dark rye-regular h-64 text-white text-decoration-none d-md-flex d-sm-block justify-content-between fixedNav"
        style="width: 100%"
      >
        <div
          class="bg-dark d-md-flex d-sm-block justify-content-between"
          style="width: 100%"
        >
          <div
            class="nav-item bg-dark rye-regular text-white text-decoration-none d-flex align-items-center justify-content-center"
          >
            <a
              href="../../index.html"
              class="bg-dark rye-regular text-white text-decoration-none d-flex align-items-center justify-content-center"
            >
              <img
                src="../../assets/img/logo/logo103.png"
                alt="Casino Logo"
                class="rounded-circle img-fluid ms-4"
                style="height: 48px; width: 48px"
              />
              <span
                class="text-white text-center"
                style="font-size: 32px !important"
                >&nbsp;Casino</span
              >
            </a>
          </div>
          <br />
          <div
            class="d-md-flex flex-column flex-wrap flex-md-row flex-md-nowrap"
          >
            <ul
              class="nav nav-pills d-md-flex flex-column flex-wrap flex-md-row flex-md-nowrap justify-content-around align-items-center"
            >
              <li class="nav-item">
                <a
                  href="../../index.html#Games"
                  class="bg-dark rye-regular text-white mx-3 mt-3 link-light link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                  >Games</a
                >
              </li>
              <li class="nav-item">
                <a
                  href="../../index.html#Resto"
                  class="bg-dark rye-regular text-white mx-3 link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                  >Restaurants</a
                >
              </li>
              <li class="nav-item">
                <a
                  href="../../index.html#Events"
                  class="bg-dark rye-regular text-white mx-3 link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                  >Events</a
                >
              </li>
              <li class="nav-item dropdown">
                <a
                  href="#"
                  class="dropdown-toggle bg-dark rye-regular text-white text-decoration-none mx-3"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  >More</a
                >
                <ul class="dropdown-menu bg-dark" style="border: none">
                  <li>
                    <a
                      href="../../help.html#Contact"
                      class="dropdown-item rye-regular text-white linkEffect"
                      >Contact us for help</a
                    >
                  </li>
                  <li>
                    <a
                      href="../../help.html#JoinUs"
                      class="dropdown-item rye-regular text-white linkEffect"
                      >Join our team</a
                    >
                  </li>
                  <li>
                    <a
                      href="../../AboutUs.html#policy"
                      class="dropdown-item rye-regular text-white linkEffect"
                      >Our policy</a
                    >
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <br />
          <div
            class="nav-item bg-dark rye-regular text-white text-decoration-none d-flex align-items-center justify-content-center me-4"
          >
            <div class="connect" id="nav-not-connected">
              <a
                href="../../login.html"
                class="bg-dark rye-regular text-white d-flex align-items-center justify-content-center link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
              >
                <i class="fa fa-sign-in"></i> &nbsp;Log in</a
              >
            </div>
            <div class="connect" id="nav-connected">
              <a
                class="dropdown-toggle bg-dark rye-regular text-white text-decoration-none mx-3 d-flex align-items-center justify-content-center"
                data-bs-toggle="dropdown"
                href="#"
                role="button"
                aria-expanded="false"
                style="display: inline-flex; text-decoration: none"
              >
                <span
                  id="username"
                  class="text-white text-center me-2"
                  style="font-size: 20px"
                ></span>
                <img
                  id="avatar"
                  src="../."
                  alt="User Avatar"
                  class="rounded-circle img-fluid me-2"
                  style="height: 48px; width: 48px"
                />
              </a>
              <ul class="dropdown-menu bg-dark" style="border: none">
                <li>
                  <a
                    class="dropdown-item rye-regular text-white linkEffect"
                    href="../../assets/php/profile.php"
                    >Profile</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item rye-regular text-white linkEffect"
                    href="../../assets/php/logout.php"
                    >Log out</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <script>
        document.addEventListener("DOMContentLoaded", function () {
          function checkLoginStatus() {
            return fetch("session_check.php").then((response) =>
              response.json()
            );
          }

          checkLoginStatus()
            .then((response) => {
              if (response.success) {
                if (response.logged_in) {
                  document.getElementById("nav-not-connected").style.display =
                    "none";
                  document.getElementById("nav-connected").style.display =
                    "flex";
                  document.getElementById("username").textContent =
                    response.username;
                  let avatarPath = "../." + response.avatar;
                  document.getElementById("avatar").src = avatarPath;
                } else {
                  document.getElementById("nav-not-connected").style.display =
                    "flex";
                  document.getElementById("nav-connected").style.display =
                    "none";
                }
              } else {
                console.error("Error: " + response.message);
              }
            })
            .catch((error) => {
              console.error("Error checking login status:", error);
            });
        });
      </script>
    </header>
    <main class="mt-5">
      <section>
        <div class="container rye-regular">
          <h1 class="display-4 mt-5"></h1>
          <!-- Tab links -->

          <div class="btn-group text-dark tab" role="group">
            <button
              id="defaultOpen"
              type="button"
              class="tablinks btn text-dark"
              onclick="openSect(event, 'Profile')"
            >
              Profile Information
            </button>
            <button
              type="button"
              class="tablinks btn text-dark"
              onclick="openSect(event, 'Transaction')"
            >
              Transaction History
            </button>
            <button
              type="button"
              class="tablinks btn text-dark"
              onclick="openSect(event, 'Action')"
            >
              Account Action
            </button>
          </div>

          <!-- Contenu des onglets -->

          <div id="Profile" class="tabcontent">
            <!-- Profil utilisateur -->
            <div class="card mt-4">
              <h5 class="card-title p-4 pb-0">
                <i class="fa-solid fa-lock"></i>&nbsp;Personal Information
              </h5>
              <div class="card-body">
                <div id="profile-display">
                  <div class="d-flex">
                    <div style="margin-right: 40%">
                      <p class="card-text">
                        Name:
                        <span id="profile-name"
                          ><?php echo htmlspecialchars(($user['First_name'] ?? 'notFound') . " " . ($user['Last_Name'] ?? 'notFound' )); ?></span
                        >
                      </p>
                      <p class="card-text">
                        Username:
                        <span id="profile-username"
                          ><?php echo htmlspecialchars($user['Username'] ?? 'notFound' ); ?></span
                        >
                      </p>
                      <p class="card-text">
                        Email:
                        <span id="profile-email"
                          ><?php echo htmlspecialchars($user['Email'] ?? 'notFound@gmail.com' ); ?></span
                        >
                      </p>
                      <p class="card-text">
                        Age:
                        <span id="profile-age"
                          ><?php echo htmlspecialchars($user['Birthday'] ?? 'notFound' ); ?></span
                        >
                      </p>
                      <p class="card-text">
                        Gender:
                        <span id="profile-gender"
                          ><?php echo htmlspecialchars($user['Gender'] ?? 'notFound' ); ?></span
                        >
                      </p>
                      <p class="card-text">
                        Phone:
                        <span id="profile-phone"
                          ><?php echo htmlspecialchars($user['Phone'] ?? 'notFound' ); ?></span
                        >
                      </p>
                    </div>
                    <span class="vr"></span>
                    <!-- Section Avatar -->
                    <div
                      class="d-flex flex-fill justify-content-center align-items-center"
                    >
                      <div>
                        <h5 class="card-title text-center">
                          <i class="fa-solid fa-user-astronaut"></i
                          >&nbsp;&nbsp;Avatar&nbsp;&nbsp;&nbsp;
                        </h5>
                        <img id="avatar" src="<?php echo htmlspecialchars("../img/avatar/".$user['Avatar_path'] ?? '../../assets/img/avatar/maleAvatar1.jpg'); ?>"
                        alt="User Avatar" class="rounded-circle" style=" height:
                        150px; width: 150px; border-radius: 50%; border: 3px
                        solid #bbb; " />
                      </div>
                    </div>
                  </div>
                  <a href="#" id="edit-profile-btn" class="btn btn-outline-dark"
                    >Edit Profile</a
                  >
                </div>
                <div id="profile-form" style="display: none">
                  <!-- Formulaire de modification du profil -->
                  <form onsubmit="return submitForm();" method="post" action="save_profile.php">
                    <p class="text-danger">ANY EMPTY FIELD WILL BE PERMANANTLY ERASED EXEPT FOR PASSWORD , AVATAR , PAYMENT INFORMATION !</p>
                    <div class="d-flex">
                      <div class="container">
                        <div class="row">
                          <div class="col-sm-5 col-md-6 mb-2 form-floating">
                            <input
                              type="text"
                              class="form-control"
                              style="background-color: whitesmoke"
                              id="floatingInput"
                              placeholder="Enter first name"
                              name="floatingInput"
                              value="<?php echo htmlspecialchars($user['First_name'] ?? ''); ?>"
                            />
                            <label for="floatingInput" class="ms-3">First Name</label>
                          </div>
                          <div class="col-sm-5 col-md-6 mb-2 form-floating">
                            <input
                              type="text"
                              class="form-control"
                              style="background-color: whitesmoke"
                              id="profileLastName"
                              placeholder="Enter last name"
                              name="profileLastName"
                              value="<?php echo htmlspecialchars($user['Last_Name'] ?? ''); ?>"
                            />
                            <label for="profileLastName" class="ms-3">Last Name</label>
                          </div>
                        </div>
                        <br />
                        <div class="row">
                          <div class="col-sm-5 col-md-6 mb-2 form-floating">
                            <input
                              type="text"
                              class="form-control"
                              style="background-color: whitesmoke"
                              id="profileUsername"
                              placeholder="Enter Username"
                              name="profileUsername"
                              value="<?php echo htmlspecialchars($user['Username'] ?? ''); ?>"
                            />
                            <label for="profileUsername" class="ms-3">Username</label>
                          </div>
                          <div class="col-sm-5 col-md-6 mb-2 form-floating">
                            <input
                              type="password"
                              class="form-control"
                              style="background-color: whitesmoke"
                              id="profilePassword"
                              placeholder="Enter new password"
                              name="profilePassword"
                              value=""
                            />
                            <label for="profilePassword" class="ms-3">Password</label>
                          </div>
                        </div>
                        <br />
                        <div class="row">
                          <div class="col-sm-5 col-md-6 mb-2 form-floating">
                            <input
                              type="text"
                              class="form-control"
                              style="background-color: whitesmoke"
                              id="profilePhone"
                              placeholder="Enter phone"
                              name="profilePhone"
                              value="<?php echo htmlspecialchars($user['Phone'] ?? ''); ?>"
                            />
                            <label for="profilePhone" class="ms-3">Phone</label>
                          </div>
                          <div class="col-sm-5 col-md-6 mb-2 form-floating">
                            <select
                              class="form-select"
                              id="profileGender"
                              style="background-color: whitesmoke"
                              name="profileGender"
                          
                            >
                              <option value="" <?php echo empty($user['Gender']) ? 'selected' : ''; ?>>Enter your gender</option>
                              <option value="M" <?php echo $user['Gender'] == 'M' ? 'selected' : ''; ?>>Male</option>
                              <option value="F" <?php echo $user['Gender'] == 'F' ? 'selected' : ''; ?>>Female</option>
                            </select>
                            <label for="profileGender" class="ms-3">Gender</label>
                          </div>
                        </div>
                        <br />
                        <div class="row">
                          <div class="col-sm-5 col-md-6 mb-2">
                            <div class="mb-2">
                              <label for="profileAge">Date of Birth</label>
                              <input
                                type="date"
                                class="form-control"
                                style="background-color: whitesmoke"
                                id="profileAge"
                                placeholder="Enter Date of Birth"
                                name="profileAge"
                                value="<?php echo htmlspecialchars($user['Birthday'] ?? ''); ?>"
                              />
                            </div>
                          </div>
                          <div class="col-sm-5 col-md-6 mb-2">
                              <div>
                                <!--Payment-->
                                <p>
                                  <i class="fa-solid fa-credit-card"></i>&nbsp;Payment
                                  Information
                                </p>

                                <div class="mb-2 form-floating">
                                  <input
                                    type="text"
                                    class="form-control"
                                    style="background-color: whitesmoke"
                                    id="cardNumber"
                                    name="cardNumber"
                                    placeholder="Enter card number"
                                    value=""
                                  />
                                  <label for="cardNumber" class="ms-2">Card Number</label>
                                </div>
                                <div class="row">
                                  <div class="col-md-8 form-floating">
                                    <input
                                      type="text"
                                      class="form-control"
                                      style="background-color: whitesmoke"
                                      id="expiryDate"
                                      name="expiryDate"
                                      placeholder="MM/YYYY"
                                      value=""
                                    />
                                    <label for="expiryDate" class="ms-3">Expiry Date</label>
                                  </div>
                                  <div class="col-md-4 form-floating">
                                    <input
                                      type="text"
                                      class="form-control"
                                      style="background-color: whitesmoke"
                                      id="cvv"
                                      name="cvv"
                                      placeholder="Enter CVV"
                                      value=""
                                    />
                                    <label for="cvv" class="ms-3">CVV</label>
                                  </div>
                                  <input
                                    type="hidden"
                                    id="payment_info"
                                    name="payment_info"
                                    value=""
                                  />
                                </div>
                              </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div id="AvatarFileUpload" class="col-sm-3 col-md-4 mb-2">
                            <!-- Section de téléchargement de l'avatar -->
                            <p>&nbsp;Avatar</p>
                            <div class="w-100 d-flex justify-content-center">
                              <img class="selected-image-holder" src="<?php echo htmlspecialchars("../img/avatar/".$user['Avatar_path'] ?? '../../assets/img/avatar/maleAvatar1.jpg'); ?>"
                              alt="AvatarInput" />


                            </div>
                          </div>
                          <div class="col-sm-4 col-md-8 mb-2">
                            <br />
                            <div class="avatar-selector">
                              <div id="label-container" class="">
                                <div class="row">
                                  <?php
                                    $avatarOptions = ['maleAvatar1.jpg', 'maleAvatar2.jpg', 'maleAvatar3.jpg', 'maleAvatar4.jpg'];
                                    foreach ($avatarOptions as $option) {
                                        $checked = ($user['Avatar_path'] ?? '') === $option ? 'checked' : '';
                                        echo '<div class="col-3 mb-2">'; // Adjust column size as needed
                                        echo '<input id="' . htmlspecialchars($option) . '" type="radio" name="avatar" value="' . htmlspecialchars($option) . '" ' . $checked . ' />';
                                        echo '<label for="' . htmlspecialchars($option) . '" class="check"><img src="../img/avatar/' . htmlspecialchars($option) . '" alt="Avatar" class="avatar" /></label>';
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="row">
                                  <?php
                                    $avatarOptions = ['femaleAvatar1.jpg', 'femaleAvatar2.jpg', 'femaleAvatar3.jpg', 'femaleAvatar4.jpg'];
                                    foreach ($avatarOptions as $option) {
                                        $checked = ($user['Avatar_path'] ?? '') === $option ? 'checked' : '';
                                        echo '<div class="col-3 mb-2">'; // Adjust column size as needed
                                        echo '<input id="' . htmlspecialchars($option) . '" type="radio" name="avatar" value="' . htmlspecialchars($option) . '" ' . $checked . ' />';
                                        echo '<label for="' . htmlspecialchars($option) . '" class="check"><img src="../img/avatar/' . htmlspecialchars($option) . '" alt="Avatar" class="avatar" /></label>';
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br />
                    <div class="d-flex justify-content-end">
                      <button
                        type="submit"
                        class="btn btn-outline-primary me-2"
                        style="width: 15%"
                      >
                        Save
                      </button>
                      <button
                        type="button"
                        id="cancel-edit-btn"
                        class="btn btn-outline-secondary"
                        style="width: 15%"
                      >
                        Cancel
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <script>
          document
            .getElementById("edit-profile-btn")
            .addEventListener("click", function (event) {
              event.preventDefault();
              document.getElementById("profile-display").style.display = "none";
              document.getElementById("profile-form").style.display = "block";
            });

          document
            .getElementById("cancel-edit-btn")
            .addEventListener("click", function () {
              document.getElementById("profile-display").style.display =
                "block";
              document.getElementById("profile-form").style.display = "none";
            });
        </script>

        <!-- Transaction Section -->
        <div id="Transaction" class="tabcontent container">
          <div class="card mt-4">
            <h5 class="card-title p-4 pb-0">Transaction History</h5>
            <div class="card-body">
              <!--<ul class="list-group" id="transaction-list">
                   Transactions will be dynamically added here
                 Exemple
                  <div class="card mt-4">
                    <div class="card-body text-white" style="
                    border-radius: 6px;
                    background-image: url(../../assets/img/Ticket.jpg);
                    background-repeat: no-repeat, repeat;
                    background-size: cover;">
                    <div style="
                      box-shadow: 0 0 16px 16px rgba(0, 0, 0, 0.5);
                      background-color: rgba(0, 0, 0, 0.5) !important;
                      border-color: rgba(0, 0, 0, 0.5);
                      padding: 15px !important;
                      border-radius: 25px !important;
                    ">
                      <div class="d-flex justify-content-between">
                        <p class="text-start">Ticket for : Table of Blackjack</p>
                        <p class="text-end">Ticket ID : 123456789</p>
                      </div>
                      <p>At the name of : FirstName LastName</p>
                      <p class="text-center">Seat Number : 12</p>
                      <p class="text-center">Room : 123</p>
                      <p class="text-center">25 $ for 1 seat</p>
                      <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-light">
                          Print Ticket
                        </button>
                      </div>
                    </div>
                  </div>
                </ul>-->

              <a href="../../page2.php" class="btn btn-outline-dark"
                >See transaction</a
              >
            </div>
          </div>
        </div>

        <!-- Account Actions -->
        <div id="Action" class="tabcontent">
          <div class="container card mt-4">
            <div class="card-body">
              <h5 class="card-title pb-0">Account Actions</h5>

              <a
                id="logout-account-btn"
                class="btn btn-danger"
                href="./logout.php"
                ><i class="fa fa-sign-out"></i>&nbsp;Sign Out</a
              >

              <div class="mt-5">
                <h5 class="card-title pb-0">Delete Account</h5>
                <p class="text-danger pb-2">
                  Warning: This action cannot be undone!
                </p>
                <a
                  type="button"
                  id="delete-account-btn"
                  class="btn btn-danger"
                  href="./delete_account.ph"
                >
                  <i class="fa-regular fa-trash-can" style="color: #ffffff"> </i
                  >&nbsp;Delete Account
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="bg-dark rye-regular text-white container-fluid py-4">
      <div class="container text-center">
        <div
          class="d-flex justify-content-around align-items-center flex-column flex-md-row fw-normal"
        >
          <div class="d-flex flex-column">
            <a
              href="./index.html"
              class="text-white px-5 footerlink link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
              >&middot;<span class="px-1">&nbsp;Home&nbsp;</span>&middot;</a
            >
            <a
              href="./index.html#Games"
              class="text-white px-5 footerlink link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
              >&middot;<span class="px-1">&nbsp;Games&nbsp;</span>&middot;</a
            >
          </div>
          <div class="d-flex flex-column">
            <a
              href="./booking.html"
              class="text-white px-5 footerlink link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
              >&middot;<span class="px-1">&nbsp;Book your ticket&nbsp;</span
              >&middot;</a
            >
            <a
              href="./index.html#Events"
              class="text-white px-5 footerlink link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
              >&middot;<span class="px-1">&nbsp;Events&nbsp;</span>&middot;</a
            >
          </div>
          <div class="d-flex flex-column">
            <a
              href="./help.html#JoinUs"
              class="text-white px-5 footerlink link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
              >&middot;<span class="px-1">&nbsp;Hiring&nbsp;</span>&middot;</a
            ><a
              href="./index.html#Resto"
              class="text-white px-5 footerlink link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
              >&middot;<span class="px-1">&nbsp;Dinners&nbsp;</span>&middot;</a
            >
          </div>
        </div>
        <br />
        <hr />
        <br />
        <section id="cta" class="container text-center">
          <div class="row">
            <!-- Call to Action -->
            <div class="col-5" style="margin: auto 0px">
              <div class="px-4">
                <h4 class="h5">Book your tickets on your phone Today !</h4>
                <br />
                <button
                  type="button"
                  class="btn btn-md btn-dark download-button"
                >
                  <i class="fab fa-apple"></i> Download
                </button>
                <button
                  type="button"
                  class="btn btn-md btn-light download-button"
                >
                  <i class="fab fa-google-play"></i> Download
                </button>
              </div>
            </div>
            <div class="col-3" id="locate">
              <h4 class="h5" style="text-align: start !important">
                <i class="fa-solid fa-location-dot"></i>&nbsp;Our Location
              </h4>
              <div class="d-flex">
                <div
                  style="
                    align-content: flex-start;
                    text-align: start !important;
                    margin: auto;
                    padding: auto;
                  "
                >
                  <p>123 Casino Street,</p>
                  <p>Las Vegas, NV 12345,</p>
                  <p>United States</p>
                </div>
              </div>
            </div>
            <!-- Location -->
            <div class="col-4">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18226.764954237453!2d-115.41360279102418!3d36.14057520648917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80beb782a4f57dd1%3A0x3accd5e6d5b379a3!2sLas%20Vegas%2C%20Nevada%2C%20%C3%89tats-Unis!5e0!3m2!1sfr!2slb!4v1716424253874!5m2!1sfr!2slb"
                width="100%"
                height="250"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>
        </section>

        <br />
        <hr />
        <div style="font-size: 14px">
          <p>&copy; 2024 Casino. All rights reserved.</p>
          <a
            href="./AboutUs.html#policy"
            class="text-white px-4 link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
            style="font-size: 12px"
            >&middot;<span class="px-1">&nbsp;Term of Use&nbsp;</span
            >&middot;</a
          >
          <a
            href="./help.html#Contact"
            class="text-white px-4 link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
            style="font-size: 12px !important"
            >&middot;<span class="px-1">&nbsp;Contact Us&nbsp;</span>&middot;</a
          >
        </div>
        <div
          style="display: flex; align-content: end; justify-content: flex-end"
        >
          <a
            href="facebook.com"
            id="sociallink"
            class="text-decoration-none text-light pe-2"
            ><i class="fa-brands fa-meta" style="color: #ffffff"></i>
          </a>
          <a
            href="twitter.com"
            id="sociallink"
            class="text-decoration-none text-light pe-2"
            ><i class="fa-brands fa-twitter" style="color: #ffffff"></i
          ></a>
          <a
            href="instagram.com"
            id="sociallink"
            class="text-decoration-none text-light pe-2"
            ><i class="fa-brands fa-instagram" style="color: #ffffff"></i
          ></a>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/profile.js"></script>

    <script>
      function submitForm() {
        // Get values from the input fields
        var cardNumber = document.getElementById("cardNumber").value;
        var expiryDate = document.getElementById("expiryDate").value;
        var cvv = document.getElementById("cvv").value;
        // Combine the values into one string
        var paymentInfo = cardNumber + "," + expiryDate + "," + cvv;
        // Set the combined value into the hidden input field
        document.getElementById("payment_info").value = paymentInfo;
        // Submit the form
        document.querySelector("form").submit();
       return true;
      }
    </script>
  </body>
</html>
