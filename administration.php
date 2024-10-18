<?php
include("session.php");
include("readUsers.php");
include("delete.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Password</td>
            <td>Phone</td>
            <td>Address</td>
            <td>Actions</td>

        </tr>
        <?php
            foreach ($rows as $row) {
        ?>
        <tr>
            <td> <?php echo $row['username']; ?></td>
            <td> <?php echo $row['email']; ?></td>
            <td> <?php echo $row['password']; ?></td>
            <td> <?php echo $row['phone']; ?></td>
            <td> <?php echo $row['address']; ?></td>
        <td>
        <form action="delete.php" method="POST">
        <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
        <button type="submit" name="delete_user" >Delete</button>
    </form>
            </td>
            </tr>
        <?php } ?>        
        


    </table>
</body>
</html>