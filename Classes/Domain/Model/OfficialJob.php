<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
    
    /**
     * OfficialJob
     */
    class OfficialJob extends AbstractEntity
    {
        
        /**
         * @var string
         */
        protected $label = '';
    
        /**
         * @var bool
         */
        protected $isClubJob = false;
        
        /**
         * @var bool
         */
        protected $isClubHeadJob = false;
    
        /**
         * @var bool
         */
        protected $isClubSectionJob = false;
    
        /**
         * @var bool
         */
        protected $isClubSectionHeadJob = false;
    
        /**
         * @var bool
         */
        protected $isTeamSeasonJob = false;
    
        /**
         * @var bool
         */
        protected $isCheftrainerJob = false;
        
        /**
         * @return string
         */
        public function getLabel()
        {
            return $this->label;
        }
        
        /**
         * @param string $label
         */
        public function setLabel($label)
        {
            $this->label = $label;
        }
    
        /**
         * @return bool
         */
        public function isClubJob(): bool
        {
            return $this->isClubJob;
        }
    
        /**
         * @param bool $isClubJob
         */
        public function setIsClubJob(bool $isClubJob): void
        {
            $this->isClubJob = $isClubJob;
        }
        
        /**
         * @return bool
         */
        public function isClubHeadJob(): bool
        {
            return $this->isClubHeadJob;
        }
        
        /**
         * @param bool $isClubHeadJob
         */
        public function setIsClubHeadJob(bool $isClubHeadJob): void
        {
            $this->isClubHeadJob = $isClubHeadJob;
        }
    
        /**
         * @return bool
         */
        public function isClubSectionJob(): bool
        {
            return $this->isClubSectionJob;
        }
    
        /**
         * @param bool $isClubSectionJob
         */
        public function setIsClubSectionJob(bool $isClubSectionJob): void
        {
            $this->isClubSectionJob = $isClubSectionJob;
        }
    
        /**
         * @return bool
         */
        public function isClubSectionHeadJob(): bool
        {
            return $this->isClubSectionHeadJob;
        }
    
        /**
         * @param bool $isClubSectionHeadJob
         */
        public function setIsClubSectionHeadJob(bool $isClubSectionHeadJob): void
        {
            $this->isClubSectionHeadJob = $isClubSectionHeadJob;
        }
    
        /**
         * @return bool
         */
        public function isTeamSeasonJob(): bool
        {
            return $this->isTeamSeasonJob;
        }
    
        /**
         * @param bool $isTeamSeasonJob
         */
        public function setIsTeamSeasonJob(bool $isTeamSeasonJob): void
        {
            $this->isTeamSeasonJob = $isTeamSeasonJob;
        }
    
        /**
         * @return bool
         */
        public function isCheftrainerJob(): bool
        {
            return $this->isCheftrainerJob;
        }
    
        /**
         * @param bool $isCheftrainerJob
         */
        public function setIsCheftrainerJob(bool $isCheftrainerJob): void
        {
            $this->isCheftrainerJob = $isCheftrainerJob;
        }
        
    }