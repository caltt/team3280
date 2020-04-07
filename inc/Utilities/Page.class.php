<?php

// following are added by Tong:
// signUp()   this one is RENAMED
// showAdminInfo()  for test purpose, not for the content of admin homepage
// updateAdmin()
// editJob()  this one NOT done yet


class Page{
    public static $_title = "Please set this Title";
    static function header()    { ?>

<!doctype html>
        <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

            <title><?php echo self::$_title; ?></title>
        </head>
        <body>
            <h1><?php echo self::$_title; ?></h1>

<?php
}

static function footer() { ?>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<?php }

public static function signUp(){ ?>
    <form class="container w-25" action="" method="POST">
    <div>
        <span>Admin ID</span>
        <input class="form-control" type="text" name="adminId">
    </div>
    <div>
        <span>Password</span>
        <input class="form-control" type="password" name="password">
    </div>
    <div>
        <span>Confirm password</span>
        <input class="form-control" type="password" name="confirmedPassword">
    </div>
    <div>
        <span>First Name</span>
        <input class="form-control" type="text" name="firstName">
    </div>
    <div>
        <span>Last Name</span>
        <input class="form-control" type="text" name="lastName">
    </div>
    <div>
        <span>Email</span>
        <input class="form-control" type="text" name="email">
    </div>
    <div>
        <span>Phone</span>
        <input class="form-control" type="text" name="phone">
    </div>
    <div>
        <span>Company Name</span>
        <input class="form-control" type="text" name="companyName">
    </div>
    <div class="text-center">
        <button class="btn btn-primary" type="submit" name="action" value="createAdmin">Sign Up</button>
        <a href="pro.corona.php" class="btn btn-primary">Home</a>
    </div>
    </form>

<?php }

    static function showLogin() { ?>
        <H3>Please sign in </h3>
            <form method="POST" ACTION="">
        <div class="form-group">
            <label for="exampleInputUserName">User Name</label>
            <input type="text" class="form-control" name="username" placeholder="UserId"> 
        </div>
        <div class="form-group">
            <label for="exampleInputPassword">Password</label>
            <input type="password" class="form-control" name="password"placeholder="Password">
        </div>
        <input type="submit" value="login">
        <a href="signup.php" class="btn btn-primary">Sign Up</a>
        <input type="hidden" name="action" value="login">
    
        </form>

<?php }

    static function showAdminInfo($admin){ ?>
        <div class="container text-center">
        <p>for test</p>
        <p>Welcome, <?=$admin->AdminUserId?>!</p>
        <table class="table">
            <tr>
                <td>First name:</td>
                <td><?=$admin->FirstName?></td>
            </tr>
            <tr>
                <td>Last name:</td>
                <td><?=$admin->LastName?></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><?=$admin->Phone?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?=$admin->Email?></td>
            </tr>
            <tr>
                <td>Company:</td>
                <td><?=$admin->CompanyName?></td>
            </tr>
        </table>
        <a href="updateAdmin.php" class="btn btn-primary">Update Admin Info</a>
        <a href="loggedout.php" class="btn btn-primary">Log out</a>
        </div>

<?php }

    static function updateAdmin($admin){ ?>
        <p>Leave all password fields blank if you are not changing it.</p>
        <form class="container" method="POST">
        <div>
            <span>Old password</span>
            <input class="form-control" type="password" name="oldPassword">
        </div>
        <div>
            <span>New password</span>
            <input class="form-control" type="password" name="newPassword">
        </div>
        <div>
            <span>Confirm new password</span>
            <input class="form-control" type="password" name="confirmedPassword">
        </div>
        <div>
            <span>First Name</span>
            <input class="form-control" type="text" name="firstName" value="<?=$admin->FirstName?>">
        </div>
        <div>
            <span>Last Name</span>
            <input class="form-control" type="text" name="lastName" value="<?=$admin->LastName?>">
        </div>
        <div>
            <span>Email</span>
            <input class="form-control" type="text" name="email" value="<?=$admin->Email?>">
         </div>
         <div>
            <span>Phone</span>
            <input class="form-control" type="text" name="phone" value="<?=$admin->Phone?>">
        </div>
        <div>
            <span>Company Name</span>
            <input class="form-control" type="text" name="companyName" value="<?=$admin->CompanyName?>">
        </div>
        <button class="btn btn-primary" type="submit" name="action" value="updateAdmin">Edit</button>
        <a href="pro.corona.php" class="btn btn-primary">Home</a>
        </form>

<?php }

    static function editJobs($jobs){ 
        echo '<table class="table">
                <th>Jobs created by me</th>
                <tr>
                    <td>JobTitle</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>';
        foreach ($jobs as $job){
            echo '<tr>';
            echo '<td>' . $job->getJobTitle() . '</td>';
            echo '<td><a href="?action=edit&id=' . $job->getJobId() . '"></a></td>';
            echo '<td><a href="?action=delete&id=' . $job->getJobId() . '"></a></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}

?>