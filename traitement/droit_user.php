<?php
    include ('../include/connectBDD.php');

    $id_user=$_POST['id_user'];
    $id_typeuser=$_POST['id_typeuser'];

    $req=$bdd->prepare("UPDATE User SET id_type_user = :id_type_user WHERE id_user= :id_user");
    $req->execute(array(
      'id_type_user'=> $id_typeuser,
	     'id_user'=> $id_user
    ));
    // echo "Le niveau des droits a été modifiés";
    header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_user.php?message=1');
    // echo '<a href="../admin.php">retour</a>';


    // $sql-> closeCursor();
    //   header('location: admin.php');
?>
