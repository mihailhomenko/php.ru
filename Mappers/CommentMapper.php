<?php
/**
* Functions for working with database
* 
* @author Miha__ <mihail.homenko@yandex.ru>
* @version 1.0
*/

namespace Mappers;

use Db;
use Models;

/**
* Class for working with database
* 
* Class includes methods for working with database
*/
class CommentMapper
{	
	private static $model = 'Models\Comment';
	
	/**
	 *  method insert
	 * 
	 * @param obj $comment
	 * 
	 * @return int
	 */
	public static function insert (Models\Comment $comment)
	{
		
		$pdo = Db\Db::getPdoInstance();
		$comment->likes_count = '0';
		$stmt = $pdo->prepare('INSERT INTO `comments` (`user_id`, `text`, `likes_count`) VALUES (:user_id, :text, :likes_count);');
		$stmt->bindParam(':user_id', $comment->user_id, \PDO::PARAM_INT);
		$stmt->bindParam(':text', $comment->text, \PDO::PARAM_STR);
		$stmt->bindParam(':likes_count', $comment->likes_count, \PDO::PARAM_INT);

		$stmt->execute();
		
		return $pdo->lastInsertId();
	}

	/**
	 *  method delete
	 * 
	 * @param obj $comment
	 * 
	 * @return int
	 */
	public static function delete (Models\Comment $comment)
	{
		$pdo = Db\Db::getPdoInstance();
		
		$stmt = $pdo->prepare('DELETE FROM `comments` WHERE `id` =:id;');
		$stmt->bindParam(':id', $comment->id, \PDO::PARAM_INT);
		
		$stmt->execute();
		
		return $stmt->rowCount();
	}
	
	/**
	 *  method update
	 * 
	 * @return int
	 */
	public static function update ()
	{
		$pdo = Db\Db::getPdoInstance();
		
		$stmt = $pdo->prepare('UPDATE `comments` SET `likes_coun`t = `likes_count` + 1;');
		$stmt->execute();	
		
		return $stmt->rowCount();
	}
	
	/**
	 *  method select
	 * 
	 * @param obj $comment
	 * 
	 * @return array
	 */
	public static function select (Models\Comment $comment)
	{
		$pdo = Db\Db::getPdoInstance();
		
		$stmt = $pdo->prepare('SELECT * FROM `comments` WHERE `text` LIKE :text;');
		
		$text = '%'.$comment->text.'%';
		
		$stmt->bindParam(':text', $text, \PDO::PARAM_STR);
		$stmt->execute();
			
		return $data = $stmt->fetchAll(\PDO::FETCH_CLASS, static::$model);
	}
	
	/**
	* method selectById
	* 
	* @param obj $comment
	* 
	* @return obj
	*/
	public static function selectById (Models\Comment $comment)
	{
		$pdo = Db\Db::getPdoInstance();
		
		$stmt = $pdo->prepare('SELECT * FROM `comments` WHERE `id` = :id;');
		
		$stmt->bindParam(':id', $comment->id, \PDO::PARAM_STR);
		$stmt->execute();
			
		return $stmt->fetchAll(\PDO::FETCH_CLASS, static::$model);
	}
    
    public static function getCommentsRow()
    {
     $pdo = Db\Db::getPdoInstance();
      $query= $pdo->query("SELECT COUNT(*) as count FROM `comments`;");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $row=$query->fetch();
        return $members=$row['count'];
    }
}
