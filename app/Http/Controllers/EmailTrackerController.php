<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailTracker;

class EmailTrackerController extends Controller
{

   /**
    * Create a new controller instance.
    * @return void
    */

    public function index()
    {
        $campaigns = EmailTracker::select('campaign_id')
                            ->groupBy('campaign_id')
                            ->get();

        $campaignTotalEmailCount = EmailTracker::get()->groupBy('campaign_id')
                                                      ->map
                                                      ->count();

        $campaignTotalEmailDelivered = EmailTracker::where('status', 0)->get()
                                                                       ->groupBy('campaign_id')
                                                                       ->map
                                                                       ->count();

        $campaignTotalEmailFailed = EmailTracker::where('status', 1)->get()
                                                                    ->groupBy('campaign_id')
                                                                    ->map
                                                                    ->count();

        $campaignTotalEmailOpened = EmailTracker::where('record', 'OPENED')->get()
                                                                           ->groupBy('campaign_id')
                                                                           ->map
                                                                           ->count();

        $campaignTotalEmailNotOpen = EmailTracker::where('record', 'NOT OPEN')->get()
                                                                                     ->groupBy('campaign_id')
                                                                                     ->map
                                                                                     ->count();

        return view('emailtracker.index', compact('campaigns'));
    }

    /**
     * Storing the email track record in the database
     *
     * @return null
     */
    public function store(Request $request)
    {
        EmailTracker::where('tracker', $request->tracker)->increment('total_clicks', 1, ['status' => 0, 'record' => 'OPENED']);
    }

    /**
     * view the email track record from the database
     *
     * @return null
     */
    public function campaign($id)
    {
        $campaign = EmailTracker::where('campaign_id', $id)->firstOrFail();
        return view('emailtracker.campaign', compact('campaign'));

    }

    //END
}
