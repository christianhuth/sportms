<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * ContactType
     */
    class ContactType extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var string
         */
        protected $label;
        
        /**
         * @var boolean
         */
        protected $mailContactType;
        
        /**
         * @var boolean
         */
        protected $phoneContactType;
        
        /**
         * @var boolean
         */
        protected $urlContactType;
        
        /**
         * @return string $label
         */
        public function getLabel()
        {
            return $this->label;
        }
        
        /**
         * @param string $label
         * @return void
         */
        public function setLabel($label)
        {
            $this->label = $label;
        }
        
        /**
         * @return bool
         */
        public function isMailContactType(): bool
        {
            return $this->mailContactType;
        }
        
        /**
         * @param bool $mailContactType
         */
        public function setMailContactType(bool $mailContactType): void
        {
            $this->mailContactType = $mailContactType;
        }
        
        /**
         * @return bool
         */
        public function isPhoneContactType(): bool
        {
            return $this->phoneContactType;
        }
        
        /**
         * @param bool $phoneContactType
         */
        public function setPhoneContactType(bool $phoneContactType): void
        {
            $this->phoneContactType = $phoneContactType;
        }
        
        /**
         * @return bool
         */
        public function isUrlContactType(): bool
        {
            return $this->urlContactType;
        }
        
        /**
         * @param bool $urlContactType
         */
        public function setUrlContactType(bool $urlContactType): void
        {
            $this->urlContactType = $urlContactType;
        }
        
    }