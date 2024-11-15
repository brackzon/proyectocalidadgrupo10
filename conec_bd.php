
        <?php
         $mysqli = mysqli_connect ("localhost","root","","gestionbuses");
         if ($mysqli -> connect_errno) {
          echo "fallo" . $mysqli -> connect_error;       
         }
        ?>
