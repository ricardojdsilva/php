<?php

class Page {    


    private string $title = "";

    //Default Constructor
    function __construct($ntitle)   {
        $this->title = $ntitle;
    }

    //Create reader of Page
    function header() { ?>
    
        <!doctype html>
            <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
    
                <!-- Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
                <title><?php echo $this->title; ?></title>
            </head>
            <body>
                <div class="container">
                <h1><?php echo $this->title; ?></h1>
        
        <?php }
    

        //Create Footer
        function footer() {?>
        
                <!-- Optional JavaScript; choose one of the two! -->
    
                <!-- Option 1: Bootstrap Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
                <!-- Option 2: Separate Popper and Bootstrap JS -->
                <!--
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
                -->
                <div>
            </body>
            </html>
        <?php }


        //Body
    
        function html_fileUploadForm()  { ?>
            <form action="" method="post" enctype="multipart/form-data">

            <div class="input-group mb-3">
                <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                <input class="btn btn-outline-success" type="submit" value="Upload" name="submit">


            </div>
            </form>

            <?php }

      //Show Players
        function showPlayes(Array $players)  { ?>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col" ><a href="lab05-rsi-14.php?sort=playerNumber">Player No.</a></th>
              <th scope="col"><a href="lab05-rsi-14.php?sort=FirstName">First Name</a></th>
              <th scope="col"><a href="lab05-rsi-14.php?sort=LastName">Last Name</a></th>
              <th scope="col"><a href="lab05-rsi-14.php?sort=Position">Position</a></th>
              <th scope="col"><a href="lab05-rsi-14.php?sort=Bats">Bats</a></th>
              <th scope="col"><a href="lab05-rsi-14.php?sort=Throw">Throw</a></th>
              <th scope="col"><a href="lab05-rsi-14.php?sort=Age">Age</a></th>
              <th scope="col"><a href="lab05-rsi-14.php?sort=Height">Height</a></th>
              <th scope="col"><a href="lab05-rsi-14.php?sort=Weight">Weight</a></th>
              <th scope="col"><a href="lab05-rsi-14.php?sort=BirthPlace">BirthPlace</a></th>
            </tr>
          </thead>
          <tbody>
        
        
          <?php 
          foreach ($players as $p)   {
            echo '<tr>';
            echo '<td scope="col">'.$p->getPlayerNumber().'</td>';
            echo '<td scope="col">'.$p->getFirstName().'</td>';
            echo '<td scope="col">'.$p->getLastName() .'</td>';
            echo '<td scope="col">'.$p->getPosition().'</td>';
            echo '<td scope="col">'.$p->getBats().'</td>';
            echo '<td scope="col">'.$p->getsThrow().'</td>';
            echo '<td scope="col">'.$p->getAge().'</td>';
            echo '<td scope="col">'.$p->getHeight().'</td>';
            echo '<td scope="col">'.$p->getWeight().'</td>';
            echo '<td scope="col">'.$p->getBirthPlace().'</td></tr>';
        
          } ?>
    
          <?php
    }



}


?>