<?php

namespace Ansi\GhassenBundle\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Ansi\GhassenBundle\Repository\MessageRepository")
 */
class Message {
 
     /**
     * @MongoDB\Id(strategy="auto") 
     */
    protected $id;
   /**
     * @MongoDB\ReferenceOne(targetDocument="Acme\UserBundle\Document\User",inversedBy="messagesend")
     */
    protected $sender;
    /**
      * @MongoDB\ReferenceOne(targetDocument="Acme\UserBundle\Document\User",inversedBy="messagereceiv")
     */
    protected $receiver;
     /**
      * @MongoDB\ReferenceOne(targetDocument="Ansi\GhassenBundle\Document\GroupDis",cascade={"remove"})
     */
    protected $receivergroup;
     /**
     * @MongoDB\String
     */
    protected $message;
     /**
     * @MongoDB\String
     */
    protected $status;
    /**
     * @MongoDB\Date
     */
    protected $date;
    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sender
     *
     * @param Acme\UserBundle\Document\User $sender
     * @return self
     */
    public function setSender(\Acme\UserBundle\Document\User $sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * Get sender
     *
     * @return Acme\UserBundle\Document\User $sender
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set receiver
     *
     * @param Acme\UserBundle\Document\User $receiver
     * @return self
     */
    public function setReceiver(\Acme\UserBundle\Document\User $receiver)
    {
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * Get receiver
     *
     * @return Acme\UserBundle\Document\User $receiver
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return self
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Get message
     *
     * @return string $message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return string $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set date
     *
     * @param date $date
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get date
     *
     * @return date $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set receivergroup
     *
     * @param Ansi\GhassenBundle\Document\GroupDis $receivergroup
     * @return self
     */
    public function setReceivergroup(\Ansi\GhassenBundle\Document\GroupDis $receivergroup)
    {
        $this->receivergroup = $receivergroup;
        return $this;
    }

    /**
     * Get receivergroup
     *
     * @return Ansi\GhassenBundle\Document\GroupDis $receivergroup
     */
    public function getReceivergroup()
    {
        return $this->receivergroup;
    }
}
