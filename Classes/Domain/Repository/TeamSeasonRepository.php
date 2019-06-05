<?php


namespace Balumedien\Clubms\Domain\Repository;


class TeamSeasonRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    /**
     * @param \Balumedien\Clubms\Domain\Model\Team $team team item
     */
    public function findLatestSeasonOfTeam(\Balumedien\Clubms\Domain\Model\Team $team) {
        // TODO: BUILD QUERY TO FIND LATEST SEASON OF A SPECIFIC TEAM
    }

}