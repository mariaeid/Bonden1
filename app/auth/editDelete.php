<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

//Edit of user profile details
if (isset($_POST['edit'])) {
    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['street'], $_POST['street_no'])) {
        $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
        $cohabitant = filter_var(trim($_POST['cohabitant']), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
        $street = filter_var(trim($_POST['street']), FILTER_SANITIZE_STRING);
        $street_no = filter_var(trim($_POST['street_no']), FILTER_SANITIZE_NUMBER_INT);

        // Fetching all users except for the one logged in
        $statement = $pdo->prepare("SELECT * FROM users where user_id != :id");
        $statement->bindParam(':id', $_SESSION['user']['user_id'], PDO::PARAM_INT);
        $statement->execute();

        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            $userEmail = $user['email'];
            $userID = $user['user_id'];

            // If the email entered by the user is equal to an existing email an error session is saved and the database is not updated
            if ($userEmail === $email) {
                $_SESSION['error'] = "Mailadressen är redan registrerad";
                redirect('../../profileEdit.php');
            }
        }

        //Updating the database with the new user details
        $statement = $pdo->prepare("UPDATE users SET name = :name, cohabitant = :cohabitant, email = :email, phone = :phone, street = :street, street_no = :street_no WHERE user_id = :id");

        if (!$statement) {
            die(var_dump(
                $pdo->errorInfo()
            ));
        }

        $statement->bindParam(':id', $_SESSION['user']['user_id'], PDO::PARAM_INT);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':cohabitant', $cohabitant, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':street', $street, PDO::PARAM_STR);
        $statement->bindParam(':street_no', $street_no, PDO::PARAM_STR);

        $statement->execute();

        // Fetching the new user details, updates the session with them and redirects the user to profile page
        $newData = $pdo->prepare("SELECT * FROM users where user_id = :id");
        $newData->bindParam(':id', $_SESSION['user']['user_id'], PDO::PARAM_INT);
        $newData->execute();

        $user = $newData->fetch(PDO::FETCH_ASSOC);
        unset($_SESSION['user']);
        $_SESSION['user'] = $user;
        redirect('../../profile.php');
    }
}

// Delete of account
if (isset($_POST['delete'])) {
    // Deleting user
    $statement = $pdo->prepare("DELETE FROM users WHERE user_id = :id");

        if (!$statement) {
          die(var_dump(
              $pdo->errorInfo()
          ));
        }

    $statement->bindParam(':id', $_SESSION['user']['user_id'], PDO::PARAM_INT);

    $statement -> execute();

    // Removing user session and saved data
    unset($_SESSION['user']);
    unset($_SESSION['save']);
    redirect('../../index.php');
}

// Cancel of editing user detials
if (isset($_POST['cancel'])) {
    redirect('../../profile.php');
}
