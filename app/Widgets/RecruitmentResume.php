<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\RecruitmentResume as Resume;

class RecruitmentResume extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $resumes = Resume::all();

        return view('widgets.recruitment_resume', [
            'config' => $this->config,
            'resumes' => $resumes
        ]);
    }
}
