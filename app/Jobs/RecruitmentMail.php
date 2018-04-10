<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Mail\NoticeToAdmin;
use App\Mail\NoticeToUser;

class RecruitmentMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    public $tries = 5;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $configure = DB::table('configure')->first();
        $email_admin = 'admin@gmail.com';
        $email_user = $this->email;
        $email_admin_template = 'mail.notice_to_admin';
        $email_user_template = 'mail.notice_to_user';

        if ($configure->email) {
            $email_admin = $configure->email;
        }

        try {
            Mail::to($email_admin)->send(new NoticeToAdmin($email_admin_template, $email_user));
            Mail::to($email_user)->send(new NoticeToUser($email_user_template, ''));
        } catch (Exception $e) {
            \Log::info($e);    
        }
    }
}
