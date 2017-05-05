<?php session_start();?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="studentPanel.php">Panel Studenta</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#"><?php include 'ajax/showLoggedUserName.php';?></a></li>
      <li><a href="ajax/logout.php">Wyloguj</a></li>
    </ul>
  </div>
</nav>