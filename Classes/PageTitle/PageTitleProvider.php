<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\PageTitle;
    
    use TYPO3\CMS\Core\PageTitle\PageTitleProviderInterface;

    class PageTitleProvider implements PageTitleProviderInterface
    {
        
        /**
         * @param string $title
         */
        public function setTitle(string $title)
        {
            $this->title = $title;
        }
        
    }
