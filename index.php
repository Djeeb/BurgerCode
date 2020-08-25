<!DOCTYPE html>
<html>
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
                        echo '<div class="tab-pane active" id="' . $category['id'] .'">';
                    else
                        echo '<div class="tab-pane" id="' . $category['id'] .'">';
                    
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



<!--
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
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/script.js"></script>
    <script
      src="https://kit.fontawesome.com/d9d02b30db.js"
      crossorigin="anonymous"
    ></script>

    <title>Burger Code</title>
  </head>
  <body>
    <div class="container site">
      <h1 class="text-logo">
        <i class="fas fa-utensils"></i> Burger Code
        <i class="fas fa-utensils"></i>
      </h1>

      <?php 
      


      /*
      require 'adim/database.php';
      echo  '<nav>
              <ul class="nav nav-pills justify-content-center" role="tablist">';
      $db = Database::connect();
      $statement = $db->query('SELECT * FROM categories');
      $categories = $statement->fetchAll();
      foreach ($categories as $category) {
        if($category['id'] == '1')
            echo '<li class="nav-item"><a class="nav-link active" href="#onglet' .$category['id']. '" data-toggle="pill">' .$category['name']. '</a></li>';
        else
            echo '<li class="nav-item"><a class="nav-link" href="#onglet' .$category['id']. '" data-toggle="pill">' .$category['name']. '</a></li>';
      }
      echo    '</ul>
            </nav>';

      ?>


      
          
          
        

      <div class="tab-content">
        <!-- ONGLET 1-->
        <div class="tab-pane show active" id="onglet1" role="tabpanel">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/m1.png" alt="..." />
                <div class="price">8.90 €</div>
                <div class="caption">
                  <h4>Menu Classic</h4>
                  <p>
                    Sandwich: Burger, Salade, Tomate, Cornichon + Frites +
                    Boisson
                  </p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      class="shopping-cart"
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/m2.png" alt="..." />
                <div class="price">9.50 €</div>
                <div class="caption">
                  <h4>Menu Bacon</h4>
                  <p>
                    Sandwich: Burger,Fromage, Bacon, Salade, Tomate + Frites +
                    Boisson
                  </p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/m3.png" alt="..." />
                <div class="price">10.90 €</div>
                <div class="caption">
                  <h4>Menu Big</h4>
                  <p>
                    Sandwich: Double Burger, Fromage, Cornichon, Salade + Frites
                    + Boisson
                  </p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/m4.png" alt="..." />
                <div class="price">9.90 €</div>
                <div class="caption">
                  <h4>Menu Chicken</h4>
                  <p>
                    Sandwich: Poulet frit, Tomate, Salade, Mayonnaise + Frites +
                    Boisson
                  </p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/m5.png" alt="..." />
                <div class="price">10.90 €</div>
                <div class="caption">
                  <h4>Menu Fish</h4>
                  <p>
                    Sandwich: Poisson, Salade, Mayonnaise, Cornichon + Frites +
                    Boisson
                  </p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/m6.png" alt="..." />
                <div class="price">8.90 €</div>
                <div class="caption">
                  <h4>Menu Double Steak</h4>
                  <p>
                    Sandwich: Double Burger, Fromage, Bacon, Salade, Tomate +
                    Frites + Boisson
                  </p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ONGLET 2 -->
        <div class="tab-pane show active" id="onglet2" role="tabpanel">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/b1.png" alt="..." />
                <div class="price">5.90 €</div>
                <div class="caption">
                  <h4>Classic</h4>
                  <p>
                    Sandwich: Burger, Salade, Tomate, Cornichon
                  </p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/b2.png" alt="..." />
                <div class="price">6.50 €</div>
                <div class="caption">
                  <h4>Bacon</h4>
                  <p>
                    Sandwich: Burger,Fromage, Bacon, Salade, Tomate
                  </p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/b3.png" alt="..." />
                <div class="price">6.90 €</div>
                <div class="caption">
                  <h4>Big</h4>
                  <p>
                    Sandwich: Double Burger, Fromage, Cornichon, Salade
                  </p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/b4.png" alt="..." />
                <div class="price">5.90 €</div>
                <div class="caption">
                  <h4>Chicken</h4>
                  <p>
                    Sandwich: Poulet frit, Tomate, Salade, Mayonnaise
                  </p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/b5.png" alt="..." />
                <div class="price">6.50 €</div>
                <div class="caption">
                  <h4>Fish</h4>
                  <p>
                    Sandwich: Poisson, Salade, Mayonnaise, Cornichon
                  </p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/b6.png" alt="..." />
                <div class="price">7.50 €</div>
                <div class="caption">
                  <h4>Double Steak</h4>
                  <p>
                    Sandwich: Double Burger, Fromage, Bacon, Salade, Tomate
                  </p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ONGLET 3 -->
        <div class="tab-pane show active" id="onglet3" role="tabpanel">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/s1.png" alt="..." />
                <div class="price">3.90 €</div>
                <div class="caption">
                  <h4>Frites</h4>
                  <p>Pommes de terre frites</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/s2.png" alt="..." />
                <div class="price">3.40 €</div>
                <div class="caption">
                  <h4>Onion Rings</h4>
                  <p>Rondelles d'oignon frits</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/s3.png" alt="..." />
                <div class="price">5.90 €</div>
                <div class="caption">
                  <h4>Nuggets</h4>
                  <p>Nuggets de poulet frits</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/s4.png" alt="..." />
                <div class="price">3.50 €</div>
                <div class="caption">
                  <h4>Nuggets Fromage</h4>
                  <p>Nuggets de fromage frits</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/s5.png" alt="..." />
                <div class="price">5.90 €</div>
                <div class="caption">
                  <h4>Ailes de poulet</h4>
                  <p>Ailes de poulet Barbecue</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ONGLET 4 -->
        <div class="tab-pane show active" id="onglet4" role="tabpanel">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/sa1.png" alt="..." />
                <div class="price">8.90 €</div>
                <div class="caption">
                  <h4>César Poulet Pané</h4>
                  <p>Poulet Pané, Salade, Tomate et la fameuse sauce César</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/sa2.png" alt="..." />
                <div class="price">8.90 €</div>
                <div class="caption">
                  <h4>César Poulet Grillé</h4>
                  <p>Poulet Grillé, Salade, Tomate et la fameuse sauce César</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/sa3.png" alt="..." />
                <div class="price">5.90 €</div>
                <div class="caption">
                  <h4>Salade Light</h4>
                  <p>Salade, Tomate, Concombre, Maïs et Vinaigre balsamique</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/sa4.png" alt="..." />
                <div class="price">7.90 €</div>
                <div class="caption">
                  <h4>Poulet Pané</h4>
                  <p>Poulet Pané, Salade, Tomate et la sauce de votre choix</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/sa5.png" alt="..." />
                <div class="price">7.90 €</div>
                <div class="caption">
                  <h4>Poulet Grillé</h4>
                  <p>
                    Poulet Grillé, Salade, Tomate et la sauce de votre choix
                  </p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ONGLET 5 -->
        <div class="tab-pane show active" id="onglet5" role="tabpanel">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/bo1.png" alt="..." />
                <div class="price">1.90 €</div>
                <div class="caption">
                  <h4>Coca-Cola</h4>
                  <p>Au choix: Petit, Moyen ou Grand</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/bo2.png" alt="..." />
                <div class="price">1.90 €</div>
                <div class="caption">
                  <h4>Coca-Cola Light</h4>
                  <p>Au choix: Petit, Moyen ou Grand</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/bo3.png" alt="..." />
                <div class="price">1.90 €</div>
                <div class="caption">
                  <h4>Coca-Cola Zéro</h4>
                  <p>Au choix: Petit, Moyen ou Grand</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/bo4.png" alt="..." />
                <div class="price">1.90 €</div>
                <div class="caption">
                  <h4>Fanta</h4>
                  <p>Au choix: Petit, Moyen ou Grand</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/bo5.png" alt="..." />
                <div class="price">1.90 €</div>
                <div class="caption">
                  <h4>Sprite</h4>
                  <p>Au choix: Petit, Moyen ou Grand</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/bo6.png" alt="..." />
                <div class="price">1.90 €</div>
                <div class="caption">
                  <h4>Nestea</h4>
                  <p>Au choix: Petit, Moyen ou Grand</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ONGLET 6 -->
        <div class="tab-pane show active" id="onglet6" role="tabpanel">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/d1.png" alt="..." />
                <div class="price">4.90 €</div>
                <div class="caption">
                  <h4>Fondant au chocolat</h4>
                  <p>Au choix: Chocolat Blanc ou au lait</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/d2.png" alt="..." />
                <div class="price">2.90 €</div>
                <div class="caption">
                  <h4>Muffin</h4>
                  <p>Au choix: Aux fruits ou au chocolat</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/d3.png" alt="..." />
                <div class="price">2.90 €</div>
                <div class="caption">
                  <h4>Beignet</h4>
                  <p>Au choix: Au chocolat ou à la vanille</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/d4.png" alt="..." />
                <div class="price">3.90 €</div>
                <div class="caption">
                  <h4>Milkshake</h4>
                  <p>Au choix: Fraise, Vanille ou Chocolat</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
              <div class="img-thumbnail">
                <img class="container-fluid" src="images/d5.png" alt="..." />
                <div class="price">4.90 €</div>
                <div class="caption">
                  <h4>Sundae</h4>
                  <p>Au choix: Fraise, Caramel ou Chocolat</p>
                  <a href="#" type="button" class="btn btn-order" role="button"
                    ><img
                      src="images/shopping_cart-24px.svg"
                      alt=""
                    />Commander</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
