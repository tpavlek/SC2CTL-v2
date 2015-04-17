You have received a new share request!

<br />
<br />

{{ $shareRequest->get_requester->username }} has shared the following data:

<ul>
    @forelse($shareRequest->getShareData() as $field => $value)
        <li><strong>{{ $field }}</strong>: {{ $value }}</li>
    @empty
        <li><em>No data was included in the request</em></li>
    @endforelse
</ul>

You can accept this share request at
<a href="{{ URL::route('meetup.user.show', [ $shareRequest->meetup->slug, $shareRequest->get_requestee->username ]) }}">
    {{ URL::route('meetup.user.show', [ $shareRequest->meetup->slug, $shareRequest->get_requestee->username ]) }}
</a>.
