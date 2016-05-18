<?php
/**
* Model db comments
* 
* @author Miha__ <mihail.homenko@yandex.ru>
* @version 1.0
*/

namespace Models;

/**
* Model db comments
*/
class Comment
{
	public $id;
	public $user_id;
	protected $created_at;
	public $text;
	public $likes_count;


	public function getCreatedAt()
	{
		return $this->created_at;
	}

	public function validate()
	{
		if (!$this->text or !$this->user_id or !$this->id or !$this->likes_count) {
			return false;
		} else {
			return true;
		};
	}
}