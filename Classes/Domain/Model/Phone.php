<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    class Phone extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
    
        /**
         * @var ContactType
         */
        protected $contactType;
        
        /**
         * @var string
         */
        protected $areaCode;
        
        /**
         * @var string
         */
        protected $callingNumber;
        
        /**
         * @var string
         */
        protected $internationalAreaCode;
    
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
        public function getAreaCode(): string
        {
            return $this->areaCode;
        }
        
        /**
         * @param string $areaCode
         */
        public function setAreaCode(string $areaCode): void
        {
            $this->areaCode = $areaCode;
        }
        
        /**
         * @return string
         */
        public function getCallingNumber(): string
        {
            return $this->callingNumber;
        }
        
        /**
         * @param string $callingNumber
         */
        public function setCallingNumber(string $callingNumber): void
        {
            $this->callingNumber = $callingNumber;
        }
        
        /**
         * @return string
         */
        public function getInternationalAreaCode(): string
        {
            return $this->internationalAreaCode;
        }
        
        /**
         * @param string $internationalAreaCode
         */
        public function setInternationalAreaCode(string $internationalAreaCode): void
        {
            $this->internationalAreaCode = $internationalAreaCode;
        }
        
    }