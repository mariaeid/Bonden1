<?php

declare(strict_types=1);
require __DIR__.'/../autoload.php';

// Change of password with reset
if (isset($_POST['resetPw'])) {

    if (isset($_POST['email'], $_POST['currentPassword'], $_POST['newPassword'], $_POST['confirmPassword'])) {
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        $statement = $pdo->prepare("SELECT * FROM users where email = :email");
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        //Saving error in a session if the email address doesn't exist
        if (empty($user)) {
            $_SESSION['error'] = "Det finns ingen registrerad användare med denna mailadressen";
            redirect('/../../resetPw.php');
        }
        //If the email address exists and the password match we store the user details (except for the pw) in a session, remove the errors and redirects the user to the start page
        else {
            //Verification to see that the entered new pw matches the user's reset pw
            if (password_verify($currentPassword, $user['reset_password']))
            // if ($currentPassword === $user['reset_password'])
            {
                $_SESSION['user'] = $user;

                //If the user has repeated the new pw correctly the new pw is saved and reset password is set to null
                if ($newPassword === $confirmPassword) {
                    $password = password_hash($newPassword, PASSWORD_DEFAULT);
                    $resetPassword = null;

                    //Update the password
                    $statement = $pdo->prepare("UPDATE users SET password = :password, reset_password = :reset_password WHERE user_id = :id");

                    if (!$statement) {
                        die(var_dump(
                            $pdo->errorInfo()
                        ));
                    }

                    $statement->bindParam(':id', $_SESSION['user']['user_id'], PDO::PARAM_INT);
                    $statement->bindParam(':password', $password, PDO::PARAM_STR);
                    $statement->bindParam(':reset_password', $resetPassword, PDO::PARAM_STR);

                    $statement->execute();

                    $newData = $pdo->prepare("SELECT * FROM users where user_id = :id");
                    $newData->bindParam(':id', $_SESSION['user']['user_id'], PDO::PARAM_INT);
                    $newData->execute();
                    $user = $newData->fetch(PDO::FETCH_ASSOC);

                    //Store new session with user details (except pw) & redirects to the profile page
                    unset($user['password']);
                    $_SESSION['user'] = $user;
                    redirect('../../profile.php');
                }

                //Saving variable if new pw doesn't match with confirmed new pw
                else {
                    $_SESSION['error'] = "Det nya lösenordet matchar inte - försök igen";
                    redirect('../../resetPw.php');
                }
            }

            //Saving variable if wrong current pw has been entered
            else {
                $_SESSION['error'] = "Återställningslösenordet stämmer inte - försök igen";
                redirect('../../resetPw.php');
            }
        }
    }
}

if (isset($_POST['cancel'])) {
    redirect('../../login.php');
}
