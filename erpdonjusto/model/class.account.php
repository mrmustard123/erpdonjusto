<?php /*echo("estoy en account");*/use Doctrine\ORM\Mapping as ORM;/** * @ORM\Entity * @ORM\Table(name="account") */class Account {    /** @ORM\Id @ORM\Column(type="bigint") @ORM\GeneratedValue */    public $account_id;    /** @ORM\Column(length=255, nullable=false) */    public $account_code;    /** @ORM\Column(length=255, nullable=false) */    public $name;    /** @ORM\Column(length=300, nullable=true) */    public $account_type;    /** @ORM\Column(length=500, nullable=true) */    public $description;        function getAccount_id() {        return $this->account_id;    }    function getAccount_code() {        return $this->account_code;    }    function getName() {        return $this->name;    }            function getAccount_type(){                return $this->account_type;            }    function getDescription() {        return $this->description;    }    function setAccount_id($account_id) {        $this->account_id = $account_id;    }    function setAccount_code($code) {        $this->account_code = $code;    }    function setName($name) {        $this->name = $name;    }        function setAccount_type($account_type){                $this->account_type = $account_type;            }    function setDescription($description) {        $this->description = $description;    }            }  ?>