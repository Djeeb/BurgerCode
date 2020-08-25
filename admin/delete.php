<?php
    require 'database.php';
    
    if(!empty($_GET['id'])){
        $id = checkInput($_GET['id']);
    }
    if(!empty($_POST)){
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM items WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
    }
    function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
    <html lang="fr-FR">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
            <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            />
            <link
            <link
            href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap"
            rel="stylesheet"
            type="text/css"
            />
            <link rel="stylesheet" href="../css/style.css" />
            <script src="js/script.js"></script>
            <script
            src="https://kit.fontawesome.com/d9d02b30db.js"
            crossorigin="anonymous"
            ></script>

            <title>Burger Code</title>
        </head>

        <body>
            <style>
                .admin {
                background: #fff;
                padding: 50px;
                border-radius: 10px;
                }
            </style>
            <h1 class="text-logo"><i class="fas fa-utensils"></i> Burger Code <i class="fas fa-utensils"></i></h1>
            <div class="container admin">
                <div class="row">
                    <div class="container-fluid">
                        <h1><strong>Supprimer un item</strong></h1>
                        <br>
                        <form class="form" role="form" action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id;?>" />
                            <p class="alert alert-warning">Etes-vous sûr de vouloir supprimer ?</p>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-warning">Oui</button>
                                <a class="btn btn-outline-dark" href="index.php">Non</a>
                            </div>
                        </form>
                    </div>                                             
                </div>
            </div>
        </body>
    </html>