<?php
    require 'database.php';

    if(!empty($_GET['id'])){
        $id = checkInput($_GET['id']);
    }

    $db = Database::connect();
    $statement = $db->prepare('SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category 
    FROM items LEFT JOIN categories
    ON items.category = categories.id
    WHERE items.id = ?');
    $statement->execute(array($id));
    $item = $statement->fetch();
    Database::disconnect();

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
                    <div class="col-sm-6">
                        <h1><strong>Voir un item</strong></h1>
                        <br>
                        <form>
                            <div class="form-group">
                                <label>Nom:</label><?php echo '   ' .$item['name']; ?>
                            </div>
                            <div class="form-group">
                                <label>Description:</label><?php echo '   ' .$item['description']; ?>
                            </div>
                            <div class="form-group">
                                <label>Prix:</label><?php echo '   ' .number_format((float)$item['price'],2,'.',''); ?>
                            </div>
                            <div class="form-group">
                                <label>Catégorie:</label><?php echo '   ' .$item['category']; ?>
                            </div>
                            <div class="form-group">
                                <label>Image:</label><?php echo '   ' .$item['image']; ?>
                            </div>
                        </form>
                        <div class="form-actions">
                            <a class="btn btn-primary" href="index.php"><span class="fas fa-arrow-left"></span> Retour</a>
                        </div>
                        
                    </div>
                    
                    <div class="col-xs-12 col-sm-6 col-lg-4 site">
                        <div class="img-thumbnail">
                            <img class="container-fluid" src="<?php echo '../images/' .$item['image'] ; ?>" alt="..." />
                            <div class="price"><?php echo number_format((float)$item['price'],2,'.',''); ?></div>
                            <div class="caption">
                                <h4><?php echo $item['name']; ?></h4>
                                <p>
                                    <?php echo $item['description']; ?>
                                </p>
                                <a href="#" type="button" class="btn btn-order" role="button"
                                    ><img
                                    src="../images/shopping_cart-24px.svg"
                                    alt=""
                                    />Commander
                                </a>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </body>
    </html>