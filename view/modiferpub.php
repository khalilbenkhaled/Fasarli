<?php
    include_once '../Model/publication.php';
    include_once '../Controller/PublicationC.php';

    $error = "";

    
    $pub = null;

    // create an instance of the controller
    $publicationC = new publicationC();
    if (
        isset($_POST["title"]) &&
	    	isset($_POST["contenu"]) &&		
        isset($_POST["datePub"])
    ) {
        if (
            !empty($_POST["title"]) && 
		      	!empty($_POST['contenu']) &&
            !empty($_POST["datePub"])
        ) {
            $pub = new Publication(
                 $_POST['title'],
				 $_POST['contenu'],
                 $_POST['datePub'], 
				          
            );
           
            $publicationC->modifierpub($pub,$__POST["idPub"]);
            header('Location: afficherPublications.php');
        }
        else
            $error = "Missing information";
    }
   

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
  <?php
       

  ?>
  <h1>Ajouter une publication:</h1>

  	
  <?php
			if (isset($_POST['idPub'])){
				$publication = $Publicationc->recupererpub($_POST['idPub']);
				
		?>
  <form action="" methode ="POST">
    <label for="titre" >titre:</label> 
       <input type="text" name="title" placeholder="entrez le titre de publication" <?php echo"$__POST["$title"]" >   ?> <br> <br>
       <textarea name="contenu" cols="30" rows="10" value="<?php echo"$POST["$contenu"]" ?>" placeholder="ecrivez votre Besoin"></textarea> <br>
        <input type="datetime" name="datePub" value="<?php echo "$__POST["$datePub"]"; ?>"> <br>

<input class="btn btn-primary" name="submit" type="submit" value="ajouter"> 
 </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>


