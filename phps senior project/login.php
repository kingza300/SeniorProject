<?php 
    include 'conn.php';
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    if($data !== null){
        $id = $data['id'];
        $password = $data['pass'];
//jebna l id wl pass mn android studio la naamel fihon li badna ye
        $query = mysqli_query($connect, "SELECT * FROM `users` WHERE `userID` = '$id' AND `password` = '$password'");
        if(mysqli_num_rows($query)>0){
            $emparray = array();
            while($row = mysqli_fetch_assoc($query))
                $emparray[] = $row;

           echo(json_encode($emparray));
           mysqli_close($connect);
        }

    }else{
        http_response_code(400);
        echo "Invalid JSON data";
    }
?>
