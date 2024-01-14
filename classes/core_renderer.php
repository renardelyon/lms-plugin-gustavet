<?php

use core_auth\output\login;

class theme_gustavet_core_renderer extends core_renderer
{
    private function get_logo_url_from_config()
    {
        global $CFG;

        return $CFG->logourl;
    }

    public function render_login(login $form)
    {
        global $CFG, $SITE;

        $context = $form->export_for_template($this);

        $context->errorformatted = $this->error_text($context->error);
        $context->logourl = $this->get_logo_url_from_config();
        $context->sitename = format_string(
            $SITE->fullname,
            true,
            ['context' => context_course::instance(SITEID), "escape" => false]
        );

        return $this->render_from_template('core/loginform', $context);
    }
}
