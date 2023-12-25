<?php
require './config/database.php';

//destroy all session and redirect user tologin page
session_destroy();
header('location:'. ROOT_URL);
die();