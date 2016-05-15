                <form action="index.php" method="post">
                <label for="user">Id пользователя: </label>
                <input type="text" name="user" size="20" maxlength="50">
                <br><br>
                <textarea cols="57" rows="3" name="text" ></textarea>
                <br><br>   
                  <input type="hidden" name="module" value="Comment" > 
                  <input type="hidden" name="action" value="add" >   
                <input type="submit" name="addcomment">
                </form>
