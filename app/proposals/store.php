<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Adding new post in the database.
if (isset($_POST['store'])) {
    if (isset($_POST['title'], $_POST['description'])) {
        $title = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
        $description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
        $submittedBy = filter_var(trim($_POST['submittedBy']), FILTER_SANITIZE_STRING);

        $statement = $pdo->prepare("INSERT INTO proposals (title, description, proposal_user_id, submitted_date, submitted_by) VALUES (:title, :description, :user_id, :submitted_date, :submitted_by)");

        if (!$statement) {
            die(var_dump(
                $pdo->errorInfo()
            ));
        }

        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':user_id', $_SESSION['user']['user_id'], PDO::PARAM_STR);
        $statement->bindParam(':submitted_date', date("Y-m-d"), PDO::PARAM_STR);
        $statement->bindParam(':submitted_by', $submittedBy, PDO::PARAM_STR);

        $statement -> execute();

        redirect('/../../proposals.php');
    }
}

// Cancel of creating post
if (isset($_POST['cancel'])) {
    redirect('../../proposals.php');
}
