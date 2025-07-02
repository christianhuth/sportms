<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\PageTitle;

    class MyPageTitleProvider
    {
        
        /**
         * @param string $title
         */
        public function setTitle(string $title): void
        {
            $this->title = $title;
        }
        
    }
