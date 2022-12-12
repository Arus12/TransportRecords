<!DOCTYPE html>
<html lang="cs">

<head>
  <title>Evidence dopravy</title>
  <link href="css/style.css" rel="stylesheet" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="Jan Černý, Daniel Rutte" />
</head>

<body id="body">
  <header>
    <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <h1>Evidence dopravy</h1>
  </header>
  <div class="nav_button">
    <form action="html/spoj.html"><input type="hidden" /><button>
        <p>Přidat spoj</p>
      </button></form>

    <form action="html/cas.html"><input type="hidden" /><button>
        <p>Přidat čas</p>
      </button></form>

    <form action="php/call.php"><input type="hidden" name="what" value="2" /><button>
        <p>Reset systému</p>
      </button></form>
  </div>
  <div class="main">
  <script type="text/javascript" src="javascript/main.js" onload="showTable()"></script>
      <?php
      /**
       * @author Jan Černý
       */
      require "php/Loader.php";
      spl_autoload_register('Loader::load_index');
      $obj = new create_csv();
      ?>
  </div>
</body>

</html>