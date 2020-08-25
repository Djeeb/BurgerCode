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
                    <h1><strong>Liste des items   </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="fas fa-plus"> </span> Ajouter</a></h1>
                        <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Prix</th>
                                        <th>Catégorie</th>
                                        <th>Actions</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    <?php
                                    require 'database.php';
                                    $db = Database::connect();
                                    $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category 
                                                            FROM items LEFT JOIN categories
                                                            ON items.category = categories.id
                                                            ORDER BY items.id DESC');
                                    while ($item = $statement->fetch()) {
                                            
                                        echo '<tr>';
                                        echo '<td>' .$item['name']. '</td>';
                                        echo '<td>' .$item['description']. '</td>';
                                        echo '<td>' .$item['price']. '</td>';
                                        echo '<td>' .$item['category']. '</td>';
                                        echo '<td width=340>';
                                        echo '<a class="btn btn-outline-dark" href="view.php?id=' .$item['id']. '"><span class="far fa-eye"></span> Voir</a>  ';
                                        echo '<a class="btn btn-primary" href="update.php?id=' .$item['id']. '"><span class="fas fa-pencil-alt"></span> Modifier</a>  ';
                                        echo '<a class="btn btn-danger" href="delete.php?id=' .$item['id']. '"><span class="far fa-trash-alt"></span> Supprimer</a>';
                                        echo '</td>';
                                        echo '</tr>';                                            
                                    }

                                    ?>
                                
                                    
                                </tbody>
                        </table>
                </div>
            </div>
        </body>
    </html>