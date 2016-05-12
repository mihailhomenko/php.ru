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
    
    public static function listCommentAction()
	{
    for ($i = Mappers\CommentMapper::getCommentsRow()-1;  $i >= Mappers\CommentMapper::getCommentsRow()-App\Config::get('num_records'); $i--) {
    echo   '<div class="message">';
    $soome = new Models\Comment;
    $soome->text = '';
    $arr = Mappers\CommentMapper::select($soome);
    $arr = ($arr[$i]);
    print_r($arr->text); 
    echo '<div class = "of">'.($arr->getCreatedAt()).'</div>';
    echo   '</div>';
    }
	}
}