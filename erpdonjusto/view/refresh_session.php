<?php

/**
 * Project:  erpdonjusto_1_0_0_6 
 * File: refresh_session.php
 * Created on: May 12, 2021
 * Author: Leonardo
 */

session_start();
// store session data
if (isset($_SESSION['id'])){
$_SESSION['id'] = $_SESSION['id'];} // or if you have any algo.
echo $_SESSION['id'];
?>