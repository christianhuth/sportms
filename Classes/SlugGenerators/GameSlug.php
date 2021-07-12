<?php
	
	namespace Balumedien\Sportms\SlugGenerators;
	
	class GameSlug extends BasicSlug {
		
		/**
		 * @return string
		 */
		public function generateSlug(array $hookParameters): string {
			$game = $hookParameters['record'];
			$teamSeasonHomeUid = $game['team_season_home'];
			$teamHomeSlug = $this->generateSlugForTeamSeasonByUid($teamSeasonHomeUid);
			$teamSeasonGuestUid = $game['team_season_guest'];
			$teamGuestSlug = $this->generateSlugForTeamSeasonByUid($teamSeasonGuestUid);
			return $teamHomeSlug . "-gegen-" . $teamGuestSlug . "-" . $game['uid'];
		}
		
	}