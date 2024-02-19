<?php

Route::addRuta("/","views/loginview.php");
//Route::addRuta("/admin2/:nombre","admin/index/index.php");


Route::addRuta("/login","auth/login.php");
Route::addRuta("/recuperacion/:token","views/recuperacion.php");
Route::addRuta("/scannerqr","views/scannerqr.php");

