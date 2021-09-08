To define default upload folders of FAL images or files i recommend the usage of EXT:default_upload_folder

After installation you add following snippet to the Page TSconfig of the folder containing the sportms data:

default_upload_folders {
  tx_sportms_domain_model_club = 1:user_upload/sportms/club
  tx_sportms_domain_model_clubsection = 1:user_upload/sportms/clubsection
  tx_sportms_domain_model_competiton = 1:user_upload/sportms/competition
  tx_sportms_domain_model_game = 1:user_upload/sportms/game
  tx_sportms_domain_model_personprofile = 1:user_upload/sportms/person
  tx_sportms_domain_model_teamseason = 1:user_upload/sportms/team
  tx_sportms_domain_model_venue = 1:user_upload/sportms/venue
}

the number - 1 in the example - indicates which datastore to use. In the example i use the default "fileadmin" datastore.