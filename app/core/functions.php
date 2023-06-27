<?php
function coneccionMysql(string $query='select * from users'){
    try {
       $con = mysqli_connect('localhost', DBUSER, DBPASS, DBNAME);
     //  print('Conexion');       
       $result =  mysqli_query($con, $query);
        return $result;
        
    } catch (Exception $e) {
        print('$e');
    }

}

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


function download($file){
    header('Content-Type: application/pdf');
    header("Content-Disposition: attachment; filename=$file");
    header('Cache-Control: public');
    header('Content-Transfer-Encordeing: Binary');
    header('Content-Description: File Transfer');
    header('Accept-Ranges: bytes');
    readfile($file);
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

    function vuelve($valor)
    {
        if($valor = ''){
            redirect('login');
        }
    }

    function login_status()
    {
        if(!empty($_SESSION['USER']))
		return true;

	return false;
    }
    function redirect($page){
        header('Location: '.ROUTE.'/'.$page);
        die;
    }
    function style($page, $default=''){
        if($page == true){
            print(
                '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>'
            );
            }else{
                return $default;
            }
    }

    function old_value($key, $default = '')
    {
        if(!empty($_POST[$key])){
            return trim($_POST[$key]);
        }else{
            return $default;
        }

    }

    function old_checked($key, $default = '')
    {
        if(!empty($_POST[$key]))
        return " checked ";

        return $default;
    }

    function old_select($key, $value, $default = '')
    {
        if(!empty($_POST[$key]) && $_POST[$key] == $value)
        return " selected ";

        if($default == $value)
        return " selected ";
    
        return "";
    }
    function user($key = '')
    {
        if(!empty($_SESSION['USER'][$key])){
            return $_SESSION['USER'][$key];
        }
        return '';
    }

    function str_to_url($url)
{

   $url = str_replace("'", "", $url);
   $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
   $url = trim($url, "-");
   $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
   $url = strtolower($url);
   $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
   
   return $url;
}

  


    function get_pagination_vars(){
                
        //set pagination //
        $page_number = $_GET['page'] ?? 1;
        $page_number = empty($page_number) ? 1 : (int)$page_number;
        $page_number = $page_number < 1 ? 1 : $page_number;

        $current_link = $_GET['url'] ?? 'home';
        $current_link = ROUTE.'/'.$current_link;

        $query_string = "";

        foreach($_GET as $key => $value){

            if($key != 'url'){
                $query_string .= "&".$key."=".$value;
            }
        }

        if(!strstr($query_string, "page="))
        {
            $query_string .= "&page=".$page_number;

        }

        $query_string = trim($query_string,'&');
        $current_link .= '?'.$query_string;

        $current_link = preg_replace("/page=.*/", "page=".$page_number, $current_link);
        $next_link = preg_replace("/page=.*/", "page=".($page_number+1), $current_link);
        $first_link = preg_replace("/page=.*/", "page=1", $current_link);
        $prev_page_number = $page_number < 2 ? 1 : $page_number - 1;
        $prev_link = preg_replace("/page=.*/", "page=".$prev_page_number, $current_link);

        $result = ['current_link'=> $current_link,
        'next_link'=> $next_link,
        'prev_link'=> $prev_link,
        'first_link'=> $first_link,
        'page_number'=> $page_number
        ];
        
        return $result;
    }

?>

<?php

function showSharer($url, $message){
	//powered by https://sharingbuttons.io/
    ?>
    <h3>Share this:</h3>
    <!-- Sharingbutton Facebook -->
    <a class="resp-sharing-button__link btn btn-primary border-0 px-4" style="background-color: #3b5998;" href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode($url) ?>" target="_blank" rel="noopener" aria-label="Share on Facebook">
    <i class="fa fa-facebook-f"></i>
    </a>

    <!-- Sharingbutton Twitter -->
    <a class="resp-sharing-button__link btn btn-primary border-0 px-4" style="background-color: #55acee" href="https://twitter.com/intent/tweet/?text=<?php echo urlencode($message) ?>&amp;url=<?php echo urlencode($url) ?>" target="_blank" rel="noopener" aria-label="Share on Twitter">
      <i class="fa fa-twitter"></i>
    </a>
    
    <!-- Sharingbutton E-Mail -->
    <a class="resp-sharing-button__link btn btn-primary border-0 px-4" href="mailto:?subject=<?php echo urlencode($message) ?>&amp;body=<?php echo urlencode($url) ?>" target="_self" rel="noopener" aria-label="Share by E-Mail">
      <i class="fa fa-envelope"></i>  
    </a>
    
    <!-- Sharingbutton LinkedIn -->
    <a class="resp-sharing-button__link btn btn-primary border-0 px-4" style="background-color: #0082ca" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode($url) ?>&amp;title=<?php echo urlencode($message) ?>&amp;summary=<?php echo urlencode($message) ?>&amp;source=<?php echo urlencode($url) ?>" target="_blank" rel="noopener" aria-label="Share on LinkedIn">
      <i class="fa fa-linkedin"></i>        
    </a>
    
    <!-- Sharingbutton WhatsApp -->
    <a class="resp-sharing-button__link btn btn-primary border-0 px-4" style="background-color: #25d366" href="whatsapp://send?text=<?php echo urlencode($message) ?>%20<?php echo urlencode($url) ?>" target="_blank" rel="noopener" aria-label="Share on WhatsApp">
      <i class="fa fa-whatsapp"></i>    
    </a>

    <?php
}