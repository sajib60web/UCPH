<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function smsReminder()
    {
        return view('admin.reminder.sms-reminder');
    }

    public function customSms()
    {
        return view('admin.reminder.custom-sms');
    }

    public function sendSmsReminder()
    {
        return 'Send Sms Reminder';
    }

    public function sendCustomSms()
    {
        return 'Send Custom Sms';
    }
}
