<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    class PlayerStat extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Person
         */
        protected $person;
        
        /**
         * @var int|null
         */
        protected $numberOfGames;
        
        /**
         * @var int|null
         */
        protected $numberOfStartingFormation;
        
        /**
         * @var int|null
         */
        protected $numberOfGoals;
        
        /**
         * @var int|null
         */
        protected $numberOfAssists;
        
        /**
         * @return Person
         */
        public function getPerson(): Person
        {
            return $this->person;
        }
        
        /**
         * @param Person $person
         */
        public function setPerson(Person $person): void
        {
            $this->person = $person;
        }
        
        /**
         * @return int|null
         */
        public function getNumberOfGames(): ?int
        {
            return $this->numberOfGames;
        }
        
        /**
         * @param int|null $numberOfGames
         */
        public function setNumberOfGames(?int $numberOfGames): void
        {
            $this->numberOfGames = $numberOfGames;
        }
        
        /**
         * @return int|null
         */
        public function getNumberOfStartingFormation(): ?int
        {
            return $this->numberOfStartingFormation;
        }
        
        /**
         * @param int|null $numberOfStartingFormation
         */
        public function setNumberOfStartingFormation(?int $numberOfStartingFormation): void
        {
            $this->numberOfStartingFormation = $numberOfStartingFormation;
        }
        
        /**
         * @return int|null
         */
        public function getNumberOfGoals(): ?int
        {
            return $this->numberOfGoals;
        }
        
        /**
         * @param int|null $numberOfGoals
         */
        public function setNumberOfGoals(?int $numberOfGoals): void
        {
            $this->numberOfGoals = $numberOfGoals;
        }
        
        /**
         * @return int|null
         */
        public function getNumberOfAssists(): ?int
        {
            return $this->numberOfAssists;
        }
        
        /**
         * @param int|null $numberOfAssists
         */
        public function setNumberOfAssists(?int $numberOfAssists): void
        {
            $this->numberOfAssists = $numberOfAssists;
        }
        
    }