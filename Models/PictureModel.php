<?php


class PictureModel extends Model {

    public function setPicture(){
            if(isset($_FILES['photo']) && !empty($_FILES['photo']['tmp_name'])){
                $stmt = "INSERT INTO photos (title, url) VALUES (:title, :url)";
                $allowedValues = ['image/jpg','image/jpeg','image/png'];
                $photo = $_FILES['photo']['tmp_name'];
                $fileExtension = $_FILES['photo']['type'];
                if(in_array($fileExtension,$allowedValues)){
                    $photoFileName = "./assets/images/".md5(time()).'.png';
                    move_uploaded_file($photo,$photoFileName);
                    $prepare = $this->db->prepare($stmt);
                    $prepare->bindValue(":title",addslashes($_POST['title']),PDO::PARAM_STR);
                    $prepare->bindValue(":url",$photoFileName,PDO::PARAM_STR);
                    $prepare->execute();
                }else {
                    echo "foto invalida. cancelando upload!";
                    header("location: index.php");
                }
            }
        }

    public function getPictures(){
        $result = array();

        $result = $this->db->query("SELECT * FROM photos");
        if($result->rowCount() > 0){
            $result = $result->fetchAll();
        }
        return $result;
    }
}