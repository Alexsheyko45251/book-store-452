<?php
  session_start();
  $count = 0;
  // connecto database
  
  $title = "Index";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $row = select4LatestBook($conn);
?>
 <h1 class="text-center">ПРО НАС</h1>
<h1><img class="img-responsive img-thumbnail" src="./bootstrap/img/info.png" width="250" height="200">
    Магазин "IT-Bookstore" має особливу концепцію, чітко визначену позицію. Ми вирізняємося серед більшості книжкових мереж тим, що просуваємо корисний продукт для вивчення мов програмування простим та зрозумілис функціоналом.
    </h1>

<h1> <img class="img-responsive img-thumbnail" src="./bootstrap/img/images.pc.jpg" width="250" height="200">Ця позиція відповідає очікуванням суспільства, адже, як засвідчують соціологічні дослідження, більшість споживачів віддають перевагу навчатися саме читаючи книги.</h1>

<h1> <img class="img-responsive img-thumbnail" src="./bootstrap/img/info2.png" width="250" height="200">Мережа Магазин "IT-Bookstore" – це заохочення не тільки для покупця, а й для іноземного видавця, оскільки його книги посідають тут чільне місце.
    Цим "IT-Bookstore" принципово відрізняється від більшості інших книжкових мереж в Україні, які цілеспрямовано просувають російську книгу.</h1>



<br>

<meta charset="UTF-8">
    <title>Розробник</title>
    <link rel="stylesheet" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    </head>
    <body>
    <main>
        <div class="button js-button-campaign"><span>Розробник</span></div>
    </main>
    <div class="overlay js-overlay-campaign">
        <div class="text-center popup js-popup-campaign" >
            <h1>МІНІСТЕРСТВО ОСВІТИ І НАУКИ УКРАЇНИ</h1>
            <h2>ДЕРЖАВНИЙ УНІВЕРСИТЕТ "ОДЕСЬКА ПОЛІТЕХНІКА"</h2>
            <h2>ХЕРСОНСЬКИЙ ПОЛІТЕХНІЧНИЙ ФАХОВИЙ КОЛЕДЖ</h2>
            <br>
            <h2>ДИПЛОМНИЙ ПРОЕКТ</h2>
            <p>НА ТЕМУ:</p>
            <br>
            <p>"РОЗРОБКА ІНТЕРНЕТ МАГАЗИНУ ДЛЯ ПРОДАЖУ IT-КНИГ" </p>
            <div class="text-right" align="left">
            <p>  РОЗРОБНИК: </p>
                <br>
                <p> СТУДЕНТ 452 ГРУПИ ШЕЙКО О.А.</p>
                <br>
                <p>КЕРІВНИК ДИПЛОМНОГО ПРОЕКТУ:</p>
                <br>
                <p>ЯКОВЕНКО В.Д.</p>
            </div>
            <a href="books.php" class="btn btn-primary">Перейти до вибору книг</a>
        </div>
            <div class="close-popup js-close-campaign " ></div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="main.js"></script>
    </body>
    </html>



    <!-- Example row of columns -->
    <p class="lead text-center text-muted">Список книг</p>
    <div class="row">
        <?php foreach($row as $book) { ?>
            <div class="col-md-3">
                <a href="book.php?bookisbn=<?php echo $book['book_isbn']; ?>">
                    <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $book['book_image']; ?>">
                </a>
            </div>
        <?php } ?>
    </div>
<?php
if(isset($conn)) {mysqli_close($conn);}
require_once "./template/footer.php";
?>

