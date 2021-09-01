<?php
    
    namespace ChristianKnell\Sportms\ViewHelpers;
    
    class NationalityViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper
    {
        
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
        public function initializeArguments()
        {
            parent::initializeArguments();
            $this->registerArgument('nationality', 'string', 'static_info_table country uid', false, 'isoCodeA3');
        }
        
        /**
         * Build an country array
         *
         * @param string $sorting
         * @return string
         */
        public function render(): ?string
        {
            $nationality = $this->arguments['nationality'];
            if ($nationality) {
                $country = $this->countryRepository->findByUid($nationality);
                $isoCodeA2 = $country->getIsoCodeA2();
                $flagPath = 'EXT:core/Resources/Public/Icons/Flags/' . $isoCodeA2 . '.png';
                $this->arguments['src'] = $flagPath;
                return parent::render();
            } else {
                return null;
            }
        }
        
    }