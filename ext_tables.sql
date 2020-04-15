#
# Table structure for table 'tx_sportms_domain_model_address'
#
CREATE TABLE tx_sportms_domain_model_address (
	street varchar(255) DEFAULT '' NOT NULL,
	housenumber varchar(255) DEFAULT NULL,
	zipcode varchar(255) DEFAULT NULL,
	location varchar(255) DEFAULT '' NOT NULL,
	country int(11) DEFAULT '0' NOT NULL,
	region varchar(255) DEFAULT NULL,
	public tinyint(4) unsigned DEFAULT '0' NOT NULL,
	foreign_uid int(11) DEFAULT 0 NOT NULL,
	foreign_table varchar(255) DEFAULT '' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_club'
#
CREATE TABLE tx_sportms_domain_model_club (
	name varchar(255) DEFAULT '' NOT NULL,
	colours varchar(255) DEFAULT NULL,
	date_of_founding int(11) DEFAULT NULL,
	year_of_founding int(11) DEFAULT NULL,
	club_members int(11) DEFAULT NULL,
	images varchar(255) DEFAULT NULL,
	addresses int(11) DEFAULT NULL,
	phones int(11) DEFAULT NULL,
	mails int(11) DEFAULT NULL,
	urls int(11) DEFAULT NULL,
    club_grounds int(11) DEFAULT NULL,
    home_venues int(11) DEFAULT NULL,
    club_sections int(11) DEFAULT NULL,
    club_officials int(11) DEFAULT NULL,
	detail_link tinyint(4) unsigned DEFAULT '1' NOT NULL,
    slug varchar(2048) DEFAULT ''
);

#
# Table structure for table 'tx_sportms_domain_model_clubground'
#
CREATE TABLE tx_sportms_domain_model_clubground (
    club int(11) DEFAULT '0' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	address int(11) DEFAULT NULL,
	journey varchar(255) DEFAULT '' NOT NULL,
	images varchar(255) DEFAULT NULL,
	description varchar(255) DEFAULT '' NOT NULL,
	club_owned tinyint(4) unsigned DEFAULT '0' NOT NULL,
	club_owned_since int(11) DEFAULT NULL,
	date_of_building int(11) DEFAULT NULL,
	year_of_building varchar(255) DEFAULT NULL,
	sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_clubmembers'
#
CREATE TABLE tx_sportms_domain_model_clubmembers (
	club int(11) DEFAULT 0 NOT NULL,
	members int(11) DEFAULT 0 NOT NULL,
	date int(11) DEFAULT 0 NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_clubofficial'
#
CREATE TABLE tx_sportms_domain_model_clubofficial (
    club int(11) DEFAULT '0' NOT NULL,
	person int(11) DEFAULT '0' NOT NULL,
    club_official_job int(11) DEFAULT '0' NOT NULL,
	startdate int(11) DEFAULT NULL,
	enddate int(11) DEFAULT NULL,
    until_today tinyint(4) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_clubofficialjob'
#
CREATE TABLE tx_sportms_domain_model_clubofficialjob (
    label varchar(255) DEFAULT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_clubsection'
#
CREATE TABLE tx_sportms_domain_model_clubsection (
	club int(11) DEFAULT '0' NOT NULL,
	sports int(11) DEFAULT '0' NOT NULL,
    label varchar(255) DEFAULT NULL,
	images varchar(255) DEFAULT NULL,
	club_section_members int(11) DEFAULT NULL,
	addresses int(11) DEFAULT NULL,
	phones int(11) DEFAULT NULL,
	mails int(11) DEFAULT NULL,
	urls int(11) DEFAULT NULL,
	club_section_officials int(11) DEFAULT NULL,
    teams int(11) DEFAULT NULL,
    detail_link tinyint(4) unsigned DEFAULT '1' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_clubsectionmembers'
#
CREATE TABLE tx_sportms_domain_model_clubsectionmembers (
	club_section int(11) DEFAULT '0' NOT NULL,
	members varchar(255) DEFAULT '' NOT NULL,
	date int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_clubsectionofficial'
#
CREATE TABLE tx_sportms_domain_model_clubsectionofficial (
    club_section int(11) DEFAULT '0' NOT NULL,
    person int(11) DEFAULT '0' NOT NULL,
    club_section_official_job int(11) DEFAULT '0' NOT NULL,
	startdate int(11) DEFAULT NULL,
	enddate int(11) DEFAULT NULL,
	sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_clubsectionofficialjob'
#
CREATE TABLE tx_sportms_domain_model_clubsectionofficialjob (
    label varchar(255) DEFAULT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_competition'
#
CREATE TABLE tx_sportms_domain_model_competition (
    sport int(11) DEFAULT '0' NOT NULL,
    sport_age_group int(11) DEFAULT '0' NOT NULL,
    sport_age_level int(11) DEFAULT '0' NOT NULL,
    competition_type int(11) DEFAULT '0' NOT NULL,
	name varchar(255) DEFAULT '0' NOT NULL,
	name_short varchar(255) DEFAULT NULL,
	competition_seasons int(11) DEFAULT NULL,
	detail_link tinyint(4) unsigned DEFAULT '1' NOT NULL,
    slug varchar(2048) DEFAULT ''
);

#
# Table structure for table 'tx_sportms_domain_model_competitionseason'
#
CREATE TABLE tx_sportms_domain_model_competitionseason (
    competition int(11) DEFAULT '0' NOT NULL,
    season int(11) DEFAULT '0' NOT NULL,
    competition_season_gamedays int(11) DEFAULT NULL,
    competition_season_teams int(11) DEFAULT NULL,
    detail_link tinyint(4) unsigned DEFAULT '1' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_competitionseasongameday'
#
CREATE TABLE tx_sportms_domain_model_competitionseasongameday (
    competition_season int(11) DEFAULT '0' NOT NULL,
    label varchar(255) DEFAULT '' NOT NULL,
    startdate int(11) unsigned DEFAULT NULL,
    enddate int(11) unsigned DEFAULT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_competitiontype'
#
CREATE TABLE tx_sportms_domain_model_competitiontype (
	label varchar(255) DEFAULT NULL,
	sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_game'
#
CREATE TABLE tx_sportms_domain_model_game (
    sport int(11) DEFAULT '0' NOT NULL,
    season int(11) DEFAULT '0' NOT NULL,
    competition_season int(11) DEFAULT '0' NOT NULL,
    team_season_home int(11) DEFAULT '0' NOT NULL,
    team_season_guest int(11) DEFAULT '0' NOT NULL,
    game_appointment int(11) DEFAULT 1 NOT NULL,
    game_rating int(11) DEFAULT 1 NOT NULL,
    gameday int(11) unsigned DEFAULT NULL,
    date int(11) unsigned DEFAULT NULL,
    time int(11) unsigned DEFAULT NULL,
    venue int(11) DEFAULT NULL,
    spectators int(11) DEFAULT NULL,
    period_count int(11) DEFAULT NULL,
    period_duration int(11) DEFAULT NULL,
    game_periods int(11) DEFAULT NULL,
    result_end_regular_home int(11) DEFAULT NULL,
    result_end_regular_guest int(11) DEFAULT NULL,
    result_end_additional tinyint(4) unsigned DEFAULT '1' NOT NULL,
    result_end_overtime_home int(11) DEFAULT NULL,
    result_end_overtime_guest int(11) DEFAULT NULL,
    result_end_penalty_home int(11) DEFAULT NULL,
    result_end_penalty_guest int(11) DEFAULT NULL,
    result_type int(11) DEFAULT '2' NOT NULL,
    result_halfs_first_home int(11) DEFAULT NULL,
    result_halfs_first_guest int(11) DEFAULT NULL,
    result_halfs_second_home int(11) DEFAULT NULL,
    result_halfs_second_guest int(11) DEFAULT NULL,
    result_thirds_first_home int(11) DEFAULT NULL,
    result_thirds_first_guest int(11) DEFAULT NULL,
    result_thirds_second_home int(11) DEFAULT NULL,
    result_thirds_second_guest int(11) DEFAULT NULL,
    result_thirds_third_home int(11) DEFAULT NULL,
    result_thirds_third_guest int(11) DEFAULT NULL,
    result_fourths_first_home int(11) DEFAULT NULL,
    result_fourths_first_guest int(11) DEFAULT NULL,
    result_fourths_second_home int(11) DEFAULT NULL,
    result_fourths_second_guest int(11) DEFAULT NULL,
    result_fourths_third_home int(11) DEFAULT NULL,
    result_fourths_third_guest int(11) DEFAULT NULL,
    result_fourths_fourth_home int(11) DEFAULT NULL,
    result_fourths_fourth_guest int(11) DEFAULT NULL,
    result_sets int(11) DEFAULT NULL,
    result_special_home int(11) DEFAULT NULL,
    result_special_guest int(11) DEFAULT NULL,
    game_lineup_home_starts int(11) DEFAULT NULL,
    game_lineup_home_substitutes int(11) DEFAULT NULL,
    trainer_home int(11) DEFAULT NULL,
    game_lineup_guest_starts int(11) DEFAULT NULL,
    game_lineup_guest_substitutes int(11) DEFAULT NULL,
    trainer_guest int(11) DEFAULT NULL,
    game_changes int(11) DEFAULT NULL,
    game_goals int(11) DEFAULT NULL,
    game_punishments int(11) DEFAULT NULL,
    game_referees int(11) DEFAULT NULL,
    game_reports int(11) DEFAULT NULL,
    detail_link tinyint(4) unsigned DEFAULT '1' NOT NULL,
    slug varchar(2048) DEFAULT ''
);

#
# Table structure for table 'tx_sportms_domain_model_gamechange'
#
CREATE TABLE tx_sportms_domain_model_gamechange (
    game int(11) DEFAULT '0' NOT NULL,
    period int(11) DEFAULT NULL,
    minute int(11) DEFAULT '0' NOT NULL,
    minute_additional int(11) DEFAULT NULL,
    person_in int(11) DEFAULT '0' NOT NULL,
    person_out int(11) DEFAULT '0' NOT NULL,
    reason int(11) DEFAULT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_gamechange'
#
CREATE TABLE tx_sportms_domain_model_gamegoal (
    game int(11) DEFAULT '0' NOT NULL,
    goal_home int(11) DEFAULT '0' NOT NULL,
    goal_guest int(11) DEFAULT '0' NOT NULL,
    period int(11) DEFAULT NULL,
    minute int(11) DEFAULT '0' NOT NULL,
    minute_additional int(11) DEFAULT NULL,
    scorer int(11) DEFAULT '0' NOT NULL,
    assist int(11) DEFAULT NULL,
    own_goal tinyint(4) DEFAULT '0' NOT NULL,
    goal_type int(11) DEFAULT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_gamelineup'
#
CREATE TABLE tx_sportms_domain_model_gamelineup (
    game int(11) DEFAULT '0' NOT NULL,
    team varchar(255) DEFAULT '' NOT NULL,
    type varchar(255) DEFAULT '' NOT NULL,
    jersey_number varchar(255) DEFAULT NULL,
    person int(11) DEFAULT 0 NOT NULL,
    sport_position int(11) DEFAULT NULL,
    is_team_captain tinyint(4) DEFAULT 0 NOT NULL,
	sorting int(11) DEFAULT 0 NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_gameperiod'
#
CREATE TABLE tx_sportms_domain_model_gameperiod (
    game int(11) DEFAULT '0' NOT NULL,
    label varchar(255) DEFAULT NULL,
    duration int(11) DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_gamepunishment'
#
CREATE TABLE tx_sportms_domain_model_gamepunishment (
    game int(11) DEFAULT '0' NOT NULL,
    period int(11) DEFAULT NULL,
    minute int(11) DEFAULT '0' NOT NULL,
    minute_additional int(11) DEFAULT NULL,
    punished_person int(11) DEFAULT '0' NOT NULL,
    type int(11) DEFAULT NULL,
    duration int(11) DEFAULT NULL,
    reason int(11) DEFAULT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_gamereferee'
#
CREATE TABLE tx_sportms_domain_model_gamereferee (
    game int(11) unsigned DEFAULT '0' NOT NULL,
    person int(11) unsigned DEFAULT '0' NOT NULL,
    referee_job int(11) unsigned DEFAULT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_gamereport'
#
CREATE TABLE tx_sportms_domain_model_gamereport (
    game int(11) DEFAULT '0' NOT NULL,
    headline varchar(255) DEFAULT '' NOT NULL,
    text text DEFAULT '' NOT NULL,
    author varchar(255) DEFAULT NULL,
    date int(11) DEFAULT NULL,
	sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_gameresultset'
#
CREATE TABLE tx_sportms_domain_model_gameresultset (
    game int(11) DEFAULT '0' NOT NULL,
    set_number int(11) DEFAULT '1' NOT NULL,
    result_home int(11) DEFAULT '0' NOT NULL,
    result_guest int(11) DEFAULT '0' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_mail'
#
CREATE TABLE tx_sportms_domain_model_mail (
    foreign_uid int(11) DEFAULT 0 NOT NULL,
    foreign_table varchar(255) DEFAULT '' NOT NULL,
	mail varchar(255) DEFAULT '' NOT NULL,
	mail_type int(11) unsigned DEFAULT NULL,
	public tinyint(4) unsigned DEFAULT '0' NULL,
	sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_mailtype'
#
CREATE TABLE tx_sportms_domain_model_mailtype (
	label varchar(255) DEFAULT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_person'
#
CREATE TABLE tx_sportms_domain_model_person (
	firstname varchar(255) DEFAULT '' NOT NULL,
	lastname varchar(255) DEFAULT '' NOT NULL,
	birthname varchar(255) DEFAULT NULL,
	nickname varchar(255) DEFAULT NULL,
	date_of_birth int(11) unsigned DEFAULT NULL,
	zodiac_sign int(11) DEFAULT NULL,
	place_of_birth varchar(255) DEFAULT NULL,
	nationalities int(11) DEFAULT NULL,
	sex varchar(1) DEFAULT NULL,
	weight double(11,4) DEFAULT NULL,
	height double(11,4) DEFAULT NULL,
	size_of_shoe varchar(255) DEFAULT NULL,
	footer int(11) DEFAULT NULL,
	hander int(11) DEFAULT NULL,
	family_status varchar(255) DEFAULT NULL,
	graduation varchar(255) DEFAULT NULL,
	job varchar(255) DEFAULT NULL,
	characteristics varchar(255) DEFAULT NULL,
	hobbies varchar(255) DEFAULT NULL,
	favorite_dish varchar(255) DEFAULT NULL,
	favorite_drink varchar(255) DEFAULT NULL,
	addresses int(11) DEFAULT NULL,
	phones int(11) DEFAULT NULL,
	mails int(11) DEFAULT NULL,
	urls int(11) DEFAULT NULL,
    person_profiles int(11) DEFAULT NULL,
	show_birthday tinyint(4) unsigned DEFAULT '0' NOT NULL,
	detail_link tinyint(4) unsigned DEFAULT '1' NOT NULL,
	show_as_player tinyint(4) unsigned DEFAULT 1 NOT NULL,
	show_as_official tinyint(4) unsigned DEFAULT 0 NOT NULL,
	show_as_referee tinyint(4) unsigned DEFAULT 0 NOT NULL,
    slug varchar(2048) DEFAULT ''
);

#
# Table structure for table 'tx_sportms_domain_model_personprofile'
#
CREATE TABLE tx_sportms_domain_model_personprofile (
    person int(11) DEFAULT '0' NOT NULL,
    profile_type varchar(255) DEFAULT '' NOT NULL,
    sport int(11) DEFAULT 0 NOT NULL,
    main_sport_position_group int(11) DEFAULT NULL,
    main_sport_position int(11) DEFAULT NULL,
    side_sport_position_groups int(11) DEFAULT NULL,
    side_sport_positions int(11) DEFAULT NULL,
    profile_images varchar(255) DEFAULT NULL,
    sorting int(11) DEFAULT '0' NOT NULL,
    UNIQUE KEY person_profile_sport(person, profile_type, sport)
);

#
# Table structure for table 'tx_sportms_domain_model_phone'
#
CREATE TABLE tx_sportms_domain_model_phone (
    foreign_uid int(11) DEFAULT 0 NOT NULL,
    foreign_table varchar(255) DEFAULT '' NOT NULL,
	area_code varchar(255) DEFAULT NULL,
	calling_number varchar(255) DEFAULT '' NOT NULL,
	international_area_code varchar(255) DEFAULT '' NOT NULL,
	phone_type int(11) unsigned DEFAULT NULL,
	public tinyint(4) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_phonetype'
#
CREATE TABLE tx_sportms_domain_model_phonetype (
	label varchar(255) DEFAULT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_refereejob'
#
CREATE TABLE tx_sportms_domain_model_refereejob (
	label varchar(255) DEFAULT '0' NOT NULL,
    slug varchar(2048) DEFAULT ''
);

#
# Table structure for table 'tx_sportms_domain_model_season'
#
CREATE TABLE tx_sportms_domain_model_season (
	season_name varchar(255) DEFAULT '' NOT NULL,
	season_name_short varchar(255) DEFAULT NULL,
	season_name_very_short varchar(255) DEFAULT NULL,
	startdate int(11) unsigned DEFAULT NULL,
	enddate int(11) unsigned DEFAULT NULL,
    detail_link tinyint(4) unsigned DEFAULT '1' NOT NULL,
    slug varchar(2048) DEFAULT ''
);

#
# Table structure for table 'tx_sportms_domain_model_sport'
#
CREATE TABLE tx_sportms_domain_model_sport (
    label varchar(255) DEFAULT NULL,
    is_team_sport tinyint(4) unsigned DEFAULT '0' NOT NULL,
    is_individual_sport tinyint(4) unsigned DEFAULT '0' NOT NULL,
    sport_types int(11) DEFAULT NULL,
    sport_age_groups int(11) DEFAULT NULL,
    sport_position_groups int(11) DEFAULT NULL,
    slug varchar(2048) DEFAULT ''
);

#
# Table structure for table 'tx_sportms_domain_model_sportagegroup'
#
CREATE TABLE tx_sportms_domain_model_sportagegroup (
    sport int(11) DEFAULT NULL,
    label varchar(255) DEFAULT NULL,
    short varchar(255) DEFAULT NULL,
    sport_age_levels int(11) DEFAULT NULL,
    slug varchar(2048) DEFAULT '',
    sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_sportagelevel'
#
CREATE TABLE tx_sportms_domain_model_sportagelevel (
    sport_age_group int(11) DEFAULT NULL,
    label varchar(255) DEFAULT NULL,
    short varchar(255) DEFAULT NULL,
    slug varchar(2048) DEFAULT '',
    sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_sportposition'
#
CREATE TABLE tx_sportms_domain_model_sportposition (
    sport_position_group int(11) DEFAULT '0' NOT NULL,
    label varchar(255) DEFAULT NULL,
    label_short varchar(255) DEFAULT NULL,
    x_position int(11) DEFAULT NULL,
    y_position int(11) DEFAULT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_sportpositiongroup'
#
CREATE TABLE tx_sportms_domain_model_sportpositiongroup (
    sport int(11) DEFAULT '0' NOT NULL,
    label varchar(255) DEFAULT NULL,
    sport_positions int(11) DEFAULT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_sporttype'
#
CREATE TABLE tx_sportms_domain_model_sporttype (
    label varchar(255) DEFAULT NULL,
    sports int(11) DEFAULT NULL,
    slug varchar(2048) DEFAULT ''
);

#
# Table structure for table 'tx_sportms_domain_model_team'
#
CREATE TABLE tx_sportms_domain_model_team (
    club int(11) DEFAULT '0' NOT NULL,
    sport int(11) DEFAULT '0' NOT NULL,
    sport_age_group int(11) DEFAULT '0' NOT NULL,
    sport_age_level int(11) DEFAULT '0' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	dummy tinyint(4) unsigned DEFAULT '0' NOT NULL,
    detail_link tinyint(4) unsigned DEFAULT '1' NOT NULL,
	team_seasons int(11) DEFAULT NULL,
    slug varchar(2048) DEFAULT ''
);

#
# Table structure for table 'tx_sportms_domain_model_teamseason'
#
CREATE TABLE tx_sportms_domain_model_teamseason (
	team int(11) DEFAULT '0' NOT NULL,
	season int(11) DEFAULT '0' NOT NULL,
	team_season_practices int(11) DEFAULT NULL,
    team_season_images varchar(255) DEFAULT NULL,
	team_season_officials int(11) DEFAULT NULL,
	team_season_squad_members int(11) DEFAULT NULL,
	team_season_squad_captains int(11) DEFAULT NULL,
    competition_season_teams int(11) DEFAULT NULL,
    detail_link tinyint(4) unsigned DEFAULT '1' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_teamseasonofficial'
#
CREATE TABLE tx_sportms_domain_model_teamseasonofficial (
	team_season int(11) DEFAULT '0' NOT NULL,
	person int(11) DEFAULT '0' NOT NULL,
	team_season_official_job int(11) DEFAULT '0' NOT NULL,
	startdate int(11) DEFAULT NULL,
	enddate int(11) DEFAULT NULL,
	sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_teamseasonofficialjob'
#
CREATE TABLE tx_sportms_domain_model_teamseasonofficialjob (
    label varchar(255) DEFAULT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_teamseasonpractice'
#
CREATE TABLE tx_sportms_domain_model_teamseasonpractice (
    team_season int(11) DEFAULT '0' NOT NULL,
	day int(1) DEFAULT 0 NOT NULL,
	time_start varchar(255) DEFAULT '' NOT NULL,
	time_end varchar(255) DEFAULT '' NOT NULL,
	venue int(11) DEFAULT '0' NOT NULL,
	annotation varchar(255) DEFAULT '' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_teamseasonsquadmember'
#
CREATE TABLE tx_sportms_domain_model_teamseasonsquadmember (
    team_season int(11) DEFAULT '0' NOT NULL,
	person int(11) DEFAULT '0' NOT NULL,
    sport_position_group int(11) DEFAULT NULL,
    sport_position int(11) DEFAULT NULL,
    squad_number varchar(255) DEFAULT NULL,
	new_signing tinyint(4) unsigned DEFAULT '0' NOT NULL,
	leaving tinyint(4) unsigned DEFAULT '0' NOT NULL,
    hidden_in_squad_list smallint(5) unsigned NOT NULL DEFAULT '0',
	sorting int(11) DEFAULT NULL
);

#
# Table structure for table 'tx_sportms_domain_model_url'
#
CREATE TABLE tx_sportms_domain_model_url (
    foreign_uid int(11) DEFAULT 0 NOT NULL,
    foreign_table varchar(255) DEFAULT '' NOT NULL,
	url varchar(255) DEFAULT '0' NOT NULL,
	public tinyint(4) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL
);



#
# Table structure for table 'tx_sportms_domain_model_venue'
#
CREATE TABLE tx_sportms_domain_model_venue (
    name varchar(255) DEFAULT '' NOT NULL,
    address int(11) DEFAULT NULL,
    home_venue_for_clubs int(11) DEFAULT NULL,
    description varchar(255) DEFAULT '' NOT NULL,
    images varchar(255) DEFAULT NULL,
    date_of_building int(11) DEFAULT NULL,
    year_of_building varchar(255) DEFAULT NULL,
    dimensions varchar(255) DEFAULT '' NOT NULL,
    surface int(11) DEFAULT '0' NOT NULL,
    spectator_capacity varchar(255) DEFAULT '' NOT NULL,
    detail_link tinyint(4) unsigned DEFAULT '1' NOT NULL,
    slug varchar(2048) DEFAULT ''
);

#
# Table structure for table 'tx_sportms_clubsection_sport_mm'
#
CREATE TABLE tx_sportms_clubsection_sport_mm (
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    PRIMARY KEY (uid_local,uid_foreign),
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_sportms_competitionseason_teamseason_mm'
#
CREATE TABLE tx_sportms_competitionseason_teamseason_mm (
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    PRIMARY KEY (uid_local,uid_foreign),
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_sportms_person_nationality_mm'
#
CREATE TABLE tx_sportms_person_nationality_mm (
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    PRIMARY KEY (uid_local,uid_foreign),
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_sportms_sport_sporttype_mm'
#
CREATE TABLE tx_sportms_sport_sporttype_mm (
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    PRIMARY KEY (uid_local,uid_foreign),
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_sportms_teamseason_teamseasonsquadmember_mm'
#
CREATE TABLE tx_sportms_teamseason_teamseasonsquadmember_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_sportms_venue_club_mm'
#
CREATE TABLE tx_sportms_venue_club_mm (
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    PRIMARY KEY (uid_local,uid_foreign),
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_sportms_venue_club_mm'
#
CREATE TABLE tx_sportms_personprofile_sportpositiongroup_mm (
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    PRIMARY KEY (uid_local,uid_foreign),
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_sportms_venue_club_mm'
#
CREATE TABLE tx_sportms_personprofile_sportposition_mm (
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    PRIMARY KEY (uid_local,uid_foreign),
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);