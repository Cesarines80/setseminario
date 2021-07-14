<?php
class conexion {

  /**
  * Gestiona la conexión con la base de datos
  */

            private $dbhost = 'localhost';

            private $dbuser = 'setbolivia_seti';

            private $dbpass = 'Casimiro11#';

            private $dbname = 'setbolivia_set';

            public function conexion () {

            /**
            * @return object link_id con la conexión
            */

              $link_id = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);

              if ($link_id ->connect_error) {

              echo "Error de Connexion ($link_id->connect_errno)

              $link_id->connect_error\n";

              header('Location: error-conexion.php');

              exit;

              } else {

              return $link_id;

              }

              }

  }
?>
