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
	
	public function addAction()
	{
        echo App\Parser::formparsing('Forms\Template.php',array('Forms\add.php'));
        if (App\Request::getStr('addcomment')) {
            $soome = new Models\Comment;
            $soome->text = App\Request::getStr('text');
            $soome->user_id = App\Request::getStr('user');
            Mappers\CommentMapper::insert($soome);
            echo "<script type=\"text/javascript\">alert(\"Комментарий добавлен\");</script>";
        }
	}
    
    public function listAction()
	{
       echo App\Parser::formparsing('Forms\Template.php',array('Forms\list.php'));
	}

    public function delAction()
    {
        echo App\Parser::formparsing('Forms\Template.php',array('Forms\del.php'));
        if (App\Request::getStr('delcomment')) {
            $soome = new Models\Comment;
            $soome->id = App\Request::getStr('id');
            Mappers\CommentMapper::delete($soome);
            echo "<script type=\"text/javascript\">alert(\"Удалено\");</script>";
        }

    }
}