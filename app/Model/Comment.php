<?php

namespace App\Model;

class Comment
{
    /**
     * @var int
     */
    protected $userId;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $timestamp;

    /**
     * @var int
     */
    protected $parent_status;

    /**
     * @var int
     */
    protected $likesCount;

    public function __construct($userId, $id, $text)
    {
        $this->userId = $userId;
        $this->id = $id;
        $this->text = $text;
        $this->timestamp = (new \DateTime())->format('c');
        $this->parent_status = 1;
        $this->likesCount = mt_rand(0, 20);
    }

    public static function all()
    {
        return [
            new Comment(1, 1, 'Bin grad einkaufen.'),
            new Comment(2, 2, 'Nee, geht so.'),
            new Comment(1, 3, 'So ein schönes Bild!'),
            new Comment(2, 4, 'Aha, hast du das auch erst gestern erfahren?'),
            new Comment(3, 5, 'Der Elefant betrat den Prozellan-Laden.'),
        ];
    }

    public static function getById($id)
    {
        return array_filter(
            self::all(),
            function(Comment $comment) use ($id) {
                return ($comment->getId() == $id);
            }
        );
    }

    public static function findByUserId($userId)
    {
        return array_filter(
            self::all(),
            function(Comment $comment) use ($userId) {
                return ($comment->getUserId() == $userId);
            }
        );
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param string $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return int
     */
    public function getParentStatus()
    {
        return $this->parent_status;
    }

    /**
     * @param int $parent_status
     */
    public function setParentStatus($parent_status)
    {
        $this->parent_status = $parent_status;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getLikesCount()
    {
        return $this->likesCount;
    }

    /**
     * @param int $likesCount
     */
    public function setLikesCount($likesCount)
    {
        $this->likesCount = $likesCount;
    }
}
