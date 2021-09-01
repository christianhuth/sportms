<?php
    
    namespace ChristianKnell\Sportms\SlugGenerators;
    
    use TYPO3\CMS\Backend\Utility\BackendUtility;

    class BasicSlug
    {
        
        protected function generateSlugForCompetitionSeasonByUid(int $competitionSeasonUid)
        {
            $competitionSeason = BackendUtility::getRecord('tx_sportms_domain_model_competitionseason',
                $competitionSeasonUid);
            return $this->generateSlugForCompetitionSeason($competitionSeason);
        }
        
        protected function generateSlugForCompetitionSeason(array $competitionSeason)
        {
            $competitionUid = $competitionSeason['competition'];
            return $this->generateSlugForCompetitionByUid($competitionUid);
        }
        
        protected function generateSlugForCompetitionByUid(int $competitionUid)
        {
            $competition = BackendUtility::getRecord('tx_sportms_domain_model_competition', $competitionUid);
            return $this->generateSlugForCompetition($competition);
        }
        
        protected function generateSlugForCompetition(array $competition)
        {
            return $competition['slug'];
        }
        
        protected function generateSlugForSeasonByUid(int $seasonUid)
        {
            $season = BackendUtility::getRecord('tx_sportms_domain_model_season', $seasonUid);
            return $season['slug'];
        }
        
        protected function generateSlugForTeamSeasonByUid(int $teamSeasonUid)
        {
            $teamSeason = BackendUtility::getRecord('tx_sportms_domain_model_teamseason', $teamSeasonUid);
            return $this->generateSlugForTeamSeason($teamSeason);
        }
        
        protected function generateSlugForTeamSeason(array $teamSeason)
        {
            $teamUid = $teamSeason['team'];
            return $this->generateSlugForTeamByUid($teamUid);
        }
        
        protected function generateSlugForTeamByUid(int $teamUid)
        {
            $team = BackendUtility::getRecord('tx_sportms_domain_model_team', $teamUid);
            return $this->generateSlugForTeam($team);
        }
        
        protected function generateSlugForTeam(array $team)
        {
            return $team['slug'];
        }
        
    }