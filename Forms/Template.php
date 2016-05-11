<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="style.css" rel="stylesheet">
</head>

<body>

<div class="wrapper">
	<div class="middle">

		<div class="container">
			<main class="content">
             <br> 
                <br>
                <br>
<!--metka1-->                 <form action="index.php" method="post">
                <label for="user">Id пользователя: </label>
                <input type="text" name="user" size="20" maxlength="50">
                <br><br>
                <textarea cols="57" rows="3" name="text" ></textarea>
                <br><br>   
                  <input type="hidden" name="module" value="Comment" > 
                  <input type="hidden" name="action" value="add" >   
                <input type="submit" name="addcomment">
                </form>
 <!--metka2-->                
                
			</main>
		</div>
        
		<aside class="right-sidebar">
         <form action="index.php" method="post"> 
             <br><br>
             <input type="submit" name="deleteform" value="Удалить">
             <br><br>
             <input type="submit" name="addform" value="Добавить">
        </form>
		</aside>

	</div>
</div>

</body>
</html