<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Update of proposals in the database
if (isset($_POST['edit'])) {
    if (isset($_POST['title'], $_POST['description'])) {
        $title = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
        $description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
        $submittedBy = filter_var(trim($_POST['submittedBy']), FILTER_SANITIZE_STRING);

        $statement = $pdo->prepare("UPDATE proposals SET title = :title, description = :description, submitted_by = :submitted_by WHERE proposal_id = :id");

        if (!$statement) {
            die(var_dump(
                $pdo->errorInfo()
            ));
        }

        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':submitted_by', $submittedBy, PDO::PARAM_STR);
        $statement->bindParam(':id', $_POST['id'], PDO::PARAM_INT);

        $statement->execute();

        $newData = $pdo->prepare("SELECT * from proposals where proposal_id = :id");
        $newData->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
        $newData->execute();

        $post = $newData->fetch(PDO::FETCH_ASSOC);

        redirect('/../../proposals.php');
    }
}

// Deletion of proposals in the database
if (isset($_POST['delete'])) {
    //Deleting the post
    $statement = $pdo->prepare("DELETE FROM proposals WHERE proposal_id = :id");

        if (!$statement) {
          die(var_dump(
              $pdo->errorInfo()
          ));
        }

    $statement->bindParam(':id', $_POST['id'], PDO::PARAM_INT);

    $statement -> execute();

    redirect('../../proposals.php');
}

// Cancel of edit post
if (isset($_POST['cancel'])) {
    redirect('../../proposals.php');
}
