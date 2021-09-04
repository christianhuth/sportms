sportms comes with pre-configured Route, which you can simply import into your Sitepackage.


List of existing Routes
- EXT:sportms/Configuration/Routes/SportmsClubDetail.yaml
- EXT:sportms/Configuration/Routes/SportmsClubList.yaml
- EXT:sportms/Configuration/Routes/SportmsCompetitionDetail.yaml
- EXT:sportms/Configuration/Routes/SportmsCompetitionList.yaml
- EXT:sportms/Configuration/Routes/SportmsGameDetail.yaml
- EXT:sportms/Configuration/Routes/SportmsGameList.yaml
- EXT:sportms/Configuration/Routes/SportmsPersonList.yaml
- EXT:sportms/Configuration/Routes/SportmsSeasonList.yaml
- EXT:sportms/Configuration/Routes/SportmsTeamDetail.yaml
- EXT:sportms/Configuration/Routes/SportmsTeamDetailWithoutTeamSlug.yaml
- EXT:sportms/Configuration/Routes/SportmsTeamList.yaml

You can import one of the Routes via the imports-directive inside of your site configuration.

```yaml
imports:
  - resource: 'EXT:sportms/Configuration/Routes/SportmsClubDetail.yaml'
```

If you want to adjust some settings of the Routes or add new ones you can add the desired adjustments to the directive routeEnhancers in your site configuration.

```yaml
routeEnhancers:
  sportmsClubDetail:
    limitToPages: [PID]
```