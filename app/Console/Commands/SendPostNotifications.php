<?php

namespace App\Console\Commands;

use App\Contracts\PostNotificationServiceInterface;
use App\Mail\NewPostNotification;
use App\Models\PostNotification;
use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPostNotifications extends Command
{
    private $notificationService;
 
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostNotificationServiceInterface $notificationService)
    {
        parent::__construct();
        $this->notificationService = $notificationService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->notificationService->sendPostNotifications();
        $this->info('Notifications have been sent!');
    }
}
