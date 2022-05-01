<?php
session_start();
require 'phpdbcon.php';
?>
<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Edit Budget</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php
         if(isset($_GET['Category']))
        { 
            $edit_budget = mysqli_real_escape_string($con, $_GET['Category']);
             $query = "SELECT * FROM budget WHERE Category='".$edit_budget."' ";
             $query_run = mysqli_query($con, $query);
             if(mysqli_num_rows($query_run) > 0)
             {
                                            $budget = mysqli_fetch_array($query_run);
                                    ?>
                                                                

                                    <form action="edit_code.php" method="POST">
                                        <input type="hidden" name="edit_budget" value="<?= $budget['Category']; ?>">
                                        <fieldset enabled>
                                        <div class="mb-3">
                                        <label for="Please select here"  class="form-label">Category</label>

                                        <input type="text" name="category" value="<?=$budget['Category']?>" class="form-control" aria-label="Text input with segmented dropdown button" placeholder="Please select here">

                                    
                                        </div>

                                        
                                        <div class="mb-3">
                                            <label for="Amount" class="form-label">Amount</label>
                                            <input type="number" name="amount" value="<?=$budget['Amount']?>" class="form-control" placeholder="Enter the amount">
                                        </div>


                                

                                
                                        </div>
                                        <div class="modal-footer">
                                        <button type="submit" name="budget_edit"class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                        </div>
                                        </fieldset>
                                    </form>
                                <?php

                                                            

             }
                                else
                                    {
                                                                echo "<h4>No Such Id Found</h4>";
                                    }
         }
                        ?>

      
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
