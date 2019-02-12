<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Adding new post in the database.
if (isset($_POST['store'])) {
    if (isset($_POST['title'], $_POST['description'])) {
        $title = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
        $description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
        $file = $_FILES['file'];
        $info = pathinfo($_FILES['file']['name']);
        $ext = $info['extension'];

        if (!empty($ext)) {
            $fileName = date('Y-m-d')."-".$file['name'];
        }

        $statement = $pdo->prepare("INSERT INTO posts (title, description, post_user_id, submitted_date, file_name) VALUES (:title, :description, :user_id, :submitted_date, :file_name)");

        if (!$statement) {
            die(var_dump(
                $pdo->errorInfo()
            ));
        }

        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':user_id', $_SESSION['user']['user_id'], PDO::PARAM_STR);
        $statement->bindParam(':submitted_date', date("Y-m-d"), PDO::PARAM_STR);
        $statement->bindParam(':file_name', $fileName, PDO::PARAM_STR);

        $statement -> execute();

        //Moving file to the file directory if a file has been attached
        if (isset($_FILES['file'])) {
            move_uploaded_file($file['tmp_name'], __DIR__.'/../uploadedFiles/attachment/'.$fileName);
        }

        redirect('/../../posts.php');
    }
}

// Cancel of creating post
if (isset($_POST['cancel'])) {
    redirect('../../posts.php');
}
