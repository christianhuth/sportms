<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
    use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

    /**
     * TeamSeason
     */
    class TeamSeason extends AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Team
         */
        protected $team;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Season
         */
        protected $season;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\TeamSeasonPractice>
         */
        protected $teamSeasonPractices;
        
        /**
         * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
         */
        protected $teamSeasonImages;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\TeamSeasonOfficial>
         */
        protected $teamSeasonOfficials;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\TeamSeasonOfficial>
         */
        protected $teamSeasonCheftrainers;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\TeamSeasonSquadMember>
         */
        protected $teamSeasonSquadMembers;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\PersonProfile>
         */
        protected $teamSeasonSquadCaptains;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\CompetitionSeason>
         */
        protected $competitionSeasonTeams;
        
        /**
         * @var boolean
         */
        protected $detailLink;
        
        /**
         * @var boolean
         */
        protected $hidden;
        
        /**
         * TeamSeason constructor.
         */
        public function __construct()
        {
            //Do not remove the next line: It would break the functionality
            $this->initStorageObjects();
        }
        
        /**
         * Initializes all ObjectStorage properties
         * Do not modify this method!
         * It will be rewritten on each save in the extension builder
         * You may modify the constructor of this class instead
         *
         * @return void
         */
        protected function initStorageObjects(): void
        {
            $this->setTeamSeasonPractices(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setTeamSeasonImages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setTeamSeasonOfficials(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setTeamSeasonCheftrainers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setTeamSeasonSquadMembers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setTeamSeasonSquadCaptains(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
        }
        
        /**
         * @return Team
         */
        public function getTeam()
        {
            return $this->team;
        }
        
        /**
         * @param Team $team
         */
        public function setTeam($team)
        {
            $this->team = $team;
        }
        
        /**
         * @return Season
         */
        public function getSeason()
        {
            return $this->season;
        }
        
        /**
         * @param Season $season
         */
        public function setSeason($season)
        {
            $this->season = $season;
        }
        
        /**
         * @return ObjectStorage
         */
        public function getTeamSeasonPractices()
        {
            return $this->teamSeasonPractices;
        }
        
        /**
         * @param ObjectStorage $teamSeasonPractices
         */
        public function setTeamSeasonPractices($teamSeasonPractices)
        {
            $this->teamSeasonPractices = $teamSeasonPractices;
        }
        
        /**
         * @return ObjectStorage
         */
        public function getTeamSeasonImages()
        {
            return $this->teamSeasonImages;
        }
        
        /**
         * @param ObjectStorage $teamSeasonImages
         */
        public function setTeamSeasonImages($teamSeasonImages)
        {
            $this->teamSeasonImages = $teamSeasonImages;
        }
        
        /**
         * @param int $date
         * @return ObjectStorage|null
         */
        public function getTeamSeasonCheftrainerByDate(int $date): ?ObjectStorage
        {
            $teamSeasonCheftrainers = $this->getTeamSeasonCheftrainers();
            $teamSeasonCheftrainersByDate = new ObjectStorage();
            foreach ($teamSeasonCheftrainers as $teamSeasonCheftrainer) {
                if (($teamSeasonCheftrainer->getStartdate() <= $date) && ($teamSeasonCheftrainer->getEnddate() >= $date)) {
                    $teamSeasonCheftrainersByDate->attach($teamSeasonCheftrainer);
                }
            }
            return $teamSeasonCheftrainersByDate;
        }
        
        /**
         * @return ObjectStorage
         */
        public function getTeamSeasonCheftrainers(): ObjectStorage
        {
            $teamSeasonOfficials = $this->getTeamSeasonOfficials();
            $teamSeasonCheftrainers = new ObjectStorage();
            foreach ($teamSeasonOfficials as $teamSeasonOfficial) {
                if ($teamSeasonOfficial->getOfficialJob()->isCheftrainerJob()) {
                    $teamSeasonCheftrainers->attach($teamSeasonOfficial);
                }
            }
            return $teamSeasonCheftrainers;
        }
        
        /**
         * @param ObjectStorage $teamSeasonCheftrainers
         */
        public function setTeamSeasonCheftrainers(ObjectStorage $teamSeasonCheftrainers
        ): void {
            $this->teamSeasonCheftrainers = $teamSeasonCheftrainers;
        }
        
        /**
         * @return ObjectStorage
         */
        public function getTeamSeasonOfficials()
        {
            return $this->teamSeasonOfficials;
        }
        
        /**
         * @param ObjectStorage $teamSeasonOfficials
         */
        public function setTeamSeasonOfficials($teamSeasonOfficials)
        {
            $this->teamSeasonOfficials = $teamSeasonOfficials;
        }
        
        /**
         * @return ObjectStorage
         */
        public function getTeamSeasonSquadMembers()
        {
            return $this->orderTeamSeasonSquadMembers($this->teamSeasonSquadMembers);
        }
    
        /**
         * @param ObjectStorage|null $teamSeasonSquadMembers
         */
        private function orderTeamSeasonSquadMembers(?ObjectStorage $teamSeasonSquadMembers): ObjectStorage
        {
            // convert ObjectStorage to array
            $teamSeasonSquadMembersAsArray = $teamSeasonSquadMembers->toArray();
            // new ObjectStorage, where we will append the ordered GameChanges
            $orderedTeamSeasonSquadMembers = new ObjectStorage();
        
            // sort the array with the game changes
            # a - b = ASC
            # b - a = DESC
            usort($teamSeasonSquadMembersAsArray, static function ($a, $b) {
                $sportPositionGroupDiff = $a->getSportPositionGroup()->getSorting() - $b->getSportPositionGroup()->getSorting();
                if ($sportPositionGroupDiff) {
                    return $sportPositionGroupDiff;
                }
                $lastnameDiff = strcmp($a->getPersonProfile()->getPerson()->getLastname(),
                    $b->getPersonProfile()->getPerson()->getLastname());
                if ($lastnameDiff) {
                    return $lastnameDiff;
                }
                return strcmp($a->getPersonProfile()->getPerson()->getFirstname(),
                    $b->getPersonProfile()->getPerson()->getFirstname());
            });
        
            // convert ordered array to ObjectStorage
            foreach($teamSeasonSquadMembersAsArray AS $teamSeasonSquadMemberAsArray) {
                $orderedTeamSeasonSquadMembers->attach($teamSeasonSquadMemberAsArray);
            }
            return $orderedTeamSeasonSquadMembers;
        }
        
        /**
         * @param ObjectStorage $teamSeasonSquadMembers
         */
        public function setTeamSeasonSquadMembers($teamSeasonSquadMembers)
        {
            $this->teamSeasonSquadMembers = $teamSeasonSquadMembers;
        }
        
        /**
         * @return ObjectStorage
         */
        public function getTeamSeasonSquadCaptains(): ObjectStorage
        {
            return $this->teamSeasonSquadCaptains;
        }
        
        /**
         * @param ObjectStorage $teamSeasonSquadCaptains
         */
        public function setTeamSeasonSquadCaptains(ObjectStorage $teamSeasonSquadCaptains
        ): void {
            $this->teamSeasonSquadCaptains = $teamSeasonSquadCaptains;
        }
        
        /**
         * @return ObjectStorage
         */
        public function getCompetitionSeasonTeams(): ObjectStorage
        {
            return $this->competitionSeasonTeams;
        }
        
        /**
         * @param ObjectStorage $competitionSeasonTeams
         */
        public function setCompetitionSeasonTeams(ObjectStorage $competitionSeasonTeams): void
        {
            $this->competitionSeasonTeams = $competitionSeasonTeams;
        }
        
        /**
         * @return bool
         */
        public function isDetailLink()
        {
            return $this->detailLink;
        }
        
        /**
         * @param bool $detailLink
         */
        public function setDetailLink($detailLink)
        {
            $this->detailLink = $detailLink;
        }
        
        /**
         * @return bool
         */
        public function isHidden(): bool
        {
            return $this->hidden;
        }
        
        /**
         * @param bool $hidden
         */
        public function setHidden(bool $hidden): void
        {
            $this->hidden = $hidden;
        }
        
    }