<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * Mail
     */
    class Mail extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
    
        /**
         * @var ContactType
         */
        protected $contactType;
        
        /**
         * @var string
         */
        protected $mail;
    
        /**
         * @return ContactType
         */
        public function getContactType(): ContactType
        {
            return $this->contactType;
        }
    
        /**
         * @param ContactType $contactType
         */
        public function setContactType(ContactType $contactType): void
        {
            $this->contactType = $contactType;
        }
        
        /**
         * @return string
         */
        public function getMail(): string
        {
            return $this->mail;
        }
    
        /**
         * @param string $mail
         */
        public function setMail($mail): void
        {
            $this->mail = $mail;
        }
        
    }