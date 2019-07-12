<?php


namespace Balumedien\Clubms\Domain\Repository;


class TeamSeasonSquadMemberRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * @param int $teamSeasonUid
	 */
	public function findByTeamSeasonUid($teamSeasonUid) {
		$query = $this->createQuery();
		$query->matching($query->contains('team_season', $teamSeasonUid));
		return $query->execute();
	}

}