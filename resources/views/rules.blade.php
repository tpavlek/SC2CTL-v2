@extends('layout')

@section('title')
Rules
@stop

@section('content')
<div class="splash about">
  <strong>Note:</strong> The Admins reserve the right to modify or change these rules in exceptional circumstances.
  <ul>
    <li><a href="#admins">Admins</a></li>
    <li><a href="#members">Members</a></li>
    <li><a href="#teams">Teams</a></li>
    <li><a href="#lineups">Lineups</a></li>
    <li><a href="#rosters">Rosters</a></li>
    <li><a href="#playing">Playing Matches</a></li>
    <li><a href="#observing">Observing</a></li>
    <li><a href="#tournaments">Tournaments</a></li>
  </ul>

  <p>
    <a id="admins"><h3>Admins</h3></a>
    <ul>
      <li><strong>Admins reserve the right to override any rule outlined here on a case-by-case basis</strong></li>
      <li>
        The official admins for SC2CTL are as follows. If someone states they are this person without verification
        they may be attempting to impersonate an admin:
        <ol>
          <li><strong>bonywonix (Founder)</strong> - Battle.net: bonywonix#268 - email: adult@sc2ctl.com - skype: bonywonix</li>
        </ol>
      </li>
      <li>The casters for SC2CTL are:
        <ol>
          <li><strong>wingnutsc</strong> - email: wingnutstarcraft@gmail.com</li>
          <li><strong>gallagation</strong> - email: nick.g.gallagher@gmail.com</li>
        </ol>
      </li>
      <li>If you encounter an instance of suspected cheating, rules question or similar problem please contact an admin.</li>
      <li>If you encounter any bugs or programming errors with the site, please contact the founder immediately</li>
      <li>If an admin requests to observe a game he <em>must</em> be allowed to observe the game.</li>
      <li>If an admin requests that certain observers be removed from a game they <em>must</em> be removed</li>
      <li>
        In the case where an admin is also participating on a team in the league, and a decision would cause a conflict of
        interest, a member may request a second admin or the founder to weigh in on the situation. If the founder is involved
        in the conflict of interest, that's unfortunately Tough Titties&trade;. He's a good guy though. I promise.
      </li>
    </ul>
  </p>

  <p>
    <a id="members"><h3>Members</h3></a>
    <ul>
      <li>
        A "member" is anyone registered on the site SC2CTL. By registering on this site you agree to
        both follow the rules outlined in this document and in general refrain from Being A Jerk&trade;
      </li>
      <li>
        Members must have a valid Battle.net account that is in good standing. Those that have been banned
        from Battle.net for cheating will not be allowed to register.
      </li>
      <li>
        Any member is eligible to play from anywhere in the world, however any non-North-American players will
        be required to play on the <strong>NA Server</strong> and play on a North-American compatible schedule outlined
        in <a href="#timeliness">Timeliness</a> below.
      </li>
      <li>
        Members will be automatically subscribed to the SC2CTL newsletter, which will contain important information
        about the league. Emails should be scarce, and all contain an opt-out link.
      </li>
    </ul>
  </p>

  <p>
    <a id="teams"><h3>Teams</h3></a>
    <ul>
      <li>A "team" is a registered entity on SC2CTL comprised of 6 or more members - teams with less than 6 members are inelligible to participate</li>
      <li>
        A team is a unit specific to SC2CTL. That is: members from [ROOT], Complexity and GGKids absolutely <em>can</em> play on the same team.
        A team is simply a group of people registered to play in the league, SC2CTL does not concern itself with external conditions or
        circumstances.
      </li>
      <li>
        "Mercenaries" are <em>not</em> allowed. A "mercenary" is defined as someone that is <em>paid</em> specifically to play on a team for SC2CTL, 
        either for the full season or a specific game. Paying includes any upfront compensation to entice the player to play specifically for the league.
        Regular salaries and offers to share prizes do <em>not</em> consitute paying a mercenary.
      </li>
      <li>
        "Professional" teams <em>are</em> allowed to participate, however they <em>must</em> get prior authorization from the founder. If you're in doubt,
        then you should absolutely send an email clarifying. The purpose of this rule is to make sure that SC2CTL is a priority for these teams. The
        community teams take this seriously, and professional teams destroying the format with multiple forfeits because of conflicting schedules
        will not be tolerated.
      </li>
    </ul>
  </p>

  <p>
    <a id="lineups"><h3>Lineups</h3></a>
    <ul>
      <li>
        A "lineup" is the smallest unit of a team. Lineups are things like "A-Team" and "Gold/Silver Division". A lineup is registered in a tournament.  
      </li>
      <li>
        A member can only be on a single lineup in SC2CTL.
      </li>
      <li>
        Members must be on a lineup for at least six (6) days before they are allowed to play any games for that lineup.<br />
        <strong>Exception</strong>: In the first week, this restriction is waived.
      </li>
      <li>
        Members are allowed to switch lineups and teams mid-tournament, however the 6-day timeout rule listed above will still apply.
      </li>
      <li>
        Teams may <strong>not</strong> send out any player who is not on their SC2CTL roster. Members must be on
        the SC2CTL roster for at least six (6) days before they are elligible to play.
      </li>
      <li>
        Members of lineups are allowed to be promoted during the season. Improvement is welcomed and encouraged. If there are concerns of a 
        particular member smurfing, please contact an admin
      </li>
    </ul>
  </p>

  <p>
    <a id="rosters"><h3>Rosters</h3></a>
    <ul>
      <li>A "roster" is the selection of players for each map in a match.</li>
      <li>Rosters must be completed and <em>confirmed</em> before 11:30PM Mountain Time each Tuesday</li>
      <li>
        A player may not play twice on any particular roster<br />
        <strong>Exception</strong>: In the Ace Match, a player who has already played may play again.
      </li>
    </ul>
  </p>

  <p>
    <a id="timeliness"><h3>Timeliness</h3></a>
    <ul>
      <li>Due to the nature of the format, late submissions of games will <em>not</em> be accepted.</li>
      <li>Matches are due by 10PM Mountain Time on each Sunday.</li>
      <li>Roster submissions are due by 11:30PM Mountain Time each Tuesday</li>
      <li>
        If rosters are not submitted on time, they may be randomly generated by an admin. Randomly generated
        rosters are final.
      </li>
      <li>
        This league is "NA-Friendly". What that means is that games are expected to be played between the hours of 4PM-10PM
        mountain time on weekdays and 8AM-11PM on weekends. If a particular player is living on another continent and is 
        unavailable to play at any of these times due to his timezone, but the other player is available, the <em>foreign player</em>
        will be disqualified. Sorry, it's just how it is. Europeans are still welcome to play, but they have to make themselves
        available at North American friendly times.
      </li>
      <li>
        Games may be played "piecemeal". Since the rosters are locked in, those who know their opponent may
        play and report their games independently of the rest of their team.
      </li>
      <li>
        Extra games may be played if the teams desire, however they must <em>not</em> be reported until they are
        relevant. For example, in a best of seven, if a team wins the first four games then no more games need
        to be played. The players in Game 6 may choose to play their games before they know the result of the first five,
        however they must <em>not</em> report them until it is known that the game may have an effect on the result.<br/>
        So, if Team A wins games 1, 2, 3 and 5, then the result of game six must <em>not</em> be submitted.
        However, if Team A only wins games 1, 2 and 3, then the result of game six <em>must</em> be submitted.
      </li>
      <li>
        If one team "no-shows" for a scheduled game, they will recieve a DQ for that game.
        <br />
        <em>No shows are defined as:</em>
        <ol>
          <li>Being 15 minutes late to the scheduled game without notifying the other team in any manner</li>
          <li>
            Not making an effort to schedule the match (eg. no verifiable communication to the other party - 
              <em>hint: use email or other mediums with logs and delivery receipts</em>)
          </li>
        </ol>
      </li>
      <li><strong>The burden of proof that your team attempted to schedule the match is on your team.</strong></li>
      <li>
        Game DQ's will be assigned as follows:
        <ol>
          <li>If one player no-shows and the other is present, the no-show player will recieve a DQ</li>
          <li>If both players no-show, the results will be randomly generated and both <em>teams</em> will receive an official warning</li>
          <li>If teams are consistently truant in their matches, they may be removed from the league altogether</li>
        </ol>
      </li>
    </ul>
  </p>

  <p>
    <a id="playing"><h3>Playing Matches</h3></a>
    <ul>
      <li>All matches are best-of seven (a team must win four games to win the match)</li>
      <li>Matches are played in proleague format (each team chooses the order in which their players will
          play, and then no substituations are made during the match)</li>
      <li>
        The map pool for each week will be posted on the <a href="{{ URL::route('home.about') }}">about page</a>
        each Sunday at 11:50PM Mountain Time. Maps must be played in the order listed, eg: Game 5 must be played
        on the fifth map listed.
      </li>
      <li>
        Players may choose their race before every game. Random is an acceptable race. If the ace player has
        already played an earlier game in the match, he is allowed to choose a different race for the ace match.
      </li>
      <li>
        BM is <em>not</em> tolerated. Chat is allowed only from the <em>players</em> (observers may not chat at all). If
        one of the players requests that chat stop, no further chat is allowed except a single "gg" as a surrender.
      </li>
      <li>
        Sharing accounts or playing on another player's account is <em>not</em> allowed.
      </li>
      <li>
        If at least 60% of your team is not having fun, you're disqualified.
      </li>
    </ul>
  </p>

  <p>
    <a id="observing"><h3>Observing Matches</h3></a>
    <ul>
      <li>The only observers allowed in a game are casters, admins a single lineup captain.</li>
      <li>If a lineup captain is playing, he may elect to have a single other team member observe his game</li>
      <li>Observer chat is <em>strictly</em> prohibited.</li>
      <li>If an observer is slowing down the game, he may be asked to leave. Please respect this and leave immediately</li>
      <li>
        Games may be streamed. This is expressly allowed. The opposing player may request a minimum of 2 minute delay be added to
        the stream. For real though, just don't cheat.
      </li>
      <li>Don't cheat.</li>
      <li><strong>Stop thinking about cheating.</strong></li>
    </ul>
  </p>
 
  <p>
    <a id="reporting"><h3>Reporting Matches</h3></a>
    <ul>
      <li>Please report matches as soon as possible after the conclusion of the match.</li>
      <li>It is the responsibility of the winner to report the result of his match</li>
      <li>
        Participants in games are allowed to report the results of their own games. Lineup captains are able to report
        matches for any game played by a member of their lineup. Team Owners are able to report any game played by a member
        of their team.
      </li>
      <li>Do not report results that may not be relevant (see the entry in timeliness above for more information)</li>
      <li>
        If there is a bug preventing the reporting of the match you <em>must</em> email the result to the founder!
        Games that are not reported will be treated as a forfeit.
      </li>
    </ul>
  </p>

  <p>
    <a id="tournaments"><h3>Tournaments</h3></a>
    Some tournaments have league restrictions.
    <ul>
      <li>
        <strong>SC2CTL Competitive</strong>: Anyone is welcome in this league. As the competitive division expect teams with
        many masters and grandmaster level players.
      </li>
      <li>
        <strong>SC2CTL Advanced</strong>: This league is for those who take the game seriously but do not have the time or
        skill to be the absolute top at the game. The cap for this league is <em>diamond and below</em>.
      </li>
      <li>
        <strong>SC2CTL Casual</strong>: This is a primarily fun division for players to compete in. It would be incredibly
        dickish to ruin this fun by smurfing. League cap: <em>Gold and below</em>
      </li>

      <li>
        A "league cap" is the maximum league a player may have <em>at registration</em>. Players may be promoted later in the season,
        but they may not exceed the league cap at the beginning.
      </li>
      <li>
        If a new player is joining a team or lineup mid-season, he/she must <em>not</em> exceed the league cap.
      </li>
      <li>
        A player will be considered smurfing if he has achieved a league higher than the league cap in
        any seasons <em>after</em> the <strong>2013 Season 5</strong>.
      </li>
      <li>
        If a player has ever achieved <em>two higher</em> than the level cap, then they will be considered to be smurfing. For example,
        if a Silver player has been in diamond league in the past, that player is inelligble to compete in 
        SC2CTL Casual.
      </li>
      <li>
        A player may also be considered to be smurfing if there is sufficient evidence that he has been trying to keep his account at a low
        level, or if he's playing on a different account, when his actual skill level is much higher. This decision is made at the discretion
        of the admins.
      </li>
      <li>
        If a player is smurfing, they may be disqualified from participating in current or future seasons of SC2CTL. If more than three members
        of a lineup are deemed to be smurfing that lineup may either be bumped up into the next-highest SC2CTL division, or disqualified,
        at the admin's discretion. Factors like format convenience and current tournament state are considered in this decision.
      </li>
    </ul>
  </p>

  <p>
    You made it to the bottom! You should be familiar with the rules now, so get out there and have fun! Remember: 
    if 60% of your team is not having fun, you're immediately disqualified.
  </p>

</div>
@stop
