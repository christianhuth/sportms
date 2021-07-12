<?php
	
	namespace Balumedien\Sportms\SlugGenerators;
	
	class CompetitionSeasonSlug extends BasicSlug {
		
		/**
		 * @return string
		 */
		public function generateSlug(array $hookParameters): string {
			$competitionSeason = $hookParameters['record'];
			$competitionSeasonUid = $competitionSeason['uid'];
			$competitionSlug = $this->generateSlugForCompetitionSeasonByUid($competitionSeasonUid);
			$seasonUid = $competitionSeason['season'];
			$seasonSlug = $this->generateSlugForSeasonByUid($seasonUid);
			return $competitionSlug . "/" . $seasonSlug;
		}
		
	}