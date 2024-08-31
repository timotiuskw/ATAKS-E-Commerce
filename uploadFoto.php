<?php
    function upload_foto($ft){     
        
        $target_dir = "img/";
        $target_file = $target_dir . basename($ft["name"]);//taget directory
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // $penjual=$_POST['tpenjual'];
        if (file_exists($target_file))
        {
            echo "<script type='text/javascript'>alert('Sorry, file already exists.');</script>";
            $uploadOk = 0;
        }

        if ($ft["size"] > 500000)
        {
            echo "<script type='text/javascript'>alert('Sorry, your file is too large.');</script>";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
        {
            echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
            $uploadOk = 0;
        }

        if ($uploadOk != 0)
        {
            if (move_uploaded_file($ft["tmp_name"], $target_file))
            {
                return true;
            } else
            {
                return false;
            }
        }
    }
?>