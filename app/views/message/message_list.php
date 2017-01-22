 <div class = class="col-md-6">
        <?php
        // Comprobar que tienes filas
        if (count($this->getAllMessages()) > 0) {
            // Sacar los datos de cada fila
            foreach ($this->getAllMessages() as $message) {
                  echo  '<pre>';
                  echo  $message->getMessage() .'</br></br>';
                  echo '<p class="blockquote-reverse">'.$message->getDateAdded().'</p>';
                  echo ' </pre>';
            }
        } else {
          echo  '<p class="text-info">No messages to show</p>';
        }
        ?>
</div>