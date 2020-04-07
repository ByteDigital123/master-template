<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CoursePurchased extends Notification
{
    use Queueable;
    /**
     * @var User
     */
    private $admin;
    /**
     * @var User
     */
    private $user;
    /**
     * @var Course
     */
    private $course;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($admin, $user, $course)
    {
        $this->admin = $admin;
        $this->user = $user;
        $this->course = $course;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->markdown('emails.admin.CoursePurchased', [
            'admin' => $this->admin,
            'user' => $this->user,
            'course' => $this->course
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
