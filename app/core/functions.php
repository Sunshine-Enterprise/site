<?php

function query(string $query, array $data = []){

	$string = "mysql:hostname=".DBHOST.";dbname=". DBNAME;
    $con = new PDO($string, DBUSER, DBPASS);

    //-----------------------------
    $statement = $con->prepare($query);
    $statement->execute($data);

    //here we say collect all data and associate it
    // if result return array with data return it
    // else return false
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(is_array($result) && !empty($result))
	{
		return $result;
	}
	return false;
}




function query_row(string $query, array $data = []){

	$string = "mysql:hostname=".DBHOST.";dbname=". DBNAME;
    $con = new PDO($string, DBUSER, DBPASS);

    //-----------------------------
    $statement = $con->prepare($query);
    $statement->execute($data);

    //here we say collect all data and associate it
    // if result return array with data return it
    // else return false
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(is_array($result) && !empty($result))
	{
		return $result[0];
	}

	return false;
    }

    function authenticate($row)
    {
        $_SESSION['USER'] = $row;
    }

    function login_status()
    {
        if(!empty($_SESSION['USER']))
		return true;

	    return false;
    }

    function login_user()
    {
        if(!empty($_SESSION['candidate']))
		return true;

	return false;
    }

    function redirect($page){
        header('Location: '.ROUTE.'/'.$page);
        die;
    }

    function esc($str){
        return htmlspecialchars($str ?? '');
    }