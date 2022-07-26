<?php
		include("../includes/header.inc.php");
		//include("../includes/nav_parent.inc.php");
		include("../includes/aside_parent.inc.php");
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update child details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="card-header">
                        <h4> Update child details by ID into Database </h4>
                    </div>
                   
                        <form action="codec.php" method="POST">

                        <div>
                             <label for="">Name</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
                            <div>
                                <label for="">sex</label>
                                <input type="text" name="sex" class="form-control" >
                                </div>
                           
                                <div>
                                <button type="submit" name="update_child_data" class="btn btn-primary">Update Data</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://codec.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <?php
		include("../includes/footer.inc.php");
	?>
        
     </body>
    
 </html>
                
             
 <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong>
                             <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>