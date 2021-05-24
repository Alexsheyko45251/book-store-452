<?php
$title = "Запит Виконано!";
require_once "./template/header.php";
?>


<label>Пошук покупок по даті</label>
<form action="kup.php" method="get" class="form-horizontal">

<input type="date" name="date" placeholder="Введіть дату">
<button type="submit" href="kup.php" class="btn btn-primary" >Відправити</button>


</form>
<br>
<br>



<label>Пошук покупок за період</label>
<form action="period.php" method="get" class="form-horizontal">
    <a>Початок</a>
    <input type="date" name="date" placeholder="Введіть дату ">
    <br>
    <a>Кінцевий</a>
    <input type="date" name="end_date" placeholder="Введіть дату ">

    <button type="submit" href="period.php" class="btn btn-primary" >Відправити</button>

</form>



<br>
<br>
<label>Пошук купівель за ISBN</label>
<form action="autg.php" method="get" class="form-horizontal">

    <input type="text" name="book_isbn" placeholder="Введіть isbn ">

    <button type="submit" href="autg.php" class="btn btn-primary" >Відправити</button>

    </form>
<br>
<br>
<a href="admin_check.php" class="btn btn-primary">Повернутися назад</a>




<?php
require_once "./template/footer.php";
?>


