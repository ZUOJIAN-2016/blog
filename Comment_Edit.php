<?php
$Comment=$_GET["Comment"];
$q=new Database_Options();
$q->Database_Connect();
$q->Insert_Comment($Comment);