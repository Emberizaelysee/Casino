<?php
session_start();
require_once 'connection.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

// Code pour les utilisateurs connectés
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css" />
    <!--font awesome cdn link-->
    <link
      href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
      rel="stylesheet"
    />
    <!--cdn for jquery to make button near search functional-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  </head>
  <body>
    <!--this html code for the menu bar-->
    <section id="menu">
      <div class="logo">
        <img src="admin_toolbar_logo_compressed.png" alt="" />
        <h2>Dynamic</h2>
      </div>
      <!--can't get the pics to show up on screen-->
      <div class="items">
        <li>
          <i class="fa fa-bar-chart" aria-hidden="true"></i
          ><a href="#">Dashboard</a>
        </li>
        <li>
          <i class="fa fa-cutlery" aria-hidden="true"></i
          ><a href="#">restaurant</a>
        </li>
        <li>
          <i class="fa fa-calendar" aria-hidden="true"></i
          ><a href="#">events calendar</a>
        </li>
        <li>
          <i class="fa fa-users" aria-hidden="true"></i><a href="#">Users</a>
        </li>
      </div>
    </section>
    <!--this is html code for interface-->
    <section id="interface">
      <div class="navigation">
        <div class="n1">
          <div>
            <i id="menu-btn" class="fas fa-bars"></i>
          </div>
          <div class="search">
            <i class="far fa-search"></i>
            <input type="text" placeholder="search" />
          </div>
        </div>
        <div class="profile">
          <i class="far fa-bell"></i>
          <img
            src="360_F_65756860_GUZwzOKNMUU3HldFoIA44qss7ZIrCG8I.jpg"
            alt=""
          />
        </div>
      </div>
      <h3 class="i-name">Dashboard</h3>
      <!--adding boxes in interface-->
      <div class="values">
        <div class="val-box">
          <i class="fa fa-users" aria-hidden="true"></i>
          <div>
            <h3>8,267</h3>
            <span>New Users</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fas fa-dollar-sign"></i>
          <div>
            <h3>$6778.89</h3>
            <span>this month</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fa-bar-chart"></i>
          <div>
            <h3>8,267</h3>
            <span>statistics</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fa fa-id-badge" aria-hidden="true"></i>
          <div>
            <h3>identification</h3>
            <span>employee id-badge</span>
          </div>
        </div>
      </div>
      <div class="board">
        <table width="100%">
          <thead>
            <tr>
              <td>Name</td>
              <td>Title</td>
              <td>Satus</td>
              <td>Role</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            <!---first table row -->
            <tr>
              <td class="people">
                <img src="user.png" alt="" />
                <div class="people-de">
                  <h5>jhon Doe</h5>
                  <p>jhone@example.com</p>
                </div>
              </td>
              <td class="people-des">
                <h5>Software Engineer</h5>
                <p>web dev</p>
              </td>
              <td class="active">
                <p>Active</p>
              </td>
              <td class="role">
                <p>Owner</p>
              </td>
              <td class="edit"><a href="#">Edit</a></td>
            </tr>
            <!---end of first table row-->
            <!--start of 2nd table row-->
            <tr>
              <td class="people">
                <img src="user.png" alt="" />
                <div class="people-de">
                  <h5>oliver james</h5>
                  <p>jhone@example.com</p>
                </div>
              </td>
              <td class="people-des">
                <h5>Software Engineer</h5>
                <p>web dev</p>
              </td>
              <td class="active">
                <p>Active</p>
              </td>
              <td class="role">
                <p>admin</p>
              </td>
              <td class="edit"><a href="#">Edit</a></td>
            </tr>
            <!--end of 2nd table row-->
            <!--start of 3rd table row-->
            <tr>
              <td class="people">
                <img src="user.png" alt="" />
                <div class="people-de">
                  <h5>james payne</h5>
                  <p>james@example.com</p>
                </div>
              </td>
              <td class="people-des">
                <h5>Software Engineer</h5>
                <p>web dev</p>
              </td>
              <td class="active">
                <p>Active</p>
              </td>
              <td class="role">
                <p>hr</p>
              </td>
              <td class="edit"><a href="#">Edit</a></td>
            </tr>
            <!--end-->
            <!--start-->
            <tr>
              <td class="people">
                <img src="user.png" alt="" />
                <div class="people-de">
                  <h5>Harry lewis</h5>
                  <p>harry@example.com</p>
                </div>
              </td>
              <td class="people-des">
                <h5>Software Engineer</h5>
                <p>web dev</p>
              </td>
              <td class="active">
                <p>Active</p>
              </td>
              <td class="role">
                <p>assistant</p>
              </td>
              <td class="edit"><a href="#">Edit</a></td>
            </tr>
            <!--end-->
            <!--start-->
            <tr>
              <td class="people">
                <img src="user.png" alt="" />
                <div class="people-de">
                  <h5>ethan minter</h5>
                  <p>ethan@example.com</p>
                </div>
              </td>
              <td class="people-des">
                <h5>Software Engineer</h5>
                <p>web dev</p>
              </td>
              <td class="active">
                <p>Active</p>
              </td>
              <td class="role">
                <p>manager</p>
              </td>
              <td class="edit"><a href="#">Edit</a></td>
            </tr>
            <!--end-->
          </tbody>
        </table>
      </div>
    </section>
  </body>
</html>

