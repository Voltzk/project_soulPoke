<ul class="sf-menu" id="nav">
	<li><a href="{{ url('/') }}">Home</a></li>
	<li><a href="{{ url('downloads') }}">Downloads</a></li>	

	<li><a href="{{ url('forum') }}">Community</a>
		<ul> <!-- (sub)dropdown COMMUNITY -->
			<li><a href="{{ url('onlinelist') }}">Who is online?</a></li>
			<li><a href="{{ url('highscores') }}">Highscores</a></li>
			<li><a href="{{ url('market') }}">Item Market</a></li>
			<li><a href="{{ url('houses') }}">Houses</a></li>
			<li><a href="{{ url('guilds') }}">Guilds</a>
			<li><a href="{{ url('support') }}">Staff</a></li>
			@if (config('app.items'))
				<li><a href="{{ url('items') }}">Items</a></li>
			@endif
		</ul>
	</li>

	<li><a href="{{ url('shop') }}">Shop</a>
		<ul> 
			<li><a href="{{ url('buypoints') }}">Buy Points</a></li>
			<li><a href="{{ url('shop') }}">Shop Offers</a></li>
		</ul>
	</li>

	@if (config('app.guildwar_enabled'))
		<ul>
			<li><a href="{{ url('guilds') }}">Guild List</a></li>
			<li><a href="{{ url('guildwar') }}">Guild Wars</a></li>
		</ul>
	@endif

	<li><a href="{{ url('helpdesk') }}">Support</a></li>

	<li><a href="https://www.facebook.com/PokeDashGamesOficial/" target="_blank">Social</a>
		<ul> <!-- (sub)dropdown SOCIAL -->
			<li><a href="#" target="_blank">Discord</a></li>
		</ul>
	</li>
</ul>
