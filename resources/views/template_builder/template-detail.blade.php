<div style="margin: 0 auto;">
    {!! $page->html !!}
</div>

<img src="{{ route('tracker.emails.store') }}/?tracker={{$tracker->tracker}}&email_id={{$tracker->email_id}}&campaign_id={{$tracker->campaign_id}}&record=OPENED" width="1" height="1">