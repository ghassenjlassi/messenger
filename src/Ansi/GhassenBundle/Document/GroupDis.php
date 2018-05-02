<?php

namespace Ansi\GhassenBundle\Document;


use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Ansi\GhassenBundle\Repository\GroupsRepository")
 */
class GroupDis
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;
     /**
     * @MongoDB\ReferenceMany(targetDocument="Acme\UserBundle\Document\User" , inversedBy="groupDis")
     */
    
    protected $users; 
    
    /**
     * @MongoDB\Referenceone(targetDocument="Acme\UserBundle\Document\User")
     */
    protected $creatby;
 
   
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Add user
     *
     * @param Acme\UserBundle\Document\User $user
     */
    public function addUser(\Acme\UserBundle\Document\User $user)
    {
        $this->users[] = $user;
    }

    /**
     * Remove user
     *
     * @param Acme\UserBundle\Document\User $user
     */
    public function removeUser(\Acme\UserBundle\Document\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection $users
     */
    public function getUsers()
    {
        return $this->users;
    }
   

    /**
     * Set creatby
     *
     * @param Acme\UserBundle\Document\User $creatby
     * @return self
     */
    public function setCreatby(\Acme\UserBundle\Document\User $creatby)
    {
        $this->creatby = $creatby;
        return $this;
    }

    /**
     * Get creatby
     *
     * @return Acme\UserBundle\Document\User $creatby
     */
    public function getCreatby()
    {
        return $this->creatby;
    }

    /**
     * Add messagegroup
     *
     * @param Ansi\GhassenBundle\Document\Message $messagegroup
     */
    public function addMessagegroup(\Ansi\GhassenBundle\Document\Message $messagegroup)
    {
        $this->messagegroup[] = $messagegroup;
    }

    /**
     * Remove messagegroup
     *
     * @param Ansi\GhassenBundle\Document\Message $messagegroup
     */
    public function removeMessagegroup(\Ansi\GhassenBundle\Document\Message $messagegroup)
    {
        $this->messagegroup->removeElement($messagegroup);
    }

    /**
     * Get messagegroup
     *
     * @return \Doctrine\Common\Collections\Collection $messagegroup
     */
    public function getMessagegroup()
    {
        return $this->messagegroup;
    }
}
