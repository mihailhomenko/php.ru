<?php
/**
* 
*/

namespace Modules;
use Models;
use App;
use Mappers;
/**
* 
*/
class CommentModule
{
	
	public static function deleteCommentAction()
	{
    $soome = new Models\Comment;
    $soome->text = App\Request::getStr('text');
    $soome->User_id = App\Request::getInt('user');
    Mappers\CommentMapper::insert($soome);
    echo "<script type=\"text/javascript\">alert(\"Письмо успешно отправлено\");</script>";

	}
}