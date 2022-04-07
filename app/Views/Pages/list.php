<?php include_once('C:\wamp64\www\c4\app\Views\Templates\header.php');?>
<html>
    <body>
        <?php $session = session(); ?>
        <div class="container">
        <h1>User Details:</h1>
        <br>
        <h3>Welcome <?php echo $session->uname;?> !!!</h3>
        <br>
        <table class="table table-stripped">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Photo</th>
                <th></th>
                <th></th>
            </tr>
                     <?php foreach($user as $k):?>
                        <tr>
                                <td> <?php echo $k['fname'];?> </td>
                                <td> <?php echo $k['lname'];?> </td>
                                <td> <?php echo $k['email'];?> </td>
                                <td><img src="<?php echo "http://localhost/c4/upload/".$k['pic'];?>" width="100px" height="100px"></td>
                                <!-- <td> <button class="btn btn-primary" name="edit">Edit</button> </td> -->
                                <td> <a href="<?php echo "Pages/edit/".$k['id'];?>" class="btn btn-primary" name="edit">Edit</a> </td>
                                <!-- <td> <a href="<?php echo "Pages/delete/".$k['id'];?>" class="btn btn-danger" name="delete">Delete</a> </td> -->
                                <td> <button class="btn btn-danger" name="del">Delete</button> </td>
                       </tr>
                     <?php endforeach;?>
        </table>
        </div>
    </body>
</html>