<form action="index.php" method="post">
<label for="id">Id коментария: </label>
<input type="text" name="id" size="10" maxlength="10">
<br><br>
    <input type="hidden" name="module" value="Comment" >
    <input type="hidden" name="action" value="del" >
    <input type="submit" name="delcomment" value="Удалить">
</form>