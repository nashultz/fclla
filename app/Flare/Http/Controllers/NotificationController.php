<?php

namespace FCLLA\Flare\Http\Controllers;

use Illuminate\Http\Request;
use FCLLA\Flare\Notification;
use FCLLA\Flare\Contracts\Repositories\NotificationRepository;
use FCLLA\Flare\Contracts\Repositories\AnnouncementRepository;

class NotificationController extends Controller
{
    /**
     * The announcements repository.
     *
     * @var AnnouncementRepository
     */
    protected $announcements;

    /**
     * The notifications repository.
     *
     * @var NotificationRepository
     */
    protected $notifications;

    /**
     * Create a new controller instance.
     *
     * @param  AnnouncementRepository  $announcements
     * @param  NotificationRepository  $notifications
     * @return void
     */
    public function __construct(AnnouncementRepository $announcements,
                                NotificationRepository $notifications)
    {
        $this->announcements = $announcements;
        $this->notifications = $notifications;

        $this->middleware('auth');
    }

    /**
     * Get the recent notifications and announcements for the user.
     *
     * @return Response
     */
    public function recent(Request $request)
    {
        return response()->json([
            'announcements' => $this->announcements->recent()->toArray(),
            'notifications' => $this->notifications->recent($request->user())->toArray(),
        ]);
    }

    /**
     * Mark the given notifications as read.
     *
     * @param  Request  $request
     * @return Response
     */
    public function markAsRead(Request $request)
    {
        Notification::whereIn('id', $request->notifications)->update(['read' => 1]);
    }
}
