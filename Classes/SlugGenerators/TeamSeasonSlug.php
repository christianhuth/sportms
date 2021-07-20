<?php
    
    namespace Balumedien\Sportms\SlugGenerators;
    
    class TeamSeasonSlug extends BasicSlug
    {
        
        /**
         * @return string
         */
        public function generateSlug(array $hookParameters): string
        {
            $teamSeason = $hookParameters['record'];
            $teamSeasonUid = $teamSeason['uid'];
            $teamSlug = $this->generateSlugForTeamSeasonByUid($teamSeasonUid);
            $seasonUid = $teamSeason['season'];
            $seasonSlug = $this->generateSlugForSeasonByUid($seasonUid);
            return $teamSlug . "/" . $seasonSlug;
        }
        
    }