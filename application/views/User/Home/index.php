<div class="row">
    <div class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">Notícias</h3>
            </div>
            <ul class="list-group">
              <?php
                if(sizeof($dados) != 0){
              ?>
                  <li class="list-group-item">        
                    <h1 class="media-heading"><?php echo $dados[0]->titulo; ?></h1>
                    <p>Data: <i><?php echo $dados[0]->datahorapublicacao; ?></i></p>
                    <p>
                        <?php 
                            echo substr($dados[0]->descricao, 0, 20);

                            if(strlen($dados[0]->descricao) > 20){
                                echo "...";
                        ?>
                            <a href=""> Saiba mais</a>
                        <?php
                            }

                        ?>
                    </p>
                    <?php
                        if ($dados[0]->foto != null) {
                    ?>
                            <a href="#">
                              <img class="img-responsive" src="/uploads/<?php echo $dados[0]->foto; ?>" alt="...">
                            </a>
                    <?php
                        }

                    for($i = 1; $i < count($dados); $i++){
                  ?>

                      <li class="list-group-item">
                            <h4><?php echo $dados[$i]->titulo; ?></h4>
                            <p>Data: <i><?php echo $dados[$i]->datahorapublicacao; ?></i></p>
                            <p>
                                <?php 
                                    echo substr($dados[$i]->descricao, 0, 10);

                                    if(strlen($dados[$i]->descricao) > 10){
                                        echo "...";
                                ?>
                                    <a href="">Saiba mais</a>
                                <?php
                                    }

                                ?>
                                
                            </p>
                      </li>

                  <?php
                    }
                  ?>
                <?php
                }
                else{
                
                ?>
                    
                    <h4 class="text-center">Não há Notícias</h4>

                <?php    
                    }
                ?>
                    
                  </li>
              

            </ul>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Endereços Úteis</h4>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="http://www.riogrande.ifrs.edu.br/site/" target="_blank">
                        <img class="img-responsive" src='/images/ifrs.png'>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="https://ingresso.ifrs.edu.br/" target="_blank">
                        <img class="img-responsive" src='/images/seletivo.png'>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>