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


        $resetPassword = random_bytes(32);

    }
}

// Cancel of editing pw
if (isset($_POST['cancel'])) {
    redirect('../../login.php');
}
