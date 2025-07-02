<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\PageTitle;

    class PageTitleProvider
    {
        
        /**
         * @param string $title
         */
        public function setTitle(string $title): void
        {
            $this->title = $title;
        }
        
    }
