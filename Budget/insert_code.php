<?php
session_start();
require 'phpdbcon.php';

if(isset($_POST['delete_budget']))
{
    $delete_b = mysqli_real_escape_string($con, $_POST['delete_budget']);

    $query = "DELETE FROM budget WHERE Category ='".$delete_b."' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Budget Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Budget Not Deleted";
        header("Location: index.php");
        exit(0);
    }
} 

if(isset($_POST['insert_data']))
{
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    

    $query = "INSERT INTO budget (category,amount) VALUES ('$category','$amount')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Budget Added Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Budget Not Created";
        header("Location: index.php");
        exit(0);
    }
}
?>