<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;

    use \TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
    
    /**
     * TeamSeasonOfficial
     */
    class TeamSeasonOfficial extends AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\TeamSeason
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $teamSeason;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\PersonProfile
         */
        protected $personProfile;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\OfficialJob
         */
        protected $officialJob;
        
        /**
         * @var int
         */
        protected $startdate;
        
        /**
         * @var int
         */
        protected $enddate;
        
        /**
         * @var int
         */
        protected $dateDifference = 0;
        
        /**
         * @return TeamSeason
         */
        public function getTeamSeason(): TeamSeason
        {
            return $this->teamSeason;
        }
        
        /**
         * @param TeamSeason $teamSeason
         */
        public function setTeamSeason(TeamSeason $teamSeason): void
        {
            $this->teamSeason = $teamSeason;
        }
        
        /**
         * @return \ChristianKnell\Sportms\Domain\Model\PersonProfile
         */
        public function getPersonProfile(): \ChristianKnell\Sportms\Domain\Model\PersonProfile
        {
            return $this->personProfile;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\PersonProfile $personProfile
         */
        public function setPersonProfile(\ChristianKnell\Sportms\Domain\Model\PersonProfile $personProfile): void
        {
            $this->personProfile = $personProfile;
        }
        
        /**
         * @return OfficialJob
         */
        public function getOfficialJob(): OfficialJob
        {
            return $this->officialJob;
        }
        
        /**
         * @param OfficialJob $officialJob
         */
        public function setOfficialJob(OfficialJob $officialJob): void
        {
            $this->officialJob = $officialJob;
        }
        
        /**
         * @return int
         */
        public function getStartdate()
        {
            return $this->startdate;
        }
        
        /**
         * @param int $startdate
         */
        public function setStartdate($startdate)
        {
            $this->startdate = $startdate;
            $this->updateDateDifference();
        }
        
        /**
         *
         */
        private function updateDateDifference(): void
        {
            if (!empty($this->getStartdate()) && !empty($this->getEnddate())) {
                $this->setDateDifference(($this->calculateDateDifference($this->getStartdate(), $this->getEnddate())));
            } else {
                if (empty($this->getStartdate())) {
                    $this->setDateDifference(0);
                } else {
                    if (empty($this->getEnddate())) {
                        $this->setDateDifference(0);
                    } else {
                        $this->setDateDifference($this->calculateDateDifference($this->getStartdate(),
                            (int)new \DateTime(now)));
                    }
                }
            }
        }
        
        /**
         * @return int
         */
        public function getEnddate(): int
        {
            return $this->enddate;
        }
        
        /**
         * @param int $enddate
         */
        public function setEnddate($enddate): void
        {
            $this->enddate = $enddate;
            $this->updateDateDifference();
        }
        
        /**
         * @param int $startdate
         * @param int $enddate
         */
        private function calculateDateDifference(int $startdate, int $enddate): int
        {
            return (int)(($enddate - $startdate) / 60 / 60 / 24);
        }
        
        /**
         * @return int
         */
        public function getDateDifference(): int
        {
            return $this->dateDifference;
        }
        
        /**
         * @param int $dateDifference
         */
        public function setDateDifference(int $dateDifference): void
        {
            $this->dateDifference = $dateDifference;
        }
        
    }