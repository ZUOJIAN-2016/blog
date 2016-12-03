<?php
$title=$_POST['TITLE'];
$content=$_POST['CONTENT'];
$File_Edit=new Database_Options();
$File_Edit->Database_Connect();
if ($title&&$content)
{
    $File_Edit->Insert_Articles($title,$content);

}else
{
    echo '有字段为空！';
}
