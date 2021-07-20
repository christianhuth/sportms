<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    class Phone extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
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
         * @var \Balumedien\Sportms\Domain\Model\PhoneType
         */
        protected $phoneType;
        
        /**
         * @var bool
         */
        protected $public;
        
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
        
        /**
         * @return \Balumedien\Sportms\Domain\Model\PhoneType
         */
        public function getPhoneType(): \Balumedien\Sportms\Domain\Model\PhoneType
        {
            return $this->phoneType;
        }
        
        /**
         * @param \Balumedien\Sportms\Domain\Model\PhoneType $phoneType
         */
        public function setPhoneType(\Balumedien\Sportms\Domain\Model\PhoneType $phoneType): void
        {
            $this->phoneType = $phoneType;
        }
        
        /**
         * @return bool
         */
        public function getPublic(): bool
        {
            return $this->public;
        }
        
        /**
         * @param bool $public
         */
        public function setPublic(bool $public): void
        {
            $this->public = $public;
        }
        
    }