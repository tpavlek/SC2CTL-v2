@extends('layout')

@section('title')
SC2CTL Down
@stop

@section('content')
<div class="splash">
	<div class="pure-g-r">
		<div class="pure-u-1-3">
			<div class="l-box">
				<img src="/img/computer.jpg" />
			</div>
		</div>
		<div class="pure-u-2-3">
			<h1 class="splash-head">We're taking a breather - be right back!</h1>
			<h2 class="splash-subhead">
				SC2CTL is down - the most likely cause for this is that we're updating groups/brackets
				and need some peace and quiet (and more importantly data consistency) to do this properly.
				This should never take more than an hour to do, so just sit tight - your games are coming soon.
			</h2>
			<p>
				<a href="http://procatinator.com/" class="pure-button pure-button-good pure-button-large">
					Oh god, I'm so bored please help
				</a>
			</p>
			<p>
				<a href="http://heyyeyaaeyaaaeyaeyaa.com/" class="pure-button pure-button-primary pure-button-large">
					I don't understand
				</a>
			</p>
		</div>
	</div>
</div>

@stop
