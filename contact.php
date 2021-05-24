<?php
  $title = "Contact";
  require_once "./template/header.php";
?>
    <div class="row">
        <div class="col-md-3"></div>
		<div class="col-md-6 text-center">


			<form action="mail.php" method="post" class="form-horizontal">


			  	<fieldset>
				    <legend>Контакти</legend>
				    <p class="lead">Присилайте свої коментарі та пропозиції!<img class=" img-responsive img-thumbnail" src="./bootstrap/img/contact.jpg"   width="400" height="200"></p>
				    <div class="form-group">
				      	<label for="inputName" class="col-lg-2 control-label">Ім'я</label>
				      	<div class="col-lg-10">
				        	<input type="text" name="inputName" class="form-control" id="inputName" placeholder="Name">
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label for="inputEmail"  class="col-lg-2 control-label">Пошта</label>
				      	<div class="col-lg-10">
				        	<input type="text" name="inputEmail" class="form-control" id="inputEmail" placeholder="Email">
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label for="textArea" name="textArea" class="col-lg-2 control-label">Вміст листа</label>
				      	<div class="col-lg-10">
				        	<textarea class="form-control" name="textArea" rows="3" id="textArea"></textarea>
				        	<span class="help-block">Занадто довгий текст переходить на новий рядок не виходячи за рамки блоку. </span>
				      	</div>

				    </div>
				    <div class="form-group">
				      	<div class="col-lg-10 col-lg-offset-2">
				        	<button type="reset" class="btn btn-primary">Відміна</button>
				        	<button type="submit" href="books.php" class="btn btn-primary" >Відправити</button>
				      	</div>
				    </div>
			  	</fieldset>
			</form>
		</div>
		<div class="col-md-3"></div>
    </div>
<?php
  require_once "./template/footer.php";
?>