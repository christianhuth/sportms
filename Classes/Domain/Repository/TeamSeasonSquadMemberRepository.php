<?php


namespace Balumedien\Clubms\Domain\Repository;


class TeamSeasonSquadMemberRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * @param int $teamSeasonUid
	 */
	public function findByTeamSeasonUid($teamSeasonUid) {
		$query = $this->createQuery();
		$query->matching($query->equals('team_season', $teamSeasonUid));
		$queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);
		\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());
		\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getParameters());
		return $query->execute();
	}

}