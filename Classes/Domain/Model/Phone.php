<?php
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    class Phone extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\ContactType
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