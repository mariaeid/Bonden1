<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Creation of new user
if (isset($_POST['add'])) {
    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['street'], $_POST['street_no'], $_POST['password'], $_POST['confirmPassword'])) {
        $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
        $cohabitant = filter_var(trim($_POST['cohabitant']), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
        $street = filter_var(trim($_POST['street']), FILTER_SANITIZE_STRING);
        $street_no = filter_var(trim($_POST['street_no']), FILTER_SANITIZE_NUMBER_INT);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        // Fetching users with same email or username as the one entered by the user
        $query = $pdo->query('SELECT * FROM users WHERE email = :email');

        $query->bindParam(':email', $email, PDO::PARAM_STR);

        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        $userEmail = $user['email'];

        // Saving the entered userdata into a session (to be used to fill in the form with data already entered by the user if errors)
        $_SESSION['save']['nameSave'] = $name;
        $_SESSION['save']['cohabitantSave'] = $cohabitant;
        $_SESSION['save']['emailSave'] = $email;
        $_SESSION['save']['phoneSave'] = $phone;
        $_SESSION['save']['streetSave'] = $street;
        $_SESSION['save']['street_noSave'] = $street_no;

        //Saving error session if the email already exists
        if ($userEmail === $email) {
            $_SESSION['error'] = "Mailadressen är redan registrerad";
            redirect('../../signup.php');
        }
        else {
            // Adding the user to the database if the pw entered matches with the confirmed pw
            if ($password === $confirmPassword) {
                $password = password_hash($password, PASSWORD_DEFAULT);

                $statement = $pdo->prepare("INSERT INTO users (name, cohabitant, email, phone, street, street_no, password) VALUES (:name, :cohabitant, :email, :phone, :street, :street_no, :password)");

                if (!$statement) {
                    die(var_dump(
                        $pdo->errorInfo()
                    ));
                }

                $statement->bindParam(':name', $name, PDO::PARAM_STR);
                $statement->bindParam(':cohabitant', $cohabitant, PDO::PARAM_STR);
                $statement->bindParam(':email', $email, PDO::PARAM_STR);
                $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
                $statement->bindParam(':street', $street, PDO::PARAM_STR);
                $statement->bindParam(':street_no', $street_no, PDO::PARAM_STR);
                $statement->bindParam(':password', $password, PDO::PARAM_STR);

                $statement -> execute();

                // Fetching the new userdata and updates the session with it
                $statement = $pdo->query('SELECT * FROM users WHERE  email= :email');
                $statement->bindParam(':email', $email, PDO::PARAM_STR);
                $statement->execute();

                $user = $statement->fetch(PDO::FETCH_ASSOC);

                unset($user['password']);
                $_SESSION['user'] = $user;

                redirect('../../profile.php');
            }
            else {
                // Saving error session if the pw don't match with the confirm pw
                $_SESSION['error'] = "Lösenorden matchar inte - försök igen";
                redirect('../../signup.php');
            }
        }
    }
}
// Cancel of sign up
if (isset($_POST['cancel'])) {
    redirect('../../index.php');
}
