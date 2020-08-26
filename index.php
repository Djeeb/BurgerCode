<!DOCTYPE html>
<html lang=fr-FR>
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
        <link rel="stylesheet" href="css/style.css" />
        <script
          src="https://kit.fontawesome.com/d9d02b30db.js"
          crossorigin="anonymous"
        ></script>

        <title>Burger Code</title>
    </head>
    
    
    <body>
        <div class="container site">
          <h1 class="text-logo"><i class="fas fa-utensils"></i> Burger Code <i class="fas fa-utensils"></i></h1>
            <?php
				require 'admin/database.php';
			 
                echo '<nav>
                        <ul class="nav nav-pills justify-content-center" role="tablist">';

                $db = Database::connect();
                $statement = $db->query('SELECT * FROM categories');
                $categories = $statement->fetchAll();
                foreach ($categories as $category) 
                {
                    if($category['id'] == '1')
                        echo '<li class="nav-item"><a class="nav-link active" href="#onglet'. $category['id'] . '" data-toggle="pill">' . $category['name'] . '</a></li>';
                    else
                        echo '<li class="nav-item"><a class="nav-link" href="#onglet'. $category['id'] . '" data-toggle="pill">' . $category['name'] . '</a></li>';
                }

                echo    '</ul>
                      </nav>';

                echo '<div class="tab-content">';

                foreach ($categories as $category) 
                {
                    if($category['id'] == '1')
                        echo '<div class="tab-pane active" id="onglet' . $category['id'] .'">';
                    else
                        echo '<div class="tab-pane" id="onglet' . $category['id'] .'">';
                    
                    echo '<div class="row">';
                    
                    $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                    $statement->execute(array($category['id']));
                    while ($item = $statement->fetch()) 
                    {
                        echo '<div class="col-xs-12 col-sm-6 col-lg-4">
                                <div class="img-thumbnail">
                                    <img class="container-fluid" src="images/' . $item['image'] . '" alt="...">
                                    <div class="price">' . number_format($item['price'], 2, '.', ''). ' €</div>
                                    <div class="caption">
                                        <h4>' . $item['name'] . '</h4>
                                        <p>' . $item['description'] . '</p>
                                        <a href="#" type="button" class="btn btn-order" role="button"><img class="shopping-cart" src="images/shopping_cart-24px.svg" alt="" />Commander</a>
                                    </div>
                                </div>
                            </div>';
                    }                   
                   echo    '</div>
                        </div>';
                }
                Database::disconnect();
                echo  '</div>';
            ?>
        </div>
    </body>
</html>