<?php

    if(isset($viewData)){
        foreach($viewData as $picture){
            echo "<br> <h2>{$picture['title']}</h2><hr>";
            echo "<img src='{$picture['url']}' width='300' height='300'><br>";
        }
    }

?>
<form action="./index.php/" method="post" enctype="multipart/form-data">
<input type="text" name="title" id="">
<input type="file" name="photo" id="">
<button type="submit">send</button>
</form>