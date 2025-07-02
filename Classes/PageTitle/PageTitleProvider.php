<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\PageTitle;
    
    use TYPO3\CMS\Core\PageTitle\AbstractPageTitleProvider;

    final class PageTitleProvider extends AbstractPageTitleProvider
    {
        
        /**
         * @param string $title
         */
        public function setTitle(string $title)
        {
            $this->title = $title;
        }
        
    }
