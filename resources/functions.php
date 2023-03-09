<?php

$upload_directory = "uploads";


//==== Database helper functions ======//

/**** last_id function () ****/

function last_id() {
    
    global $connection;
    
    return mysqli_insert_id($connection);
}


/**** set_message function (for setting message to be displayed to user) ****/

function set_message($msg){
    
    if(!empty($msg)) {
        
        $_SESSION['message'] = $msg;
        
    } else {
        
        $msg = "";
    }
    
}


/**** display_message function (for showing notifications to users) ****/

function display_message() {
    
    if(isset($_SESSION['message'])) {
        
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        
    }
}


/**** redirect function (for sending user to a link) ****/

function redirect($location){
    
    header("Location: $location ");
    exit;
}


/**** query function () ****/

function query($sql) {
    
    global $connection;
    
    return mysqli_query($connection, $sql);
}


/**** confirm function (for validating data) ****/

function confirm($result){
    
    global $connection;
    
     if(!$result) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    
}


/**** escape_string function (security) ****/

function escape_string($string){
    
global $connection;

return mysqli_real_escape_string($connection, $string);
        
}


/**** fetch_array function (for fetching Data) ****/

function fetch_array($result){
    
return mysqli_fetch_array($result);
}


//==== End helper functions ======//


//==== General helpers ======//

function get_user_name(){

    
    return isset($_SESSION['username']) ? $_SESSION['username'] : null; 
        
    
    
}

function get_user_email(){

    
    return isset($_SESSION['email']) ? $_SESSION['email'] : null; 
        
    
    
}


function get_user_role(){

    
    return isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null; 
        
    
    
}

//==== End General helper ======//


//==== Authentication helper functions ======//


/**** Is Admin (for checking if user is admin) ****/

    function is_admin() {
        
        if(isLoggedIn()){
            $result = query("SELECT user_role FROM users WHERE user_id=".$_SESSION['user_id']."");
            $row = fetch_array($result);
        
        if($row['user_role'] == 'admin') {
            return true;
        } else {
            return false;
        }
        }
        return false;
        
    }
    
    
    
    
    /**** Is Editor (for checking if user is editor) ****/

    function is_editor() {
        
        if(isLoggedIn()){
            $result = query("SELECT user_role FROM users WHERE user_id=".$_SESSION['user_id']."");
            $row = fetch_array($result);
        
        if($row['user_role'] == 'editor') {
            return true;
        } else {
            return false;
        }
        }
        return false;
        
    }





/**** checkIfUserIsLoggedInAndRedirect Method (To check if user is logged in and send to a link) ****/

function checkIfUserIsLoggedInAndRedirect($redirectLocation){
    
    if(isLoggedIn()) {
        
        redirect($redirectLocation);
    }
    
}


//====  End Authentication helper functions ======//


//==== User Specific helper functions ======//


/**** function ****/

function get_all_user_order()  {
    
    $return = query("SELECT * FROM orders WHERE user_id=".loggedInUserId()."");
}




/**** ifItIs Method () ****/

function ifItIsMethod ($method=null) {
    
    if($_SERVER['REQUEST_METHOD']  == strtoupper($method)) {
        
        return true;
    }
    return false;
}




/**** Show Product ****/


function show_product() {

    
foreach ($_SESSION as $name => $value) {

if($value > 0 ) {

if(substr($name, 0, 8 ) == "product_") {
    
$length = strlen($name)  - 8;

$id = substr($name, 8 , $length);

$query = query("SELECT * FROM products WHERE product_id = " . escape_string($id). " ");
confirm($query);

while($row = fetch_array($query)) {
    
$sub = $row['product_price']*$value;
$item_quantity +=$value;
        
   $product_image = display_image($row['product_image']);
    
$product = <<<DELIMETER

<tr>
    <td>{$row['product_title']}<br>
    <img width='100' src='../../resources/{$product_image}'>
    
    
    </td>
    <td>&#8358;{$row['product_price']}</td>
    <td>{$value}</td>
    <td>&#8358;{$sub}</td>
           
</tr>  

<input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
<input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
<input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
<input type="hidden" name="quantity_{$quantity}" value="{$value}">


DELIMETER;
        
echo $product;


            }

    
         }
      }
   }
    
 }  
 
 
 
 
 
 function show_cart_product() {

    
foreach ($_SESSION as $name => $value) {

if($value > 0 ) {

if(substr($name, 0, 8 ) == "product_") {
    
$length = strlen($name)  - 8;

$id = substr($name, 8 , $length);

$query = query("SELECT * FROM products WHERE product_id = " . escape_string($id). " ");
confirm($query);

while($row = fetch_array($query)) {
    
$sub = $row['product_price']*$value;
$item_quantity +=$value;
        
   $product_image = display_image($row['product_image']);
    
$product_cart = <<<DELIMETER

<tr>
    <td>{$row['product_title']}<br>
    <img width='50' src='../../resources/{$product_image}'>  x {$value}
    
    
    
    <td>&#8358;{$sub}</td>
           
</tr>  

<input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
<input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
<input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
<input type="hidden" name="quantity_{$quantity}" value="{$value}">


DELIMETER;
        
echo $product_cart;


            }

    
         }
      }
   }
    
 }  





/**** isLoggedIn Method (To check if user is logged in) ****/

function isLoggedIn() {
    
    if(isset($_SESSION['user_role'])) {
        
        return true;
        
    } 
    return false;
    
}


function loggedInUserId(){
    if(isLoggedIn()){
        $result = query("SELECT * FROM users WHERE username='" . $_SESSION['username'] ."'");
        confirm($result);
        $user = mysqli_fetch_array($result);
        return mysqli_num_rows($result) >= 1 ? $user['user_id'] : false;
    }
    return false;

}

//==== End User Specific helper functions ======//



//==== FRONT END FUNCTIONS ======//

// Count Records

function count_all_records($table){
    return mysqli_num_rows(query('SELECT * FROM '.$table));
}

function count_records($result){
    return mysqli_num_rows(query($result));
}


function count_all_products_in_stock(){
    
    return mysqli_num_rows(query('SELECT * FROM products WHERE product_quantity >=1'));
    
}




//GET PRODUCTS

function get_products_with_pagination($perPage = "6"){
    
$rows = count_all_products_in_stock();



if(isset($_GET['page'])){
    
    $page = preg_replace('#[^0-9]#', '', $_GET['page']);
    
} else {
    
    $page = 1;
}




$lastPage = ceil($rows / $perPage) ;

if($page < 1) {
    
    $page = 1;
} elseif($page > $lastPage){
    
    $page = $lastPage;
    
}


$middleNumbers = '';

$sub1 = $page - 1;
$sub2 = $page - 2;
$add1 = $page + 1;
$add2 = $page + 2;

if($page == 1) {
    
    
    $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
    
    $middleNumbers .= '<li class="page-item"><a class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
    
    
    
    
    
    
} elseif ($page == $lastPage) {
    
    
    $middleNumbers .= '<li class="page-item"><a class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';
    
    $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
    
}elseif ($page > 2 && $page < ($lastPage -1)) {
    
    $middleNumbers .= '<li class="page-item"><a class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="'.$_SERVER['PHP_SELF'].'?page='.$sub2.'">' .$sub2. '</a></li>';
    
    $middleNumbers .= '<li class="page-item"><a class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';
    
    $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
    
    $middleNumbers .= '<li class="page-item"><a class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
    
    $middleNumbers .= '<li class="page-item"><a class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="'.$_SERVER['PHP_SELF'].'?page='.$add2.'">' .$add2. '</a></li>';
    
    
   
    
} elseif($page > 1 && $page < $lastPage) {
    
    
    
    $middleNumbers .= '<li class="page-item"><a class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';
    
    $middleNumbers .= '<li><a aria-current="page" class="z-10 px-3 py-2 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">' .$page. '</a></li>';
    
    $middleNumbers .= '<li class="page-item"><a class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>'; 
    
    
    
}


$limit = 'LIMIT '. ($page-1) * $perPage . ',' . $perPage;


$query2 = query("SELECT * FROM products WHERE product_quantity >= 1 ". $limit);
confirm($query2);


$outputPagination = "";


if($page != 1){
    
    $prev = $page - 1;
    
    $outputPagination .='<li>
      <a href="'.$_SERVER['PHP_SELF'].'?page='.$prev.'"class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
        <span class="sr-only">Previous</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
      </a>
    </li>';
}


$outputPagination .= $middleNumbers;




if($page != $lastPage) {
    $next = $page + 1;
    $outputPagination .='<li>
      <a href="'.$_SERVER['PHP_SELF'].'?page='.$next.'" class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
        <span class="sr-only">Next</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
      </a>
    </li>';
}




while($row = fetch_array($query2)) {

    $product_image =  display_image($row['product_image']);
    
    
$product = <<<DELIMETER





 <div class="w-80 bg-white shadow rounded mx-10 my-10 ">
    <div class="h-48 w-full bg-gray-200 flex flex-col justify-between p-4 bg-cover bg-center"  style="background-image: url('../resources/{$product_image}'); height:650; width:940;" >          
    <div class="flex justify-between">            
                  
    </div>          
    <div>        
        <span class="uppercase text-xs bg-green-50 p-0.5 border-green-500 border rounded text-green-700 font-medium select-none">available</span>
    </div>        
    </div>        
    <div class="p-4 flex flex-col items-center">          
        <p class="text-gray-400 font-light text-xs text-center">{$row['product_description']}</p> 
        <b><h1 class="text-gray-800 text-center mt-1"><a href="item/{$row['product_id']}">{$row['product_title']}</a></h1></>
    
         <a target="_blank" href="{$row['short_desc']}"><button class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50 mt-4 w-full flex items-center justify-center">Send Gift
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        </button></a>
       
        </div>
</div>

DELIMETER;
       
echo $product;
    
    }
    
//     echo "<nav aria-label='Page navigation example'>
//   <ul class='inline-flex items-center -space-x-px'>{$outputPagination}</ul></nav>";
    
}

//GET CATEGORIES

function get_categories(){
    $query = query("SELECT * FROM categories");
    confirm($query);
    
    while($row = fetch_array($query)) {

$categories_links = <<<DELIMETER

<a href='/app/category/{$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>

DELIMETER;
        
echo $categories_links;
    }
}

//GET CATEGORIES IN HOME

function get_categories_in_home(){
    $query = query("SELECT * FROM categories LIMIT 5");
    confirm($query);
    
    while($row = fetch_array($query)) {

$categories_links = <<<DELIMETER

<a href='/app/category/{$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>

DELIMETER;
        
echo $categories_links;
    }
}



//GET PRODUCTS IN CATEGORY PAGE

function get_products_in_cart_page(){
    
$query = query("SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']) . " AND product_quantity >= 1 ");
confirm($query);

while($row = fetch_array($query)) {

    $product_image =  display_image($row['product_image']);
    
$product = <<<DELIMETER
<div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img style="height:170px; width:150px;" src="/../resources/{$product_image}" alt="">
                    <div class="caption" style="overflow:scroll;">
                        <h3>{$row['product_title']}</h3>
                        <p>{$row['short_desc']}</p>
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> <a href="/app/item/{$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>


DELIMETER;
       
echo $product;
    
    }
    
}



//ADD PUSH NOTIFICATION

function pusher() {
    
if(isset($_POST['pusher'])) {

$push_notification = escape_string($_POST['push_notification']);
    
    if(empty($push_notification) || $push_notification == " ") {
        
        echo "<p class='bg-danger'>This Cannot Be Empty</p>";
        
    } else {
        

$insert_push = query("INSERT INTO push(push_notification,date) VALUES('{$push_notification}',Now()) ");
confirm($insert_push);
set_message("Push Notification Created");
    
        
        }
        
    }
    
}


//GET PUSH NOTIFICATION

function get_push() {

    
$push_query = query("SELECT * FROM push");
confirm($push_query);

while ($row = fetch_array($push_query)) {

$id = $row['id'];
$push_notification = $row['push_notification'];
$date = $row['date'];


$push = <<<DELIMETER

    <tr>
        <td>{$push_notification} <br>
            <i style="color:blue;">{$date}</i>
        </td>
        <td><a class="btn btn-danger" data-toggle="tooltipdelete" title="delete" href="index.php?delete_push_id={$row['id']}"><i class="fa-solid fa-xmark"></i></a></td>
    </tr>

DELIMETER;
    
    echo $push;
    
}
    
}



/**** Display Pusher ****/


function display_pusher() {

    
$pusher_query = query("SELECT * FROM push");
confirm($pusher_query);

while ($row = fetch_array($pusher_query)) {

$id = $row['id'];
$push_notification = $row['push_notification'];
$date = $row['date'];


$pusher = <<<DELIMETER

   
   <tr>
    <td>{$push_notification} <br>
        <i style="color:#839ffa;">{$date}</i>
        </td>
           
</tr>  
   
        

DELIMETER;
    
    echo $pusher;
    
}
    
}




//GET PRODUCTS IN SHOP PAGE

function get_products_in_shop_page() {
    
$query = query("SELECT * FROM products WHERE product_quantity >= 1 ");
confirm($query);

while($row = fetch_array($query)) {

    $product_image =  display_image($row['product_image']);
    
$product = <<<DELIMETER
<div class="col-md-3 col-sm-6 hero-feature col">
                <div class=" card h-100">
                    <img style="height:90px" src="../resources/{$product_image}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>{$row['short_desc']}</p>
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>


DELIMETER;
       
echo $product;
    
    }
    
}


//GET BLOGS

function get_blogs() {
    
$query = query("SELECT * FROM blogs");
confirm($query);

while($row = fetch_array($query)) {

    $blog_image =  display_image($row['blog_image']);
    
$blog = <<<DELIMETER
    
    

    
    
     <div class="col">
    <div class="card h-100" style="background-color:;">
      <img src="../resources/{$blog_image}" class="img card-img-top mx-auto d-block" alt="Avatar" style="height:150px;width:150px;" >
      <div class="card-body">
        <h3 class="card-title">{$row['blog_title']}</h3>
                        <p class="card-text">{$row['blog_desc']}</p>
                        <p><a href="blog.php?id={$row['blog_id']}" class="btn btn-primary">Read more</a>
                        </p>
      </div>
    </div>
  </div>
    

DELIMETER;
       
echo $blog;
    
    }
    
}






//GET BLOGS IN CLINIC PAGE

function get_blog_in_clinic() {
    
$query = query("SELECT * FROM blogs LIMIT 1");
confirm($query);

while($row = fetch_array($query)) {

    $blog_image =  display_image($row['blog_image']);
    
$blog = <<<DELIMETER
    
    

    
    
  
  
  <div class="row featurette">
      <div class="col-md-6 card" style="background-color:;">
        <h2 class="featurette-heading fw-normal lh-1">{$row['blog_title']}</h2>
        <p><span class="text-muted">{$row['blog_desc']}.</span></p>
        
        
        <p><a class="btn btn-primary" href="bloglist.php" target="_blank">Read More &raquo;</a></p>
      </div>
      
      <div class="col-md-6 card" style="background-color:#839ffa;">
       
        
        <img src="../resources/{$blog_image}" alt="" style="width:100%; height:100%;" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" loading="lazy">
        
        <!--<div class="mask">-->
                        
                      
        <!--            </div>-->

      </div>
    </div>
  
  
  
    

DELIMETER;
       
echo $blog;
    
    }
    
}









// Send Message

function send_message() {
    
    if(isset($_POST['submit'])) {
        
        
        $to         = "someEmailaddress@gmail.com";
        $from_name  = $_POST['name'];
        $subject    = $_POST['subject'];
        $email      = $_POST['email'];
        $message    = $_POST['message'];
        
        $headers = "From: {$from_name} {$email}";
        
        $result = mail($to, $subject, $message,$headers);
        
        if(!$result) {
            
            set_message("Sorry we could not send your message");
            redirect("contact.php");
            
        } else {
            
            set_message("Your Message has been sent");
            redirect("contact.php");
            
        }
        
    }
     
}


/******************************BACK END FUNCTIONS******************************/


/**** Admin Orders ****/

function display_orders() {

    
$query = query("SELECT * FROM orders");
confirm($query);
    
    
while($row = fetch_array($query)) {

$orders = <<<DELIMETER

<tr>
    <td>{$row['order_id']}</td>
    <td>{$row['order_amount']}</td>
    <td>{$row['order_transaction']}</td>
    <td>{$row['order_currency']}</td>
    <td>{$row['order_status']}</td>
    <td><a class="btn btn-danger" href="index.php?delete_order_id={$row['order_id']}"><i class="fa-solid fa-xmark"></i></a></td>
    
</tr>


DELIMETER;
    
echo $orders;
    
}

}


/**** Admin Orders in dashboard ****/

function display_orders_in_dashboard() {

    
$query = query("SELECT * FROM orders LIMIT 5");
confirm($query);
    
    
while($row = fetch_array($query)) {

$orders_in_dashboard = <<<DELIMETER

<tr>
    <td>{$row['order_id']}</td>
    <td>{$row['order_amount']}</td>
    <td>{$row['order_transaction']}</td>
    <td>{$row['order_currency']}</td>
    <td>{$row['order_status']}</td>
    
</tr>


DELIMETER;
    
echo $orders_in_dashboard;
    
}

}


/**** Admin Orders for Users ****/


function display_orders_for_users() {

    
$query = query("SELECT * FROM reports WHERE user=".$_SESSION['username']."");
confirm($query);
    
    
while($row = fetch_array($query)) {
    
    
$x = $row['product_price'];  
$y = $row['product_quantity'];
$date = $row['date'];
$z = $x * $y;


$product_image = display_image($row['product_image']);

$orders = <<<DELIMETER

<tr>
    <td><strong>{$row['product_title']}<br></strong>
    <img width='100' src='../../resources/{$product_image}'> <br>
    
    <small><span class="text-muted">QTY:</span></small> <b>{$row['product_quantity']} item(s)</b><br>
    
    <small><span class="text-muted">Total:</span></small> <b>&#8358;{$z} </b><br>
    
     <small><span class="text-muted">Order N<sup>o</sup>:</span> <b>{$row['report_id']}{$row['product_id']}{$row['order_id']}</b></small><br><br>
     
     <small><span class="text-muted">Delivery status:</span> <span style="background-color:#839ffa;"><b>ORDER PLACED</b></span></small><br>
     
    <i style="color:#839ffa;">On, {$date}</i>
    
    
    </td>
           
</tr>

DELIMETER;
    
echo $orders;
    
}

}



/**** Admin Orders for Users in dashboard ****/

function display_orders_for_users_in_dashboard() {

$query = query("SELECT * FROM orders WHERE user_id=".$_SESSION['user_id']." LIMIT 5");
confirm($query);
    
while($row = fetch_array($query)) {

$orders_in_dashboard = <<<DELIMETER

<tr>
    <td>{$row['order_id']}</td>
    <td>{$row['order_amount']}</td>
    <td>{$row['order_transaction']}</td>
    <td>{$row['order_currency']}</td>
    <td>{$row['order_status']}</td>
    
</tr>


DELIMETER;
    
echo $orders_in_dashboard;
    
}


}







/******************************* Admin Products Page *******************************/



function display_image($picture) {
    
    global $upload_directory;
    
    return $upload_directory . DS . $picture;
    
    
    
    
    
}


/**** Get Products In Admin Page ****/

function get_products_in_admin() {

$query = query("SELECT * FROM products");
confirm($query);

while($row = fetch_array($query)) {
    
$category = show_product_category_title($row['product_category_id']);
    
    
    
    $product_image =  display_image($row['product_image']);
        

$product = <<<DELIMETER

    <tr>
        <td>{$row['product_id']}</td>
        <td>{$row['product_title']} <br>
        <a href="index.php?edit_gift&id={$row['product_id']}"><img width='100' height='70' src="../../../resources/{$product_image}" alt="product image"></a>
        </td>
        <td>{$row['product_description']}</td>
        <td>{$row['short_desc']}</td>
        <td>{$row['product_quantity']}</td>
         <td><a class="btn btn-danger product_container" data-toggle="tooltipdelete" title="Delete" href="index.php?delete_gift_id={$row['product_id']}"><i class="fa-solid fa-xmark"></i></a></td>
    </tr>
        
DELIMETER;
       
echo $product;
    
    }

}


/**** Get Blogs In Admin Page ****/

function get_blogs_in_admin() {

$query = query("SELECT * FROM blogs");
confirm($query);

while($row = fetch_array($query)) {
    
    $blog_image =  display_image($row['blog_image']);
        

$blog = <<<DELIMETER

    <tr>
        <td>{$row['blog_title']} <br>
        <a href="index.php?edit_blog&id={$row['blog_id']}"><img width='80' height='60' src="../../../resources/{$blog_image}" alt="blog image"></a>
        </td>
        <td>{$row['blog_desc']} </td>
        <td>{$row['blog_description']}</td>
         <td><a class="btn btn-danger blog_container" data-toggle="tooltipdelete" title="delete" href="index.php?delete_blog_id={$row['blog_id']}"><i class="fa-solid fa-xmark"></i></a></td>
    </tr>
        
DELIMETER;
       
echo $blog;
    
    }

}


/**** Show Products Categories Title ****/


function show_product_category_title($product_category_id) {
    
    
    $category_query = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}' ");   
    confirm($category_query);
    
    while($category_row = fetch_array($category_query)) {
        
        return $category_row['cat_title'];
        
        
    }
    
}




/**** Add Gift in Admin ****/

function add_gift() {
    
if(isset($_POST['publish'])) {
    
    
  $product_title            = escape_string($_POST['product_title']);
  $product_category_id      = escape_string($_POST['product_category_id']);
  $product_price            = escape_string($_POST['product_price']);
  $product_description      = escape_string($_POST['product_description']);
  $short_desc               = escape_string($_POST['short_desc']);
  $product_quantity         = escape_string($_POST['product_quantity']);
    
  $product_image            = escape_string($_FILES['file']['name']);
  $image_temp_location      = escape_string($_FILES['file']['tmp_name']);
    
  move_uploaded_file($image_temp_location , UPLOAD_DIRECTORY . DS . $product_image);
    
    
  $query = query("INSERT INTO products(product_title, product_category_id, product_price, product_description, short_desc, product_quantity, product_image) VALUES('{$product_title}', '{$product_category_id}', '{$product_price}', '{$product_description}', '{$short_desc}', '{$product_quantity}', '{$product_image}')");
    
    $last_id = last_id();
    confirm($query);
    
    set_message("New Gift with id {$last_id} was Added");
    redirect("index.php?gift");
    
    
}
    
}


//GET Editor Data

function get_editor() {
    
$query = query("SELECT * FROM users WHERE user_id=".$_SESSION['user_id']."");
confirm($query);
while($row = fetch_array($query)) {
if(is_editor() ) {
    
    
$username = $row['username'];
$username = ucwords($username);
 
    
$editor = <<<DELIMETER
  <h1 class="page-header">
                            
                           <small>Role: {$row['user_role']} </small> Welcome, $username
                        </h1>
  
DELIMETER;
 
echo $editor; 
}

}
}

/**** Add Blog in Admin ****/

function add_blog() {
    
if(isset($_POST['publish'])) {
    
    
  $blog_title            = escape_string($_POST['blog_title']);
  $blog_desc            = escape_string($_POST['blog_desc']);
  $blog_description      = escape_string($_POST['blog_description']);
    
  $blog_image            = escape_string($_FILES['file']['name']);
  $image_temp_location      = escape_string($_FILES['file']['tmp_name']);
    
  move_uploaded_file($image_temp_location , UPLOAD_DIRECTORY . DS . $blog_image);
    
    
  $query = query("INSERT INTO blogs(blog_title, blog_desc, blog_description, blog_image) VALUES('{$blog_title}', '{$blog_desc}', '{$blog_description}', '{$blog_image}')");
    
    $last_id = last_id();
    confirm($query);
    
    set_message("New Blog with id {$last_id} was Added");
    redirect("index.php?blogs");
    
    
    
}
    
}




//GET Staff in Front end

function get_staff() {
    
$query = query("SELECT * FROM staff_data");
confirm($query);

while($row = fetch_array($query)) {

    $staff_image =  display_image($row['staff_image']);
    
$staff = <<<DELIMETER
    
    <div class="col" >
    <div class="card h-100" style="background-color:;">
      <img src="../resources/{$staff_image}" class="img card-img-top mx-auto d-block" alt="Avatar" >
      <div class="card-body">
        <h5 class="card-title" style="color:;">{$row['staff_name']}</h5>
        <!--<p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>-->
        
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hamidah?id={$row['id']}">
  View Details
</button>

<!-- Modal -->
<div class="modal fade" id="hamidah?id={$row['id']}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{$row['staff_name']}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">{$row['staff_details']}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


      </div>
    </div>
  </div>


DELIMETER;
       
echo $staff;
    
    }
    
}




/**** Get Staff In Admin Page ****/

function get_staff_in_admin() {

$query = query("SELECT * FROM staff_data");
confirm($query);

while($row = fetch_array($query)) {
    
    
    $staff_image =  display_image($row['staff_image']);
        

$staff = <<<DELIMETER

    <tr>
        <td>{$row['staff_name']} <br>
        <a href="index.php?edit_staff&id={$row['id']}"><img width='100' height='70' src="../../../resources/{$staff_image}" alt="product image"></a>
        </td>
        <td>{$row['staff_details']}</td>
         <td><a class="btn btn-danger staff_container" data-toggle="tooltipdelete" title="Delete" href="index.php?delete_staff_id={$row['id']}"><i class="fa-solid fa-xmark"></i></a></td>
    </tr>
        
DELIMETER;
       
echo $staff;
    
    }

}






/**** Add Staff Data in Admin ****/

function add_staff() {
    
if(isset($_POST['add_staff'])) {
    
    
  $staff_name               = escape_string($_POST['staff_name']);
  $staff_details            = escape_string($_POST['staff_details']);
    
  $staff_image              = escape_string($_FILES['file']['name']);
  $image_temp_location      = escape_string($_FILES['file']['tmp_name']);
    
  move_uploaded_file($image_temp_location , UPLOAD_DIRECTORY . DS . $staff_image);
    
    
  $query = query("INSERT INTO staff_data(staff_name, staff_details, staff_image) VALUES('{$staff_name}', '{$staff_details}', '{$staff_image}')");
    
    confirm($query);
    
    set_message("New Staff Data has been Added");
    redirect("index.php?staff");
    
    
}
    
}



/**** Update Staff Page in Admin ****/


function update_staff() {
    
if(isset($_POST['update'])) {
    
    
  $staff_name            = escape_string($_POST['staff_name']);
  $staff_details      = escape_string($_POST['staff_details']);
    
  $staff_image            = escape_string($_FILES['file']['name']);
  $image_temp_location      = escape_string($_FILES['file']['tmp_name']);
    
    
    
    if(empty($staff_image)) {
        
        
        $get_pic = query("SELECT staff_image FROM staff_data WHERE id =" .escape_string($_GET['id']). "");
        confirm($get_pic);
        
        while($pic = fetch_array($get_pic)) {
            
            $staff_image = $pic['staff_image'];
            
        }
        
    }
    
    
    
  move_uploaded_file($image_temp_location , UPLOAD_DIRECTORY . DS . $staff_image);
    
    
$query  = "UPDATE staff_data SET ";
$query .= "staff_name             = '{$staff_name}'          , ";
$query .= "staff_details          = '{$staff_details}'    , ";
$query .= "staff_image          = '{$staff_image}'            ";
$query .= "WHERE id=" . escape_string($_GET['id']);

      
      
      
    $send_update_query = query($query);
    confirm($send_update_query);
    
    set_message("Staff Data has been updated");
    redirect("index.php?staff");
    
    
}
    
}


/**** Add About in Admin ****/

function about() {
    
if(isset($_POST['about_us'])) {
    
    
  $about_us               = escape_string($_POST['about']);
  
    
    
    
  $query = query("INSERT INTO about(about) VALUES('{$about_us}')");
    
    confirm($query);
    
    set_message("About Us Data has been Added");
    redirect("index.php?hwm");
    
    
}
    
}

/**** Add Groom in Admin ****/

function groom() {
    
if(isset($_POST['groom'])) {
    
    
  $olayinka               = escape_string($_POST['olayinka']);
  
    
    
    
  $query = query("INSERT INTO groom(olayinka) VALUES('{$olayinka}')");
    
    confirm($query);
    
    set_message("Groom Data has been Added");
    redirect("index.php?hwm");
    
    
}
    
}

//GET Groom

function get_groom() {

    
$groom_query = query("SELECT * FROM groom");
confirm($groom_query);

while ($row = fetch_array($groom_query)) {

$id = $row['id'];
$olayinka = $row['olayinka'];
$date = $row['date'];


$groom = <<<DELIMETER

    <tr>
        <td>{$olayinka} <br>
            <i style="color:blue;">{$date}</i>
        </td>
        <td><a class="btn btn-danger" data-toggle="tooltipdelete" title="delete" href="index.php?delete_groom_id={$row['id']}"><i class="fa-solid fa-xmark"></i></a></td>
    </tr>

DELIMETER;
    
    echo $groom;
    
}
    
}


//GET Groom in Front end

function get_groom_front() {
    
$query = query("SELECT * FROM groom");
confirm($query);

while($row = fetch_array($query)) {

    
$groom_front = <<<DELIMETER


   <p class="text-base text-gray-700 md:text-lg" style="text-align:center;">
    {$row['olayinka']}
    </p>

   

DELIMETER;
       
echo $groom_front;
    
    }
    
}

/**** Add Bride in Admin ****/

function bride() {
    
if(isset($_POST['bride'])) {
    
    
  $anuoluwa               = escape_string($_POST['anuoluwa']);
  
    
    
    
  $query = query("INSERT INTO bride(anuoluwa) VALUES('{$anuoluwa}')");
    
    confirm($query);
    
    set_message("Bride Data has been Added");
    redirect("index.php?hwm");
    
    
}
    
}


//GET Bride

function get_bride() {

    
$bride_query = query("SELECT * FROM bride");
confirm($bride_query);

while ($row = fetch_array($bride_query)) {

$id = $row['id'];
$anuoluwa = $row['anuoluwa'];
$date = $row['date'];


$bride = <<<DELIMETER

    <tr>
        <td>{$anuoluwa} <br>
            <i style="color:blue;">{$date}</i>
        </td>
        <td><a class="btn btn-danger" data-toggle="tooltipdelete" title="delete" href="index.php?delete_bride_id={$row['id']}"><i class="fa-solid fa-xmark"></i></a></td>
    </tr>

DELIMETER;
    
    echo $bride;
    
}
    
}


//GET Bride in Front end

function get_bride_front() {
    
$query = query("SELECT * FROM bride");
confirm($query);

while($row = fetch_array($query)) {

    
$groom_front = <<<DELIMETER


   <p class="text-base text-gray-700 md:text-lg" style="text-align:center;">
    {$row['anuoluwa']}
    </p>

   

DELIMETER;
       
echo $groom_front;
    
    }
    
}


//GET ABOUT US 

function get_about() {

    
$about_query = query("SELECT * FROM about");
confirm($about_query);

while ($row = fetch_array($about_query)) {

$id = $row['id'];
$about_us = $row['about'];
$date = $row['date'];


$about = <<<DELIMETER

    <tr>
        <td>{$about_us} <br>
            <i style="color:blue;">{$date}</i>
        </td>
        <td>
       
        <a class="btn btn-danger" data-toggle="tooltipdelete" title="delete" href="index.php?delete_about_id={$row['id']}">
            <i class="fa-solid fa-xmark" data-toggle="tooltipdelete" title="Delete"></i>
        </a>
        </td>
    </tr>

DELIMETER;
    
    echo $about;
    
}
    
}


//GET About Us in Front end

function get_about_front() {
    
$query = query("SELECT * FROM about");
confirm($query);

while($row = fetch_array($query)) {

    
$about = <<<DELIMETER


    <p style="text-align:center;">
    {$row['about']}
    </p>

   

DELIMETER;
       
echo $about;
    
    }
    
}



/**** Update About Page in Admin ****/


function update_about() {
    
if(isset($_POST['update'])) {
    
    
  $about            = escape_string($_POST['about']);

    
    
$query  = "UPDATE about SET ";
$query .= "about             = '{$about}'           ";
$query .= "WHERE id=" . escape_string($_GET['id']);

      
      
      
    $send_update_query = query($query);
    confirm($send_update_query);
    
    set_message("About Data has been updated");
    redirect("index.php?staff");
    
    
}
    
}






/**** Show Category in Products Page in Admin ****/



function show_categories_add_product_page(){
    $query = query("SELECT * FROM categories");
    confirm($query);
    
    while($row = fetch_array($query)) {

$categories_options = <<<DELIMETER

<option value="{$row['cat_id']}">{$row['cat_title']}</option>

DELIMETER;
        
echo $categories_options;
    }
}




/**** Update Products Page in Admin ****/


function update_product() {
    
if(isset($_POST['update'])) {
    
    
  $product_title            = escape_string($_POST['product_title']);
  $product_category_id      = escape_string($_POST['product_category_id']);
  $product_price            = escape_string($_POST['product_price']);
  $product_description      = escape_string($_POST['product_description']);
  $short_desc               = escape_string($_POST['short_desc']);
  $product_quantity         = escape_string($_POST['product_quantity']);
    
  $product_image            = escape_string($_FILES['file']['name']);
  $image_temp_location      = escape_string($_FILES['file']['tmp_name']);
    
    
    
    if(empty($product_image)) {
        
        
        $get_pic = query("SELECT product_image FROM products WHERE product_id =" .escape_string($_GET['id']). "");
        confirm($get_pic);
        
        while($pic = fetch_array($get_pic)) {
            
            $product_image = $pic['product_image'];
            
        }
        
    }
    
    
    
  move_uploaded_file($image_temp_location , UPLOAD_DIRECTORY . DS . $product_image);
    
    
$query  = "UPDATE products SET ";
$query .= "product_title          = '{$product_title}'          , ";
$query .= "product_category_id    = '{$product_category_id}'    , ";
$query .= "product_price          = '{$product_price}'          , ";
$query .= "product_description    = '{$product_description}'    , ";
$query .= "short_desc             = '{$short_desc}'             , ";
$query .= "product_quantity       = '{$product_quantity}'       , ";
$query .= "product_image          = '{$product_image}'            ";
$query .= "WHERE product_id=" . escape_string($_GET['id']);

      
      
      
    $send_update_query = query($query);
    confirm($send_update_query);
    
    set_message("Product has been updated");
    redirect("index.php?gift");
    
    
}
    
}



/**** Categories Page in Admin ****/

function show_categories_in_admin() {

    
$category_query = query("SELECT * FROM categories");
confirm($category_query);

while ($row = fetch_array($category_query)) {

$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];


$category = <<<DELIMETER

    <tr>
        <td>{$cat_title}</td>
        <td><a class="btn btn-danger category_container" data-toggle="tooltipdelete" title="Delete" href="index.php?delete_category_id={$row['cat_id']}"><i class="fa-solid fa-xmark"></i></a></td>
    </tr>

DELIMETER;
    
    echo $category;
    
}
    
}


/**** Add To Categories in Admin ****/


function add_category() {
    
if(isset($_POST['add_category'])) {

$cat_title = escape_string($_POST['cat_title']);
    
    if(empty($cat_title) || $cat_title == " ") {
        
        echo "<p class='bg-danger'>This Cannot Be Empty</p>";
        
    } else {
        

$insert_cat = query("INSERT INTO categories(cat_title) VALUES('{$cat_title}') ");
confirm($insert_cat);
set_message("Category Created");
    
        
        }
        
    }
    
}



/**** Users in Admin ****/


function display_users() {

    
$user_query = query("SELECT * FROM users");
confirm($user_query);

while ($row = fetch_array($user_query)) {

$user_id = $row['user_id'];
$username = $row['username'];
$email = $row['email'];
$user_firstname = $row['user_firstname'];
$user_lastname = $row['user_lastname'];
$user_role = $row['user_role'];



$user = <<<DELIMETER

    <tr>
        <td>{$username}</td>
        <td>{$email}</td>
        <td>{$user_firstname}</td>
        <td>{$user_lastname}</td>
        <td>{$user_role}</td>
        
        <td><a href="index.php?edit_guest&id={$row['user_id']}" class="btn" style="color:#fff;background-color:#FFD700;border-color:##D1B000;"><i class="bi bi-pencil-square" data-toggle="tooltipedit" title="Edit"></i></a></td>
        <td><a href="index.php?delete_guest_id={$row['user_id']}" class="btn btn-danger user_container" data-toggle="tooltipdelete" title="Delete"><i class="fa-solid fa-xmark"></i></a></td>
        
    </tr>

DELIMETER;
    
    echo $user;
    
}
    
}




/**** Users Personal Data in Admin ****/


function display_user() {

    
$user_query = query("SELECT * FROM users WHERE user_id = $_SESSION[user_id]");
confirm($user_query);

while ($row = fetch_array($user_query)) {

$user_id = $row['user_id'];
$username = $row['username'];
$email = $row['email'];
$user_firstname = $row['user_firstname'];
$user_lastname = $row['user_lastname'];



$user = <<<DELIMETER

    <tr>
        
        <td>{$username}</td>
        <td>{$email}</td>
        <td>{$user_firstname}</td>
        <td>{$user_lastname}</td>
       
        <td><a href="index.php?edit_profile&id={$row['user_id']}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a></td>
        
        
    </tr>

DELIMETER;
    
    echo $user;
    
}
    
}

/**** Delete Personal Data in Admin ****/


function delete_user() {

    
$user_query = query("SELECT * FROM users WHERE user_id = $_SESSION[user_id]");
confirm($user_query);

while ($row = fetch_array($user_query)) {

$user_id = $row['user_id'];

$delete_user = <<<DELIMETER

    <a href="index.php?delete_personal_user_id={$row['user_id']}" class="btn btn-danger text-center" style="justify-content:center;width:100%">CLOSE MY ACCOUNT</a>
    
DELIMETER;
    
    echo $delete_user;
    
}
    
}




/**** Add Address in Admin ****/

function add_addy() {
    
if(isset($_POST['publish'])) {
    
    
  $delivery_addy            = escape_string($_POST['delivery_addy']);
  $delivery_phone           = escape_string($_POST['delivery_phone']);
  $location                  = escape_string($_POST['location']);
  $user_id                  = escape_string($_POST['user_id']);
  
    
  $query = query("INSERT INTO delivery(delivery_addy, delivery_phone, location, user_id) VALUES('{$delivery_addy}', '{$delivery_phone}', '{$location}', $_SESSION[user_id])");
    
    confirm($query);
    
    set_message("New Address has Added");
    redirect("index.php?profile");
    
    
    
}
    
}




/**** Users Personal Address in Admin ****/


function display_user_addy() {

    
$user_query = query("SELECT * FROM delivery WHERE user_id = $_SESSION[user_id]");
confirm($user_query);

while ($row = fetch_array($user_query)) {

$delivery_id = $row['delivery_id'];
$delivery_addy = $row['delivery_addy'];
$delivery_phone = $row['delivery_phone'];
$location = $row['location'];


$delivery = <<<DELIMETER

    <tr>
        <td>{$delivery_addy}</td>
        <td>{$delivery_phone}</td>
        <td>{$location}</td>
       
        <td><a href="index.php?edit_address&id={$row['delivery_id']}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a></td>
        
        <td><a href="index.php?delete_address_id={$row['delivery_id']}" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></a></td>
    </tr>

DELIMETER;
    
    echo $delivery;
    
}
    
}





/**** Users Personal Address in Admin ****/


function display_user_address() {

    
$user_addy_query = query("SELECT * FROM delivery WHERE user_id={$_GET['id']}");
confirm($user_addy_query);

while ($row = fetch_array($user_addy_query)) {

$delivery_id = $row['delivery_id'];
$delivery_addy = $row['delivery_addy'];
$delivery_phone = $row['delivery_phone'];
$delivery_location = $row['location'];
$user_id = $row['user_id'];


$delivery = <<<DELIMETER

    <tr>
        <td>{$delivery_addy}</td>
        <td>{$delivery_phone}</td>
        <td>{$delivery_location}</td>
        
    </tr>
    
   

DELIMETER;
    
    echo $delivery;
    
}

    
}



/**** Delivery in Admin ****/


function display_delivery() {

    
$user_addy_query = query("SELECT * FROM delivery");
confirm($user_addy_query);

while ($row = fetch_array($user_addy_query)) {

$delivery_id = $row['delivery_id'];
$fname = $row['fname'];
$lname = $row['lname'];
$delivery_addy = $row['delivery_addy'];
$delivery_addy2 = $row['delivery_addy2'];
$city = $row['city'];
$state = $row['state'];
$zip = $row['zip'];
$delivery_phone = $row['delivery_phone'];
$email = $row['email'];
$delivery_location = $row['location'];
$user_id = $row['user_id'];
$receipt_image =  display_image($row['receipt']);



$delivery = <<<DELIMETER

    <tr>
        <td>{$fname}</td>
        <td>{$lname}</td>
        <td>{$delivery_addy}</td>
        <td>{$delivery_addy2}</td>
        <td>{$city}</td>
        <td>{$state}</td>
        <td>{$zip}</td>
        <td>{$delivery_phone}</td>
        <td>{$email}</td>
        <td><img width='100' height='100' src="../../../resources/{$receipt_image}" class="zoom" alt="receipt image"></td>
        
    </tr>
    
   

DELIMETER;
    
    echo $delivery;
    
}

    
}



/**** Get Shipping In Payment Page ****/

function get_logistics() {

$query = query("SELECT location FROM delivery WHERE user_id = $_SESSION[user_id]");
confirm($query);

while($row = fetch_array($query)) {
    
$logistics = <<<DELIMETER

    <tr class="shipping">
        <th>Shipping and Handling</th>
        <td>
        
        <strong>{$row['location']}</strong>
        
        </td>
    </tr>
        
DELIMETER;
       
echo $logistics;
    
    }

}



/**** Users Personal Receipt in Admin ****/


function display_user_receipt() {

    
$user_receipt_query = query("SELECT * FROM receipt WHERE user_id={$_GET['id']}");
confirm($user_receipt_query);

while ($row = fetch_array($user_receipt_query)) {
    
$receipt_image =  display_image($row['receipt']);

$receipt_id = $row['receipt_id'];
$receipt = $row['receipt'];
$user_id = $row['user_id'];
$username = $row['username'];


$receipt = <<<DELIMETER

    <tr>
        <td>{$receipt_id}</td>
        
        <td><img width='100' height='100' src="../../../resources/{$receipt_image}" class="zoom" alt="receipt image">
        </td>
        <td>{$user_id}</td>
        <td>{$username}</td>
        
    </tr>

DELIMETER;
    
    echo $receipt;
    
}
    
}




/**** Update Delivery Page in User ****/


function update_delivery() {
    
if(isset($_POST['update'])) {
    
    
$delivery_addy                 = escape_string($_POST['delivery_addy']);
$delivery_phone                = escape_string($_POST['delivery_phone']);
$location                      = escape_string($_POST['location']);

   
$query  = "UPDATE delivery SET ";
$query .= "delivery_addy        = '{$delivery_addy}'                , ";
$query .= "delivery_phone       = '{$delivery_phone}'               , ";
$query .= "location             = '{$location}'                       ";
$query .= "WHERE user_id=" . $_SESSION['user_id'];

      
      
      
      $send_update_delivery_query = query($query);
      
    confirm($send_update_delivery_query);
    
    set_message("Address has been updated");
    redirect("index.php?profile");
    
    
}
}



/**** Update Users Page in Admin ****/


function update_user_onboard() {
    
if(isset($_POST['update'])) {
    
    
$username                 = escape_string($_POST['username']);
$email                    = escape_string($_POST['email']);
$password                 = escape_string($_POST['password']);
$user_firstname           = escape_string($_POST['user_firstname']);
$user_lastname            = escape_string($_POST['user_lastname']);
$user_role                = escape_string($_POST['user_role']);

    

    $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 10) );
   
$query  = "UPDATE users SET ";
$query .= "username          = '{$username}'                , ";
$query .= "email             = '{$email}'                   , ";
$query .= "password          = '{$password}'                , ";
$query .= "user_firstname    = '{$user_firstname}'          , ";
$query .= "user_lastname     = '{$user_lastname}'           , ";
$query .= "user_role         = '{$user_role}'                 ";
$query .= "WHERE user_id=" . escape_string($_GET['id']);

      
      
      
      $send_update_user_query = query($query);
      
    confirm($send_update_user_query);
    
    set_message("We are pleased to have you");
    redirect("index.php?info");
    
    
}
    
}


/**** Update Users Page in Admin ****/


function update_user() {
    
if(isset($_POST['update'])) {
    
    
$username                 = escape_string($_POST['username']);
$email                    = escape_string($_POST['email']);
$password                 = escape_string($_POST['password']);
$user_firstname           = escape_string($_POST['user_firstname']);
$user_lastname            = escape_string($_POST['user_lastname']);
$user_role                = escape_string($_POST['user_role']);

    

    $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 10) );
   
$query  = "UPDATE users SET ";
$query .= "username          = '{$username}'                , ";
$query .= "email             = '{$email}'                   , ";
$query .= "password          = '{$password}'                , ";
$query .= "user_firstname    = '{$user_firstname}'          , ";
$query .= "user_lastname     = '{$user_lastname}'           , ";
$query .= "user_role         = '{$user_role}'                 ";
$query .= "WHERE user_id=" . escape_string($_GET['id']);

      
      
      
      $send_update_user_query = query($query);
      
    confirm($send_update_user_query);
    
    set_message("User has been updated");
    redirect("index.php?guest");
    
    
}
    
}


/**** Update Profile Page in Admin ****/


function update_profile() {
    
if(isset($_POST['update'])) {
    
    
$username                 = escape_string($_POST['username']);
$email                    = escape_string($_POST['email']);
$password                 = escape_string($_POST['password']);
$user_firstname           = escape_string($_POST['user_firstname']);
$user_lastname            = escape_string($_POST['user_lastname']);
$user_role                = escape_string($_POST['user_role']);

    

    $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 10) );
   
$query  = "UPDATE users SET ";
$query .= "username          = '{$username}'                , ";
$query .= "email             = '{$email}'                   , ";
$query .= "password          = '{$password}'                , ";
$query .= "user_firstname    = '{$user_firstname}'          , ";
$query .= "user_lastname     = '{$user_lastname}'           , ";
$query .= "user_role         = 'subscriber'                 ";
$query .= "WHERE user_id=" . escape_string($_GET['id']);

      
      
      
      $send_update_user_query = query($query);
      
    confirm($send_update_user_query);
    
    set_message("Your Profile has been updated");
    redirect("index.php?profile");
    
    
}
    
}



/**** Add Timeline in Admin ****/

function timeline() {
    
if(isset($_POST['timeline'])) {
    
    
  $timeline_year        = escape_string($_POST['timeline_year']);
  $title1               = escape_string($_POST['title1']);
  $body1                = escape_string($_POST['body1']);
  $title2               = escape_string($_POST['title2']);
  $body2                = escape_string($_POST['body2']);
  
    
    
    
  $query = query("INSERT INTO timeline(timeline_year,title1,body1,title2,body2) VALUES('{$timeline_year}','{$title1}','{$body1}','{$title2}','{$body2}')");
    
    confirm($query);
    
    set_message("Timeline Data has been Added");
    redirect("index.php?admin_timeline");
    
    
}
    
}



/**** Timeline in Admin ****/


function display_timeline() {

    
$timeline_query = query("SELECT * FROM timeline");
confirm($timeline_query);

while ($row = fetch_array($timeline_query)) {

$id = $row['id'];
$timeline_year = $row['timeline_year'];
$title1 = $row['title1'];
$body1 = $row['body1'];
$title2 = $row['title2'];
$body2 = $row['body2'];



$timeline = <<<DELIMETER

    <tr>
        <td>{$timeline_year}</td>
        <td>{$title1}</td>
        <td>{$body1}</td>
        <td>{$title2}</td>
        <td>{$body2}</td>
        
       
        <td><a href="index.php?delete_timeline_id={$row['id']}" class="btn btn-danger user_container" data-toggle="tooltipdelete" title="Delete"><i class="fa-solid fa-xmark"></i></a></td>
        
    </tr>

DELIMETER;
    
    echo $timeline;
    
}
    
}

/**** Display Timeline for User ****/


function display_timeline_user() {

    
$timeline_query = query("SELECT * FROM timeline");
confirm($timeline_query);

while ($row = fetch_array($timeline_query)) {

$id = $row['id'];
$timeline_year = $row['timeline_year'];
$title1 = $row['title1'];
$body1 = $row['body1'];
$title2 = $row['title2'];
$body2 = $row['body2'];

$timeline = <<<DELIMETER

   
   
   <!-- Single Timeline Content-->
                    <div class="single-timeline-area">
                        <div class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                            <p>{$timeline_year}</p>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="single-timeline-content d-flex wow fadeInLeft" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                    <div class="timeline-icon"><i class="fa fa-address-card" aria-hidden="true"></i></div>
                                    <div class="timeline-text">
                                        <h6>{$title1}</h6>
                                        <p>{$body1}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="single-timeline-content d-flex wow fadeInLeft" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
                                    <div class="timeline-icon"><i class="fa fa-archive" aria-hidden="true"></i></div>
                                    <div class="timeline-text">
                                        <h6>{$title2}</h6>
                                        <p>{$body2}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

DELIMETER;
    
    echo $timeline;
    
}
    
}




/**** Contact in Admin ****/


function display_contact() {

    
$contact_query = query("SELECT * FROM contact");
confirm($contact_query);

while ($row = fetch_array($contact_query)) {

$id = $row['id'];
$name = $row['name'];
$email = $row['email'];
$subject = $row['subject'];
$message = $row['message'];



$contact = <<<DELIMETER

    <tr>
        
        <td>{$name}</td>
        <td>{$email}</td>
        <td>{$message}</td>
        <td><a class="btn btn-danger contact_container" data-toggle="tooltipdelete" title="Delete" href="index.php?delete_contact_id={$row['id']}"><i class="fa-solid fa-xmark"></i></a></td>
    </tr>

DELIMETER;
    
    echo $contact;
    
}
    
}


/**** Add To Users in Admin ****/

function add_user() {
    
    if(isset($_POST['add_user'])) {
        
       $username    = escape_string($_POST['username']);
        $email      = escape_string($_POST['email']);
        $user_role   = escape_string($_POST['user_role']);
        $password   = escape_string($_POST['password']);
        
//        $user_photo = escape_string($_FILES['file']['name']);
//        $photo_temp = escape_string($_FILES['file']['tmp_name']);
//        
//        
//        move_uploaded_file($photo_temp, UPLOAD_DIRECTORY . DS . $user_photo);
        
        $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 10) );
        
        $query = query("INSERT INTO users(username,email,user_role,password) VALUES('{$username}','{$email}','{$user_role}','{$password}') ");
        confirm($query);
        
        set_message("User Created");
        
        redirect("index.php?users");
        
    }
    
}


/**** Add Users in Admin ****/

function register_user_in_admin($username,$email,$user_firstname,$user_lastname,$password,$user_role) {
    
            global $connection;
            
            
        
        
        
            $username = mysqli_real_escape_string($connection, $username);
            $email = mysqli_real_escape_string($connection, $email);
            $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
            $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
            $password = mysqli_real_escape_string($connection, $password);
            $user_role = mysqli_real_escape_string($connection, $user_role);
            
            
            $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12) );
            
            $query = "INSERT INTO users (username, email, user_firstname, user_lastname, password, user_role) ";
            $query .= "VALUES('{$username}','{$email}','{$user_firstname}', '{$user_lastname}', '{$password}', '{$user_role}' )"; 
            
             $register_user_in_admin_query = mysqli_query($connection, $query);
            
          confirm($register_user_in_admin_query);
        
        

    
}


/**** Register Users ****/

function register_user($email) {
    
            global $connection;
            
            
            $email = mysqli_real_escape_string($connection, $email);
            
           
            
            $query = "INSERT INTO users (email, user_role) ";
            $query .= "VALUES('{$email}', 'subscriber' )"; 
            
             $register_user_query = mysqli_query($connection, $query);
            
          confirm($register_user_query);
        
    
}



/******************************* Login Users *******************************/

function login_user_reg($email){
    
    
                    global $connection;
                    
                    $email = trim($email);
                    
                    $email = mysqli_real_escape_string($connection, $email);
                   

                    $query = "SELECT * FROM users WHERE email = '{$email}' ";
                    $select_user_query = mysqli_query($connection, $query);
                    
                    if(!$select_user_query) {
                        die("QUERY FAILED". mysqli_error($connection));
                        
                    }
                    
                      while($row = mysqli_fetch_array($select_user_query)) {
                          
                          
                        $db_user_id = $row['user_id'];
                        $db_email = $row['email'];
                        $db_password = $row['password'];
                        $db_fisrtname = $row['user_firtname'];
                        $db_lastname = $row['user_lastname'];
                        $db_user_role = $row['user_role'];
                        
                         if($select_user_query) {
                            
                            $_SESSION['user_id'] = $db_user_id;
                            $_SESSION['username'] = $db_username;
                            $_SESSION['email'] = $db_email;
                            $_SESSION['user_firstname'] = $db_firstname;
                            $_SESSION['$lastname'] = $db_lastname;
                            $_SESSION['user_role'] = $db_user_role;
                        
                        redirect("admin/index.php?onboard&id={$row['user_id']}");
                    } else {
                        set_message("Email or Password Incorrect");
                        return false;
                        
                    }
                        
                        
                    }
                    
               return true;    
                
}



function login_user($email, $password){
    
    
                    global $connection;
                    
                    $email = trim($email);
                    $password = trim($password);
                    
                    $email = mysqli_real_escape_string($connection, $email);
                    $password = mysqli_real_escape_string($connection, $password);

                    $query = "SELECT * FROM users WHERE email = '{$email}' ";
                    $select_user_query = mysqli_query($connection, $query);
                    
                    if(!$select_user_query) {
                        die("QUERY FAILED". mysqli_error($connection));
                        
                    }
                    
                      while($row = mysqli_fetch_array($select_user_query)) {
                          
                          
                        $db_user_id = $row['user_id'];
                        $db_email = $row['email'];
                        $db_password = $row['password'];
                        $db_fisrtname = $row['user_firtname'];
                        $db_lastname = $row['user_lastname'];
                        $db_user_role = $row['user_role'];
                        
                         if(password_verify($password,$db_password)) {
                            
                            $_SESSION['user_id'] = $db_user_id;
                            $_SESSION['username'] = $db_username;
                            $_SESSION['email'] = $db_email;
                            $_SESSION['user_firstname'] = $db_firstname;
                            $_SESSION['$lastname'] = $db_lastname;
                            $_SESSION['user_role'] = $db_user_role;
                        
                        redirect("admin/");
                    } else {
                        set_message("Username or Password Incorrect");
                        return false;
                        
                    }
                        
                        
                    }
                    
               return true;    
                
}






function add_email() {
    
    if(isset($_POST['add_email'])) {
        
        $username       = escape_string($_POST['username']);
        $email          = escape_string($_POST['email']);
        
        
        $query = query("INSERT INTO users(username,email) VALUES('{$username}','{$email}') ");
        confirm($query);
        
        set_message("User Added");
        
    }
    
}


function add_contact() {
    
    if(isset($_POST['add_contact'])) {
        
        $name           = escape_string($_POST['name']);
        $email          = escape_string($_POST['email']);
        $subject       = escape_string($_POST['subject']);
        $message       = escape_string($_POST['message']);
        
        
        $query = query("INSERT INTO contact(name,email,subject,message) VALUES('{$name}','{$email}','{$subject}','{$message}') ");
        confirm($query);
        
        set_message("Message Sent, A representative will get back to you shortly");
        
    }
    
}


function add_guest() {
    
    if(isset($_POST['submit'])) {
        
        $name           = escape_string($_POST['name']);
        $email          = escape_string($_POST['email']);
        $subject       = escape_string($_POST['subject']);
        $message       = escape_string($_POST['message']);
        
        
        $query = query("INSERT INTO users(email) VALUES('{$email}') ");
        confirm($query);
        
        set_message("Message Sent, A representative will get back to you shortly");
        
    }
    
}

/**** Add FAQ in Admin ****/

function add_faq() {
    
if(isset($_POST['publish'])) {
    
    
  $question            = escape_string($_POST['question']);
  $answer            = escape_string($_POST['answer']);
 
    
    
  $query = query("INSERT INTO faq(question, answer) VALUES('{$question}', '{$answer}')");
    
    confirm($query);
    
    set_message("New FAQ has been Added");
    redirect("index.php?faq");
    
    
    
}
    
}


/**** Get FAQ in Admin *****/

function get_faq() {

$query = query("SELECT * FROM faq");
confirm($query);

while($row = fetch_array($query)) {
    

        

$report = <<<DELIMETER

    <tr>
        <td>{$row['question']}</td>
        <td>{$row['answer']}</td>
         <td><a class="btn btn-danger faq_container" data-toggle="tooltipdelete" title="delete" href="index.php?delete_faq_id={$row['id']}"><i class="fa-solid fa-xmark"></i></a></td>
    </tr>
        
DELIMETER;
       
echo $report;
    
    }

}


//GET FAQ In Front_End

function get_faq_in_front() {
    
$query = query("SELECT * FROM faq");
confirm($query);

while($row = fetch_array($query)) {


    
$faq = <<<DELIMETER
    
    
    
    <div class="col" style="margin:10px;">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">{$row['question']}</h5>
              </div>
              <div class="card-body">
                
                <p class="card-text">{$row['answer']}</p>
                
              </div>
            </div>
          </div>
    

    

DELIMETER;
       
echo $faq;
    
    }
    
}



/**** Get Reports in Admin *****/

function get_reports() {

$query = query("SELECT * FROM reports");
confirm($query);

while($row = fetch_array($query)) {
    

        

$report = <<<DELIMETER

    <tr>
        <td>{$row['report_id']}</td>
        <td>{$row['product_id']}</td>
        <td>{$row['order_id']}</td>
        <td>{$row['product_price']}</td>
        <td>{$row['product_title']}</td>
        <td>{$row['product_quantity']}</td>
        <td>{$row['user']}</td>
         <td><a class="btn btn-danger" href="index.php?delete_report_id={$row['report_id']}"><i class="fa-solid fa-xmark"></i></a></td>
    </tr>
        
DELIMETER;
       
echo $report;
    
    }

}





/**** Get Reports in Admin Dashboard *****/

function get_reports_in_dashboard() {
    
    $query = query("SELECT * FROM reports LIMIT 5");
confirm($query);

while($row = fetch_array($query)) {
    
$report_in_dashboard = <<<DELIMETER

    <tr>
        <td>{$row['report_id']}</td>
        <td>{$row['product_id']}</td>
        <td>{$row['order_id']}</td>
        <td>{$row['product_price']}</td>
        <td>{$row['product_title']}</td>
        <td>{$row['product_quantity']}</td>
        
    </tr>
        
DELIMETER;
       
echo $report_in_dashboard;
    
    }
    
}



/***** Slider Function ******/


function add_slides() {
    
    if(isset($_POST['add_slide'])) {
        
        $slide_title        = escape_string($_POST['slide_title']);
        $slide_image        = escape_string($_FILES['file']['name']);
        $slide_image_loc    = escape_string($_FILES['file']['tmp_name']);
        
        if(empty($slide_title) || empty($slide_image)) {
            echo "<p class='bg-danger'>This field cannot be empty</p>";
            
            
        } else {
            
            move_uploaded_file($slide_image_loc, UPLOAD_DIRECTORY . DS . $slide_image);
            
            
            $query = query("INSERT INTO slides(slide_title, slide_image) VALUES('{$slide_title}', '{$slide_image}')");
            confirm($query);
            set_message("Slide Added");
            
            redirect("index.php?gallery");
            
            
        }
        
        
    }
    
    
}


/***** Get Currrent Slider In Admin Function ******/


function get_current_slide_in_admin() {
    

$query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
confirm($query);

while($row = fetch_array($query)) {
    
$slide_image =  display_image($row['slide_image']);

$slide_active_admin = <<<DELIMETER


    <img class="img-responsive" src="../../resources/{$slide_image}" alt="" style="height:250px;width:400px;">



DELIMETER;


echo $slide_active_admin;

    }
    
    
}



/***** Get Active Slider Function ******/


function get_active_slide() {
    
    
$query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
confirm($query);

while($row = fetch_array($query)) {
    
$slide_image =  display_image($row['slide_image']);

$slide_active = <<<DELIMETER



<div class="slide relative">
            <img class="w-full h-full object-cover"
                src="resources/{$slide_image}">
            <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">{$row['slide_title']}</div>
</div>



DELIMETER;


echo $slide_active;

    }
    
    
}


/***** Get Slides Function ******/


function get_slides() {
    
$query = query("SELECT * FROM slides");
confirm($query);

while($row = fetch_array($query)) {
    
$slide_image =  display_image($row['slide_image']);

$slides = <<<DELIMETER


 <div class="slide relative">
            <img class="w-full h-full object-cover"
                src="resources/{$slide_image}">
            <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">{$row['slide_title']}</div>
 </div>



DELIMETER;


echo $slides;

    }
    
}


/***** Get Slide Thumbnails Function ******/

function get_slide_thumbnails() {
    
    
    
    $query = query("SELECT * FROM slides ORDER BY slide_id ASC ");
confirm($query);

while($row = fetch_array($query)) {
    
$slide_image =  display_image($row['slide_image']);

$slide_thumb_admin = <<<DELIMETER

<div class="col-xs-6 col-md-3 image_container" >
    <a href="index.php?delete_gallery_id={$row['slide_id']}">
        
       <img class="img-responsive slide_image" src="../../resources/{$slide_image}" alt="" style="width:400px;height:250px;margin:5px;">
        
    </a>
    
    <div class="caption">
        <p>{$row['slide_title']}</p>
    </div>

</div>

DELIMETER;


echo $slide_thumb_admin;

    }
    
    
    
}


/**** Add Wedding Date in Admin ****/

function wedding_date() {
    
if(isset($_POST['wed_date'])) {
    
    
  $date               = escape_string($_POST['date']);
  
    
    
    
  $query = query("INSERT INTO wedding_date(date) VALUES('{$date}')");
    
    confirm($query);
    
    set_message("Wedding Date has been Added");
    redirect("index.php?data");
    
    
}
    
}

//GET Wedding Date

function get_wedding_date() {

    
$date_query = query("SELECT * FROM wedding_date");
confirm($date_query);

while ($row = fetch_array($date_query)) {

$id = $row['id'];
$date = $row['date'];


$wed_date = <<<DELIMETER

    <tr>
        <td>{$date}
        </td>
        <td><a class="btn btn-danger" data-toggle="tooltipdelete" title="delete" href="index.php?delete_date_id={$row['id']}"><i class="fa-solid fa-xmark"></i></a></td>
    </tr>

DELIMETER;
    
    echo $wed_date;
    
}
    
}

//GET Date in Front end

function get_date_front() {
    
$query = query("SELECT * FROM wedding_date");
confirm($query);

while($row = fetch_array($query)) {

    
$date = <<<DELIMETER


    {$row['date']}

   

DELIMETER;
       
echo $date;
    
    }
    
}


/**** Add Wedding Venue in Admin ****/

function wedding_venue() {
    
if(isset($_POST['wed_venue'])) {
    
    
  $venue               = escape_string($_POST['venue']);
  
    
    
    
  $query = query("INSERT INTO wedding_venue(venue) VALUES('{$venue}')");
    
    confirm($query);
    
    set_message("Wedding Venue has been Added");
    redirect("index.php?data");
    
    
}
    
}

//GET Wedding Venue

function get_wedding_venue() {

    
$venue_query = query("SELECT * FROM wedding_venue");
confirm($venue_query);

while ($row = fetch_array($venue_query)) {

$id = $row['id'];
$venue = $row['venue'];


$wed_date = <<<DELIMETER

    <tr>
        <td>{$venue} <br>
            <i style="color:blue;">{$date}</i>
        </td>
        <td><a class="btn btn-danger" data-toggle="tooltipdelete" title="delete" href="index.php?delete_venue_id={$row['id']}"><i class="fa-solid fa-xmark"></i></a></td>
    </tr>

DELIMETER;
    
    echo $wed_date;
    
}
    
}


//GET Venue in Front end

function get_venue_front() {
    
$query = query("SELECT * FROM wedding_venue");
confirm($query);

while($row = fetch_array($query)) {

    
$venue = <<<DELIMETER


    {$row['venue']}

   

DELIMETER;
       
echo $venue;
    
    }
    
}

//==== END =====//


//==== Validation Function  =====//
    
    
/***** Username Exists Function ******/
    
     function username_exists($username) {
          
          global $connection;
          
         $result =  query("SELECT username FROM users WHERE username = '$username'");
        
        confirm($result);
        
        if(mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    


/***** Email Exists Function ******/

     function email_exists($email) {
          
         global $connection;
          
         $result =  query("SELECT email FROM users WHERE email = '$email'");
        
        confirm($result);
        
        if(mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    

    
 //==== End Validation Function  =====//  
 
 
    
    



?>