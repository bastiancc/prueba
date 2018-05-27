<?php require_once("funciones.php");
 ?>

<header>
  <style media="screen">
    *{ margin:0; padding: 0; box-sizing: border-box}

    body{
      font-size: 14px;
      font-family: 'Roboto', sans-serif;
      max-width: 100%;
    }
      header h2 {
        font-size: 1em;
      }
      header h2 a {
        float: left;
        font-size: 0.9em;
        color: black;
        text-decoration: none;
        padding: 0.3%;
      }
       ul h2 a :hover{
        color: #4F89C4;
        background-color: white;
      }
    nav {
      top:0;
      left:0;
      right:0;
      padding: 10px;
      position: relative;
    }

    nav ul {
      list-style:none;
      padding:0;
      margin:0;
      overflow:hidden;
    }

    nav > ul > li {
      float:right;

    }
    nav ul li a {

      text-decoration:none;
      background-color:rgba(255,255,255,0.35);
      display:block;
      color: black;
      padding: 10px 20px;
    }

    nav ul li a:hover {
      /*background:#3669a3;*/
      color: #4F89C4;
      background-color: white;

      }

    nav > ul > li:hover div {
      display:table;
    }

    /*Submenu*/
    nav ul li div {
      width:8%;
      position: absolute;
      left:88%;
      box-sizing:border-box;
      display:none;

    }

    nav ul li div ul{
      width:20%;
      display:table-cell;
      border-right:1px solid rgba(255,255,255,.5);
      box-sizing:border-box;
    }

    nav ul li div ul:last-child {
      border:none;
    }

    nav ul li div ul .titulo {
      background:#000;
      color:#fff;

    }

    nav ul li div ul  a {
      color:#fff;
      padding: 15px 20px;;

    }

    nav ul li div ul .titulo a:hover {
      background:none;
    }

    nav ul li div ul li a {
      color:#000;

    }

    nav ul li div ul li a:hover {
      color: black;

    }
   h3 p{ position: relative;
     left: 60%;
   }

  </style>


    <body>
      <nav>
        <ul>
          <h2><a href="#">Website Logo</a></h2>
          <h3><p>
            Bienvenido <?php  $ultimoId = traerNombrePorId($_SESSION['id']);
            echo $ultimoId;   ?>
          </p></h3>

          <li><a href="#">Mis Datos</a>
          <div>
            <ul class="caja">
              <li><a href="index.php">Inicio</a></li>
              <li><a href="perfil.php">Perfil</a></li>
              <li><a href="faq.html">Faq</a></li>
              <li><a href="desloguear.php">Salir</a></li>
            </ul>
          </div>
        </li>
      </ul>
      </nav>
    </header>
