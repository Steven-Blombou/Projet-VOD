<!--TOGGLE MOBILE-->

<div class="menu-wrap">
    <input type="checkbox" class="toggler">
    <div class="hamburger">
        <div></div>
    </div>
    <div class="menu">
        <div>
            <div>
                <ul>
                    <Li><a href="catalogue.php">Films</a></Li>
                    <?php
                    if (isset($_SESSION['username']) && isset($_SESSION['typeuser'])) // Je verifie l existence des valeurs de session username et type par securité
                    {
                    echo ("<li>");
                    echo ("<a href='member_space.php'>" . "bonjour" . "&nbsp" . $_SESSION['username'] . "</a>"); // "&nbsp"=espace en php  J etablie la connexion et j affiche le message
                    echo ('<a href="include/sedeconnecter.php"> se déconnecter </a>'); //  J inclus la possibilité de se deconnecter
                    echo ("</li>");
                     }
                    else
                    {
                    ?>
                    <li><a href="connexion.php">Connexion</a></li>
                    <li><a href="register.php">S'enregistrer</a></li>
                    <?php
                    }
                    ?>
                        <div class="liens-couleurs">

                    <li>
                        <div class="style_axel"><a href="<?php echo $actuel; ?>?style=../css/index.css"></a>
                            <div>
                    </li>
                    <li>
                        <div class="style_pol"><a href="<?php echo $actuel; ?>?style=../pol/index2.css"></a></div>
                    </li>
                    <li>
                        <div class="style_steven"><a href="<?php echo $actuel; ?>?style=../steven/index3.css"></a></div>
                    </li>
                    <li>
                        <div class="style_ilayda"><a href="<?php echo $actuel; ?>?style=../axel/index4.css"></a></div>
                    </li>
                    </div>



                    <form action="search_bar_verif.php">
                        <input class="form-control" type="text" value="" name="search" placeholder="Rechercher votre film"/>
                        <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
                    </form>



                </ul>
            </div>
        </div>
    </div>

</div>


<!--TITRE-->

<div class="title-dada">
    <h1> <a href="index.php"> ALLO SIMPLON</a></h1>
</div>


<!--NAV BAR-->

<div class="nav-dada">
    <div class="logo-dada">
        <h1><a class="lien-home" href="index.php">ALLO SIMPLON</a> </h1>
    </div>
    <div class="menu-nav">
        <form class="search-bar" action="">
            <input  class="form-control"  type="text" id="search_film" value="" placeholder="Rechercher votre film" name="search">
            <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
        </form>

        <div style="margin-top: 20px">
          <div id="result-search">  <!-- C'est ici que nous aurons nos résultats de notre recherche -->
          </div>
        </div>

        <div class="menu-dada">
            <ul>

                <li>
                    <div class="style_axel"><a href="<?php echo $actuel; ?>?style=axel/index4.css"></a>
                        <div>
                </li>
                <li>
                    <div class="style_pol"><a href="<?php echo $actuel; ?>?style=pol/index2.css"></a></div>
                </li>
                <li>
                    <div class="style_steven"><a href="<?php echo $actuel; ?>?style=steven/index3.css"></a></div>
                </li>
                <li>
                    <div class="style_ilayda"><a href="<?php echo $actuel; ?>?style=index.css"></a></div>
                </li>
                <li><a href="catalogue.php">Films</a></li>

<?php
if (isset($_SESSION['username']) && isset($_SESSION['typeuser'])) // Je verifie l existence des valeurs de session username et type par securité
{
echo ("<li>");
echo ("<a href='member_space.php'>" . "bonjour" . "&nbsp" . $_SESSION['username'] . "</a>"); // "&nbsp"=espace en php  J etablie la connexion et j affiche le message
echo ('<a href="include/sedeconnecter.php"> se déconnecter </a>'); //  J inclus la possibilité de se deconnecter
echo ("</li>");
 }
else
{
?>
<li><a href="connexion.php">Connexion</a></li>
<li><a href="register.php">S'enregistrer</a></li>
<?php
}
?>

            </ul>
        </div>
    </div>
</div>

<div class="vide"></div>
