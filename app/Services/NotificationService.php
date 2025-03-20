<?php

namespace App\Services;

use App\Models\Notification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    public function getAllNotifications()
    {
        return Cache::remember('notifications_all', 600, function () {
            return Notification::all();
        });
    }

    public function getNotificationById($id)
    {
        return Cache::remember("notification_{$id}", 600, function () use ($id) {
            return Notification::findOrFail($id);
        });
    }

    public function createNotification(array $data)
    {
        return Notification::create($data);
    }

    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['read_at' => now()]);
        Cache::forget("notification_{$id}");
        return $notification;
    }

    public function deleteNotification($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        Cache::forget("notification_{$id}");
        return true;
    }
}
