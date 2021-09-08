To define default upload folders of FAL images or files i recommend the usage of EXT:default_upload_folder, which can be found for TYPO3 10.4 LTS here:
- https://github.com/beechit/default_upload_folder
- composer require beechit/default-upload-folder

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

IMPORTANT: you have to manually create the folders beforehand. Else the files will still be uploaded to their default location.