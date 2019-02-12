<?php

declare(strict_types=1);

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect($path)
    {
        header("Location: ${path}");
        exit;
    }
}

function allUsers($pdo) {
    $statement = $pdo->prepare("SELECT * FROM users ORDER BY street, street_no");

    if (!$statement) {
        die(var_dump(
            $pdo->errorInfo()
        ));
    }

    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function boardMembers($pdo) {
    $statement = $pdo->prepare("SELECT * FROM users ORDER BY board_order");

    if (!$statement) {
        die(var_dump(
            $pdo->errorInfo()
        ));
    }

    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function allPosts($pdo) {
    $statement = $pdo->prepare("SELECT * FROM posts JOIN users ON posts.post_user_id=users.user_id ORDER BY post_id DESC");

    if (!$statement) {
        die(var_dump(
            $pdo->errorInfo()
        ));
    }

    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}

function allProposals($pdo) {
    $statement = $pdo->prepare("SELECT * FROM proposals JOIN users ON proposals.proposal_user_id=users.user_id ORDER BY proposal_id DESC");

    if (!$statement) {
        die(var_dump(
            $pdo->errorInfo()
        ));
    }

    $statement->execute();
    $proposals = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $proposals;
}
