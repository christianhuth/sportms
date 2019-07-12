<?php


namespace Balumedien\Clubms\Domain\Repository;


class TeamSeasonSquadMemberRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * @param \Balumedien\Clubms\Domain\Model\TeamSeason $teamSeason
	 */
	public function findByTeamSeasonUid($teamSeason) {
		$query = $this->createQuery();
		$query->matching($query->contains('team_season', $teamSeason));
		return $query->execute();
	}

}