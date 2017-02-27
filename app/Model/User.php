<?php

namespace App\Model;

class User
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    public function __construct($id, $name, $email = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public static function all()
    {
        return [
            new User(1, 'John Doe', 'john@doe.com'),
            new User(2, 'Florence Mayer', 'f.mayer@yahoo.com'),
            new User(3, 'Terrence Hill'),
        ];
    }

    public static function getById($id)
    {
        return array_filter(
            self::all(),
            function(User $user) use ($id) {
                return ($user->getId() == $id);
            }
        );
    }

    public static function getByName($name)
    {
        return array_filter(
            self::all(),
            function(User $user) use ($name) {
                return ($user->getName() == $name);
            }
        );
    }

    public static function getByEmail($email)
    {
        return array_filter(
            self::all(),
            function(User $user) use ($email) {
                return ($user->getEmail() == $email);
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

}
