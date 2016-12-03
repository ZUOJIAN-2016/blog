<?php
include_once ('Database_Options.php');
$Database_Option=new Database_Options();
$Keywords=$_GET['Keyword'];
if(!$Keywords)
{
    echo"<script>alert('请重新输入！');window.location.href='blog.html'</script>";
}
else
{
$Database_Option->Database_Connect();
    $Database_Option->Database_Search($Keywords);
}