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

        if (App\Request::getStr('addcomment')) {
            $soome = new Models\Comment;
            $soome->text = App\Request::getStr('text');
            $soome->user_id = App\Request::getInt('user_id');
            $soome->likes_count = '1';
            $soome->id = '1';

            if ($soome->validate()){

                Mappers\CommentMapper::insert($soome);
                echo "<script type=\"text/javascript\">alert(\"Комментарий добавлен\");</script>";

            } else {
                echo "<script type=\"text/javascript\">alert(\"Заполинте поля\");</script>";}
        }

        echo App\Parser::formparsing('Forms\Template.php',array('Forms\add.php'));
	}
    
    
    public function listAction()
	{
       echo App\Parser::formparsing('Forms\Template.php',array('Forms\list.php'));
	}

    
    public function delAction()
    {

        if (App\Request::getStr('delcomment')) {
            $soome = new Models\Comment;
            $soome->id = App\Request::getInt('id');
            $soome->text = 'test';
            $soome->user_id = 'test';
            $soome->likes_count = '1';

            if ($soome->validate()){
                Mappers\CommentMapper::delete($soome);
                echo "<script type=\"text/javascript\">alert(\"Удалено\");</script>";
            } else {
                echo "<script type=\"text/javascript\">alert(\"Заполинте поля\");</script>";}
        }

        echo App\Parser::formparsing('Forms\Template.php',array('Forms\del.php'));
    }
}