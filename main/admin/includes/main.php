<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
<?php
            switch ($page) {
              case 'xeberler':
                require('pages/xeberler.php');
                break;

              case 'kateqoriyalar':
                require('pages/kateqoriyalar.php');
                break;

              case 'sosial':
                require('pages/sosial.php');
                break;

              case 'istifadeciler':
                require('pages/istifadeciler.php');
                break;

              case 'haqqimizda':
                require('pages/haqqimizda.php');
                break;

              case 'mainview':
                require('views/mainview.php');
                break;

              case 'edit':
                require('pages/edit.php');
                break;
              
              default:
                require('pages/esas.php');
                break;


            }
?>
        </main>