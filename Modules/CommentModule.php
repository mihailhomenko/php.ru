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
	
	public static function addCommentAction()
	{
    $soome = new Models\Comment;
    $soome->text = App\Request::getStr('text');
    $soome->user_id = App\Request::getStr('user');
    Mappers\CommentMapper::insert($soome);
    echo "<script type=\"text/javascript\">alert(\"Комментарий добавлен\");</script>";

	}
}