<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Recruitment;
use App\Models\RecruitmentJob as Job;
use App\Models\RecruitmentPlace as Place;

class RecruitmentSearch extends AbstractWidget
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
        $jobs = Job::all();
        $places = Place::all();

        return view('widgets.recruitment_search', [
            'config' => $this->config,
            'jobs'  =>  $jobs,
            'places'    =>  $places
        ]);
    }
}
