<?php
/**
 * Created by PhpStorm.
 * User: Nikhil Ghind
 * Date: 05-03-2019
 * Time: 05:32 PM
 */


require_once ("../../classes/Database.class.php");
require_once ("../../classes/Posts.class.php");
$conn = (new Database())->getConnection();

$posts = new Posts($conn);

//echo $_POST['post_id'];

$result = $posts->readPost($_POST['post_id']);


$status = $result['post_status'];

if($status == "published"){
    $status = "draft";
}else{
    $status = "published";
}
$posts->updatePost(["post_status"=>$status],"post_id = {$_POST['post_id']}");

header("Location: 1");
