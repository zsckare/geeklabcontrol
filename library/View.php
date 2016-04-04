<?php

if (defined('YOi_Start') && $YOi_Token == "5ab7b44c0747390658bbf882ae4df1c7") {
    class View extends Response {

        protected $template;
        protected $vars = array();

        public function __construct($template, $vars = array())
        {
            $this->template = $template;
            $this->vars = $vars;
        }

        /**
         * @return mixed
         */
        public function getTemplate()
        {
            return $this->template;
        }

        /**
         * @return array
         */
        public function getVars()
        {
            return $this->vars;
        }

        public function go($template, $vars) {
              extract($vars);

              ob_start();

                 require "views/$template.tpl.php";

              if($layout == "on"){
                 $yield = ob_get_clean();


                     require "views/layout/".$nameLayout.".tpl.php";

              }

         }

        public function execute()
        {
          $template = $this->getTemplate();
          $vars = $this->getVars();
          $this->go($template,$vars);

        }

    }
}