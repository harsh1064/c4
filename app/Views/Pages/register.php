<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                 integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
                 crossorigin="anonymous">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
  <h3>USER REGISTRATION:</h3>
  <div class="container">
    <form action="<?php echo 'Pages/insert'?>" method="post" enctype="multipart/form-data">
    
        <div class="form-group">
            <label>First Name: </label>
            <input type="text" class="form-control" name="fname" placeholder="first name"/>
            <?php if(isset($validation)) echo $validation->getError('fname');?>
        </div> 
        
        <div class="form-group">
            <label>Last Name: </label>
            <input type="text" class="form-control" name="lname" placeholder="last name"/>
            <?php if(isset($validation)) echo $validation->getError('lname');?>
        </div> 

        <div class="form-group">
            <label>Email: </label>
            <input type="text" class="form-control" name="email" placeholder="email"/>
            <?php if(isset($validation)) echo $validation->getError('email');?>
        </div> 

        <div class="form-group">
            <label>Password: </label>
            <input type="password" class="form-control" name="password" placeholder="password"/>
            <?php if(isset($validation)) echo $validation->getError('password');?>
        </div> 

        <div class="form-group">
            <label>Upload Your Photo: </label>
            <input type="file" class="form-control-file" name="pic" />
        </div> 

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit">Register </button>
        </div> 
    </form>
  </div>
</div>
</body>
</html>