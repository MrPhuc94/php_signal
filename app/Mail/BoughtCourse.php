<?php

namespace App\Mail;

use App\Models\Settings;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Blade;

class BoughtCourse extends Mailable
{
    use Queueable, SerializesModels;
    public string $courseTitle;
    public string $amount;
    public string $description;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $courseTitle, string $amount, string $description)
    {
        $this->courseTitle = $courseTitle;
        $this->amount = $amount;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $set = Settings::select('membership_email_template')->find(1);
        $compiledTemplate = Blade::compileString($set->membership_email_template);
        $renderedContent = Blade::render($compiledTemplate, [
            'courseTitle' => $this->courseTitle,
            'amount' => $this->amount,
            'description' => $this->description,
        ]);
        return $this->markdown('emails.bought-course')
            ->subject('Thank you for purchasing this course')
            ->with([
                'content' => $renderedContent,
            ]);
    }
}