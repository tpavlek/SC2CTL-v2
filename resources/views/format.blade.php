@extends('layout')

@section('title')
Format
@stop

@section('content')
<h1 class="splash-head centered">Format</h1>
<div class="splash">
	<div class="pure-g-r">
		<div class="pure-u-1">
			<h2 class="splash-subhead">Format Overview</h2>
			<ol class="about">
				<li>
          Teams enrolled in a tournament all play a six-round Swiss Tournament
          <ul>
            <li>
              The initial seeding is done randomly.
            </li>
            <li>
              Subsequent rounds are matched roughly in terms of skill. Teams who
              are 1-0 will be matched with other 1-0 teams, etc. so the more rounds
              that are played, the more balanced each matchup will become for both teams
              involved.
            </li>
          </ul>
        </li>
				<li>Matches are best-of seven proleague format</li>
				<li>The rankings from the swiss round will be used to seed the playoff bracket
          <ul>
            <li>
              The size of the playoff bracket is determined by the number of registrants in the
              tournament based on the formula: <br />
              <div class="centered" style="font-size:200%;">
                min(2<sup>k</sup> - 2, 14)
              </div>
              Where k is some integer less than or equal to four, and the result is less than
              the total number of registrants in the tournament. <br/>
              <strong>Exception</strong>: If there are only 6 registrants or less in a tournament,
              everyone makes playoffs.
            </li>
            <li>
              The strongest players according to their group stage rankings are the ones who are
              seeded into playoffs. There are, however, two wildcard slots that are given randomly
              to the remaining teams who did not make playoffs. So, no matter your performance in
              the group stage, there's always a <em>chance</em> that you will make playoffs.
            </li>
            <li>
              The two teams who did best in the group stage will get a first-round playoff bye.
              If the bracket only has six players, that means the two best teams will be seeded
              directly into the semifinals.
            </li>
            <li>
              The finals are a single-elimination bracket.
            </li>
            <li>
              For example, if there are 30 total entrants in the tournament, the playoff size
              will be 14. If there are 12 total registrants, then the playoff size will be
              6, or 2<sup>3</sup> - 2. If there are 6 registrants total, then the playoff size
              will be 6, 2<sup>2 + 2.
            </li>
            <li>
              <div class="pure-g-r">
                <div class="pure-u-1-2">
                  <img src="/img/example-bracket.jpg" width="700"/>
                </div>
                <div class="pure-u-1-2">
                  <div class="padded-content">
                    <h2>Example Bracket</h2>
                    <p>
                      For example here, we have a "full" bracket with 14 players.
                    </p>
                    <p>
                      The two best teams, "1" and "2" have a first round bye and will play whoever
                      wins between the 11<sup>th</sup> player and the first wildcard.
                    </p>
                    <p>
                      The bracket is similarly symmetrical on the bottom half. As much as possible,
                      the outside leaves of the tournament have the "strongest" players playing the
                      "weakest" players, to prevent having a first-round finals.
                    </p>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </li>
        <li>
          A winner is crowned! The trophy belongs to them!
        </li>
			</ol>
		</div>

		<div class="pure-u-1">
			<h2 class="splash-subhead">Divisions</h2>
      <p class="about">
        There are three divisions in SC2CTL. Some divisions have restrictions on enrollment.
        See the <a href="http://dev.sc2ctl.com/rules#tournaments">rules</a> for more
        information.
      </p>
      <p class="about">
        <strong>SC2CTL Competitive</strong>: The competitive division of SC2CTL. Expect to see
        many masters and grandmaster level players in this division, though anyone is welcome!
        This division has the highest prizing and represents the highest standard of competition
        in SC2CTL.
        <br />
        <strong>SC2CTL Advanced</strong>: This league is for teams who are passionate about
        Starcraft II and love to play competitively with other teams, but may not have the skills
        or time to be the absolute top at the game. Only <em>diamond and below</em> are allowed
        in this division.
        <br />
        <strong>SC2CTL Casual</strong>: The league primarily designed for fun casual play between
        teams. The perfect league for those who love the game and want to compete, but just can't
        get out of those bottom three leagues (it's hard!). Only <em>gold and below</em> are 
        allowed.
      </p>
	  </div>
		
	</div>
</div>
@stop
