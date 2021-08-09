<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * Mail
     */
    class Mail extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
    
        /**
         * @var \Balumedien\Sportms\Domain\Model\ContactType
         */
        protected $contactType;
        
        /**
         * @var string
         */
        protected $mail;
    
        /**
         * @return \Balumedien\Sportms\Domain\Model\ContactType
         */
        public function getContactType(): \Balumedien\Sportms\Domain\Model\ContactType
        {
            return $this->contactType;
        }
    
        /**
         * @param \Balumedien\Sportms\Domain\Model\ContactType $contactType
         */
        public function setContactType(\Balumedien\Sportms\Domain\Model\ContactType $contactType): void
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