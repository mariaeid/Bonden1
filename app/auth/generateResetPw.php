<?php

declare(strict_types=1);
require __DIR__.'/../autoload.php';

if (isset($_POST['reset'])) {
    if (isset($_POST['email'])) {
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);

        $statement = $pdo->prepare("SELECT * FROM users where email = :email");
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        //Saving error in a session if the email address doesn't exist
        if (empty($user)) {
            $_SESSION['error'] = "Det finns ingen registrerad användare med denna mailadressen";
            redirect('/../../generateResetPw.php');
        }

        else {
            $resetPassword = substr(md5(microtime()),rand(0,26),7);
            // die(var_dump($email));
            $statement = $pdo->prepare("UPDATE users SET reset_password = :reset_password WHERE email = :email");


            if (!$statement) {
                die(var_dump(
                    $pdo->errorInfo()
                ));
            }

            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':reset_password', $resetPassword, PDO::PARAM_STR);
            $statement->execute();

            $to = $email;

            // Subject
            $subject = 'Bonden1 - återställning av lösenord';

            // Message
            $message = '<p>Här kommer lösenordet för återställning av ditt konto på Bonden1. </p>';
            $message .= sprintf('<p>Återställningslösenord: %s</p>', $resetPassword);
            $message .= '<p>Klicka här för att slutföra återställningen: <a href="http://www.bonden1.se/resetPwLink.php">http://www.bonden1.se/resetPwLink.php</a></p>';

            // Headers
            $headers = "From: Bonden1Admin  <admin@bonden1.se>\r\n";
            $headers .= "Content-type: text/html\r\n";

            // Send email
            $sent = mail($to, $subject, $message, $headers);

            redirect('../../resetPw.php');
        }
    }
}

// Cancel of editing pw
if (isset($_POST['cancel'])) {
    redirect('../../login.php');
}
