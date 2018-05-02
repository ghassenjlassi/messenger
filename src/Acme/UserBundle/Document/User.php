<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Acme\UserBundle\Document;

use FOS\UserBundle\Document\User as BaseUser;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Acme\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser {

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Ansi\GhassenBundle\Document\GroupDis", mappedBy="users")
     */
    protected $groupDis;

    /**
     *
     * @var Acme\UserBundle\Document\User
     * @MongoDB\ReferenceMany(targetDocument="User")
     */
    protected $friends;

    /**
     *
     * @var string
     * @MongoDB\String
     */
    protected $photo;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Ansi\GhassenBundle\Document\Message",mappedBy="sender")
     */
    protected $messagesend = array();

    /**
     * @MongoDB\ReferenceMany(targetDocument="Ansi\GhassenBundle\Document\Message",mappedBy="receiver")
     */
    protected $messagereceiv = array();

    public function __construct() {
        parent::__construct();
        $this->groupDis = new \Doctrine\Common\Collections\ArrayCollection();
        $this->friends = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Add groupDi
     *
     * @param Ansi\GhassenBundle\Document\GroupDis $groupDi
     */
    public function addGroupDi(\Ansi\GhassenBundle\Document\GroupDis $groupDi) {
        $this->groupDis[] = $groupDi;
    }

    /**
     * Remove groupDi
     *
     * @param Ansi\GhassenBundle\Document\GroupDis $groupDi
     */
    public function removeGroupDi(\Ansi\GhassenBundle\Document\GroupDis $groupDi) {
        $this->groupDis->removeElement($groupDi);
    }

    /**
     * Get groupDis
     *
     * @return \Doctrine\Common\Collections\Collection $groupDis
     */
    public function getGroupDis() {
        return $this->groupDis;
    }

    /**
     * Add friend
     *
     * @param Acme\UserBundle\Document\User $friend
     */
    public function addFriend(\Acme\UserBundle\Document\User $friend) {
        $this->friends[] = $friend;
    }

    /**
     * Remove friend
     *
     * @param Acme\UserBundle\Document\User $friend
     */
    public function removeFriend(\Acme\UserBundle\Document\User $friend) {
        $this->friends->removeElement($friend);
    }

    /**
     * Get friends
     *
     * @return \Doctrine\Common\Collections\Collection $friends
     */
    public function getFriends() {
        return $this->friends;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return self
     */
    public function setPhoto($photo) {
        $this->photo = $photo;
        return $this;
    }

    /**
     * Get photo
     *
     * @return string $photo
     */
    public function getPhoto() {
        return $this->photo;
    }

    /**
     * Add messagesend
     *
     * @param Ansi\GhassenBundle\Document\Message $messagesend
     */
    public function addMessagesend(\Ansi\GhassenBundle\Document\Message $messagesend) {
        $this->messagesend[] = $messagesend;
    }

    /**
     * Remove messagesend
     *
     * @param Ansi\GhassenBundle\Document\Message $messagesend
     */
    public function removeMessagesend(\Ansi\GhassenBundle\Document\Message $messagesend) {
        $this->messagesend->removeElement($messagesend);
    }

    /**
     * Get messagesend
     *
     * @return \Doctrine\Common\Collections\Collection $messagesend
     */
    public function getMessagesend() {
        return $this->messagesend;
    }

    /**
     * Add messagereceiv
     *
     * @param Ansi\GhassenBundle\Document\Message $messagereceiv
     */
    public function addMessagereceiv(\Ansi\GhassenBundle\Document\Message $messagereceiv) {
        $this->messagereceiv[] = $messagereceiv;
    }

    /**
     * Remove messagereceiv
     *
     * @param Ansi\GhassenBundle\Document\Message $messagereceiv
     */
    public function removeMessagereceiv(\Ansi\GhassenBundle\Document\Message $messagereceiv) {
        $this->messagereceiv->removeElement($messagereceiv);
    }

    /**
     * Get messagereceiv
     *
     * @return \Doctrine\Common\Collections\Collection $messagereceiv
     */
    public function getMessagereceiv() {
        return $this->messagereceiv;
    }

    public $file;

    public function getFile() {
        return $this->file;
    }

    public function setFile($file) {
        $this->file = $file;
    }

    protected function getUploadDir() {
        return 'upload/users';
    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    //getWebPath() est une méthode qui renvoie le chemin web
    public function getWebPath() {
        return null === $this->photo ? null : $this->getUploadDir() . '/' . $this->photo;
    }

//getAbsolutePath() est une méthode pratique qui renvoie le chemin absolu vers le fichier 
    public function getAbsolutePath() {
        return null === $this->photo ? null : $this->getUploadRootDir() . '/' . $this->photo;
    }

    /**
     * @MongoDB\PrePersist
     */
    public function preUpload() {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->photo = uniqid() . '.' . $this->file->guessExtension();
        }
    }

    /**
     * @MongoDB\PostPersist
     */
    public function upload() {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->photo);

        unset($this->file);
    }

    /**
     * @MongoDB\PostRemove
     */
    public function removeUpload() {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

}
