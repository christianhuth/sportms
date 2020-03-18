<?php
	
	namespace Balumedien\Clubms\ViewHelpers;
	
	# SOURCE: https://github.com/in2code-de/femanager/blob/develop/Classes/ViewHelpers/Form/GetCountriesFromStaticInfoTablesViewHelper.php
	
	class NationalityViewHelper {
		
		/**
		 * countryRepository
		 *
		 * @var \SJBR\StaticInfoTables\Domain\Repository\CountryRepository
		 * @inject
		 */
		protected $countryRepository;
		
		/**
		 * Initialize
		 *
		 * @return void
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->registerArgument('key', 'string', 'static_info_table country uid', FALSE, 'isoCodeA3');
		}
		
		/**
		 * Build an country array
		 *
		 * @param string $sorting
		 * @return array
		 */
		public function render(): array {
			$key = $this->arguments['key'];
			$country = $this->countryRepository->findByUid($key);
			return $country;
		}
		
		
	}