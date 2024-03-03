<?php
session_start();
# Konek ke Web Server Lokal
$myHost	= "localhost";
$myUser	= "suba5806_subalitrans";
$myPass	= "subalitransmalang";
$myDbs	= "suba5806_subalitrans";

$koneksidb = mysqli_connect( $myHost, $myUser, $myPass, $myDbs);
if (! $koneksidb) {
  echo "Failed Connection !";
}

?>