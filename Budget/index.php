<?php
session_start();
require 'phpdbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BUDGET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="AddBudget" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Add New Budget</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="insert_code.php" method="POST">
        <fieldset enabled>
        <div class="mb-3">
        <label for="Please select here"  class="form-label">Category</label>

  <input type="text" name="category" class="form-control" aria-label="Text input with segmented dropdown button" placeholder="Please select here">

       
  </div>

        
        <div class="mb-3">
            <label for="Amount" class="form-label">Amount</label>
            <input type="number" name="amount" class="form-control" placeholder="Enter the amount">
        </div>


   

  
  </div>
      <div class="modal-footer">
        <button type="submit" name="insert_data"class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
      </div>
      </fieldset>
</form>
      
    </div>
  </div>
</div>

<?php
include('message.php');
?>

<div class="container mt-3">
    <div class="jumbotron">
        <div class="card">

                <h2> BUDGET <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#AddBudget">Add Budget</button></h2>
        </div>
        <div class="card"></div>
            <div class="card-body">
            <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM budget";
                                  

                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $budget)
                                        {
                                            ?>
                                            <tr>

                                                <td><?= $budget['Category']; ?></td>
                                                <td><?= $budget['Amount']; ?></td>
                                                
                                                <td>
                                                   <!--<a href="edit_code.php?Category=<?= $budget['Category']; ?>" class="btn btn-success btn-sm ">Edit</a> -->
                                                    <form action="insert_code.php" method="POST" class="d-inline">
                                                       
                                                        <button type="submit" name="delete_budget" value="<?=$budget['Category'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>

                            </tbody>
            </table>
                
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
