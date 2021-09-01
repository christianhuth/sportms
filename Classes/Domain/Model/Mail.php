<?php
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    /**
     * Mail
     */
    class Mail extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\ContactType
         */
        protected $contactType;
        
        /**
         * @var string
         */
        protected $mail;
        
        /**
         * @return \ChristianKnell\Sportms\Domain\Model\ContactType
         */
        public function getContactType(): \ChristianKnell\Sportms\Domain\Model\ContactType
        {
            return $this->contactType;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\ContactType $contactType
         */
        public function setContactType(\ChristianKnell\Sportms\Domain\Model\ContactType $contactType): void
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