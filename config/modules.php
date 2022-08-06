<?php 

    $baseUrl = "http://localhost/POQ/";

    function login($data,$conn){
        global $baseUrl;
        $idNumber = $data['id_number'];
        $password = $data['password'];
        $queryCekEmail = mysqli_query($conn,"SELECT * FROM users WHERE personal_number = '$idNumber'");
        $dataUsers = mysqli_fetch_assoc($queryCekEmail);
        if($dataUsers != null){
            $passwordDb = $dataUsers['password'];
            if($password == $passwordDb){
                $_SESSION['data_users'] = $dataUsers;
                $_SESSION['login'] = true;
                header("Location: " . $baseUrl.'dashboard');
                exit();
            }else{
                $_SESSION['message'] = "Mohon Maaf, Password yang anda masukan salah.";
                $_SESSION['status'] = "danger";
                header("Location: " . $baseUrl);
                exit();
            }
        }else{
            $_SESSION['message'] = "Mohon Maaf, ID yang anda masukan tidak terdaftar.";
            $_SESSION['status'] = "warning";
            header("Location: " . $baseUrl);
            exit();
        }
    }

    function create($data,$conn,$table){
        $column = "";
        $values = "";
        foreach($data as $index => $value){
            $column .= $index.",";   
            $values .= "'$value'".",";   
        }
        $lengthColumn = strlen($column);
        $lengthValues = strlen($values);
        $subStringColumn = substr($column,0,$lengthColumn-1);
        $subStringValues = substr($values,0,$lengthValues-1);
        $insert = "INSERT INTO $table ($subStringColumn) VALUES ($subStringValues) ";
        $execQuery = mysqli_query($conn,$insert);
        return $execQuery;
    }
    
    function update($data,$where,$table,$conn){
        $columnValue = "";
        $whereValue = "";
        foreach($data as $index => $value){
            $columnValue .= $index.'='."'$value'".',';
        }
        foreach($where as $index => $value){
            $whereValue .= $index.'='."'$value'";
        }
        $fixData = substr($columnValue,0,strlen($columnValue) -1);
        $update = "UPDATE $table SET $fixData WHERE $whereValue";
        $execQuery = mysqli_query($conn,$update);
        return $execQuery;
    }
    
    function delete($table,$where,$conn){
        $whereValue = "";
        foreach($where as $index => $value){
            $whereValue .= $index.'='."'$value'";
        }
        $delete = "DELETE FROM $table WHERE $whereValue";
        $execQuery = mysqli_query($conn,$delete);
        return $execQuery;
    }
    
    function readDataAllRow($conn,$query){
        $data =[];
        $execQuery = mysqli_query($conn,$query);
        while ($result = mysqli_fetch_assoc($execQuery)) {
            # code...
            $data[] = $result;
        }
        return $data;
    }
    
    function readDataPerRow($conn,$query){
        $execQuery = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($execQuery);
        return $data;
    }


    function Redirect($url, $permanent = false){
        // header('Location: ' . $url, true, $permanent ? 301 : 302);
        echo "<script>window.location.href = '$url';</script>";
        exit(0);
    }