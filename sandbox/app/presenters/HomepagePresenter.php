<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
    
        /** @var Todo\TaskTable */
        private $tasks;

        protected function startup()
        {
            parent::startup();
            $this->tasks = $this->context->tasks;
        }
        
        public function renderDefault()
        {
            $this->template->tasks = $this->tasks->findIncomplete();
        }
}
