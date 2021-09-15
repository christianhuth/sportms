<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\SlugGenerators;
    
    class GameSlug extends BasicSlug
    {
        
        /**
         * @return string
         */
        public function generateSlug(array $hookParameters): string
        {
            $game = $hookParameters['record'];
            $teamSeasonHomeUid = $game['team_season_home'];
            $teamSeasonGuestUid = $game['team_season_guest'];
            if (($teamSeasonHomeUid > 0) && ($teamSeasonGuestUid > 0)) {
                $teamHomeSlug = $this->generateSlugForTeamSeasonByUid($teamSeasonHomeUid);
                $teamGuestSlug = $this->generateSlugForTeamSeasonByUid($teamSeasonGuestUid);
                return $teamHomeSlug . "-gegen-" . $teamGuestSlug . "-" . $game['uid'];
            } else {
                return '';
            }
        }
        
    }