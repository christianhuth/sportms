<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * Url
     */
    class Url extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\ContactType
         */
        protected $contactType;
        
        /**
         * @var string
         */
        protected $url;
    
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
        public function getUrl()
        {
            return $this->url;
        }
        
        /**
         * @param string $url
         */
        public function setUrl($url)
        {
            $this->url = $url;
        }
        
    }