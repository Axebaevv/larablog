<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
// Models
use App\Blog;
use App\User;


class BlogPublished extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    protected $blog;
    protected $user;
    public function __construct(Blog $blog, User $user)
    {
        $this->blog = $blog;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->subject('Published a new blog')->view('email.newblog')->with([
            'user' => $this->user,
            'blog' => $this->blog
        ]);
        return $this;
    }
}
