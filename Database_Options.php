<?php
class Database_Options{
    private $conn;
    function conn()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new PDO("mysql:host=$servername;dbname=articles", $username, $password);
        return $conn;
    }//对conn的值进行输出
    function Database_Connect()
    {

        $conn=$this->conn();
        try {

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }//连接数据库的操作
    function Database_Search($string)
    {
        $conn=$this->conn();
        try{
            $SEARCH_TITLE = "SELECT*FROM ARTICLE WHERE TITLE LIKE '%[$string]%'";
        $SEARCH_ARTICLE = "SELECT*FROM ARTICLE WHERE CONTENT LIKE '%[$string]%'";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->query ($SEARCH_ARTICLE, $SEARCH_TITLE);

            if($row=$stmt->fetch())
            {
                echo 'TITLE:'.$row['TITLE'];
                echo 'CONTENT:'.$row['CONTENT'];
            }
            else
            {
                echo '没有您想要的信息！';
            }
            }
            catch(ErrorException $e)
            {
                echo "Error:".$e->getMessage();
            }

    }
    function Insert_Articles($title,$content){
        $conn=$this->conn();
        $sql="INSERT INTO AN_ARTICLE(TITLE CONTENT)VALUES($title,$content)";
       try
        {
            $conn->exec($sql);
            echo"<script>.alert('创建新文章成功！');window.location.href='View_New_Article.html'</script>";
        }catch(PDOException $e){
            echo "<script>.alert('创建失败！');window.lacation.href='Edit_New_Article.html'</script>";
        }
    }

}
function Insert_Comment($Comment){
    $conn=$this->conn();
    $sql="INSERT INTO AN_ARTICLE(Comments)VALUES($Comment)";
    try
    {
        $conn->exec($sql);
        echo"<script>.alert('评论成功！');window.location.href='View_New_Article.html'</script>";
    }catch(PDOException $e){
        echo "<script>.alert('即将返回！');window.lacation.href='Edit_New_Article.html'</script>";
    }
}
?>