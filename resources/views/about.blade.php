@extends('layout')

@section('title')
About the League
@stop

@section('content')

<div class="splash">
    <div class="content">
        <div class="buttons">
            <a href='http://www.teamliquid.net/forum/sc2-tournaments/494083-youmacon-2015-sc2-detroit-1000-prize-oct-31-nov1#1' class="button" style="font-size:300%">
                YOUMACON DETROIT 2015
            </a>
            <br />
            <a href="{{ URL::route('home.contact') }}" class="button">
                Connect with us
            </a>
            <br />
            <a href="{{ URL::route('help') }}" class="button">
                Help
            </a>
        </div>
    </div>
</div>

<section class="section">
    <p>
        The SC2CTL was designed as the premier, community-oriented team league. From the ground up, the league was
        designed for maximum participation of those involved, while not forgetting the joy that can be found from being
        determined as the sole winner. League seasons were long to maximize the amount of play every team gets before
        being eliminated.
    </p>

    <p>
        Now, SC2CTL operates like a community league that might be down the street from your house; we organize fun
        and unique events and help our members achieve their potential in every way we can. We're here because we
        love Starcraft.
    </p>

</section>

<section class="section">
    <h2 class="section-header">History</h2>
    <section class="timeline" id="league-history">
        <div class="block">
            <div class="img-container wait">
                <img src="/img/icon/light-bulb.svg" />
            </div>


            <div class="content">
                <h2>The idea is born</h2>
                <p>
                    While playing in the Team League organized by the "Strength in Numbers" forum (who absorbed
                    the former FXO NA), <a href="https://twitter.com/troypavlek">Troy</a> was very displeased
                    with the organization and cohesiveness of the experience. He thought he could do better.
                </p>
                <span class="date">May 10, 2013</span>
            </div>
        </div>

        <div class="block">
            <div class="img-container">
                <img src="/img/icon/home.svg" />
            </div>

            <div class="content">
                <h2>Version 1 Launches!</h2>
                <p>
                    After many frantic bouts of 13-hour programming days and skipping out on handing in
                    University assignments and quizzes, Version 1 of the site is ready to launch! The
                    <a href="http://www.reddit.com/r/starcraft/comments/1he2o8/introducing_sc2ctl_the_starcraft_ii_community/">
                        inaugural reddit post
                    </a> is met with a relatively tepid response.
                </p>
                <span class="date">June 30th, 2013</span>
            </div>
        </div>
        <div class="block">
            <div class="img-container start">
                <img src="/img/icon/dollars.svg" />
            </div>

            <div class="content">
                <h2>Das Keyboard Sponsors SC2CTL Season 1!</h2>
                <p>
                    In a fantastic sponsor pickup for a small, new league, SC2CTL picks up Das Keyboard as a
                    sponsor. Das offers up 5 mechanical keyboards to the winning team along with a selection of
                    swag items for the lower leagues.
                    <a href="http://www.reddit.com/r/starcraft/comments/1i4dhf/das_keyboard_sponsors_sc2ctl_the_starcraft_ii/">
                        the reddit thread</a> gets a lot of attention and SC2CTL has 80 teams register.
                </p>
                <span class="date">July 11, 2013</span>
            </div>
        </div>

        <div class="block">
            <div class="img-container video">
                <img src="/img/icon/camera.svg" />
            </div>

            <div class="content">
                <h2>WingnutSC and Gallagation join the team</h2>
                <p>
                    <a href="https://twitter.com/wingnutSC">WingnutSC</a> and
                    <a href="https://twitter.com/gallagation">Gallagation</a> join the SC2CTL team as
                    casters-in-chief. In a partnership made in heaven the duo would go on to cast over 50
                    matches totalling hundreds of hours of game time.
                </p>
                <span class="date">July 13, 2013</span>
            </div>
        </div>

        <div class="block">
	    <a href="http://vods.sc2ctl.com/vod/2013/09/25/Team%20Gravity-YMCMB/">	
                <div class="img-container video">
                    <img src="/img/icon/camera.svg" />
                </div>
           </a>

            <div class="content">
                <h2>The S1 finals are cast in a show with casters live at Michigan University</h2>
                <p>
                    In an absolutely <a href="http://vods.sc2ctl.com/vod/2013/09/25/Team%20Gravity-YMCMB/">incredible finals</a>
                    we see Team Gravity take on the favourites to win YOUNGMONEYCASHMONEYBILLIONAIRES. Players like
                    Hendralisk and MaSa are fielded against some up-and-coming American players.
                </p>
                <span class="date">September 22, 2013</span>
            </div>
        </div>

        <div class="block">
            <a href="http://vods.sc2ctl.com/vod/2013/11/08/Winter-Triforks/">
                <div class="img-container video">
                    <img src="/img/icon/camera.svg" />
                </div>
            </a>

            <div class="content">
                <h2>Youmacon 2013</h2>
                <p>
                    SC2CTL hosts the Starcraft 2 tournament at Youmacon detroit.
                </p>
                <span class="date">November 2, 2013</span>
            </div>
        </div>

        <div class="block">
            <a href="http://vods.sc2ctl.com/vod/2014/01/08/Clarity-SEED/">
                <div class="img-container start">
                    <img src="/img/icon/dollars.svg" />
                </div>
            </a>

            <div class="content">
                <h2>SC2CTL hosts the largest Dogecoin showmatch ever!</h2>
                <p>
                    Through some <a href="http://www.reddit.com/r/starcraft/comments/1u6qym/in_one_week_clarity_gaming_will_play_root_seed_in/">
                    incredible community generosity</a> SC2CTL raises over a million dogecoins for a showmatch
                    between Clarity and SEED. Just after the showmatch, these cryptocoins were worth well over
                    two thousand USD.
                </p>
                <span class="date">January 7, 2014</span>
            </div>
        </div>

        <div class="block">
            <div class="img-container start">
                <img src="/img/icon/dollars.svg" />
            </div>

            <div class="content">
                <h2>Season 2 is announced, MYTHLOGIC joins as a sponsor</h2>
                <p>
                    Continuing a strong one-two punch, 2014 continues with SC2CTL Season 2. MYTHLOGIC joins on as
                    a sponsor, offering over $1100 in prizes, giveaways and support. WignutSC and Gallagation reprise
                    their roles as lead casters. Over 100 teams register in the league, making SC2CTL the largest
                    Team League in the world by enrollment two years running.

                    Also announced are <a href="http://www.reddit.com/r/starcraft/comments/21dmzo/sc2ctl_season_2_sponsored_by_mythlogic_over_1000/">
                        some interesting new prize awards</a> including The Bellcurve Award and CombatEXTreme.
                </p>
                <span class="date">March 25, 2014</span>
            </div>
        </div>

        <div class="block">
            <a href="http://vods.sc2ctl.com/vod/2014/07/05/MirG-MicroGamerZ/">
                <div class="img-container video">
                    <img src="/img/icon/camera.svg" />
                </div>
            </a>

            <div class="content">
                <h2>Grubby and iNcontroL guest cast on the Season 2 Finals</h2>
                <p>
                    SC2CTL hits its highest peak stream viewership of over 3000 sustained viewers as Grubby and
                    iNcontroL join on to guest cast the Season 2 finals.

                    MicroGamerZ takes on Miraculous Gaming in a <a href="http://vods.sc2ctl.com/vod/2014/07/05/MirG-MicroGamerZ/">fantastic series.</a>
                </p>
                <span class="date">June 28, 2014</span>
            </div>
        </div>

        <div class="block">
            <div class="img-container video">
                <img src="/img/icon/camera.svg" />
            </div>

            <div class="content">
                <h2>Youmacon 2014</h2>
                <p>
                    The team is back for another year of hosting Youmacon pulling in the likes of Winter and DesRow
                </p>
                <span class="date">November 3, 2014</span>
            </div>
        </div>

        <div class="block">
            <div class="img-container question">
                <img src="/img/icon/question-man.svg" />
            </div>

            <div class="content">
                <h2>SC2CTL Jeopardy</h2>
                <p>
                    In an extreme change of pace, SC2CTL hosted the first Starcraft 2 game show, in a Jeopardy-style
                    format.
                </p>
                <span class="date">March 3, 2015</span>
            </div>
        </div>

        <div class="block">
            <div class="img-container question">
                <img src="/img/icon/question-man.svg" />
            </div>
            <div class="content">
                <h2>Jeopardy episode 11 is last episode of regular broadcast</h2>
                <p>
                    In <a href="http://tpavlek.me/blog/2015/05/12/the-plan-for-scjeopardy/">
                        a post on his blog
                    </a>
                    Troy outlines the plan for Starcraft Jeopardy, moving from a regular occurrence to an occasional special
                    event.
                </p>
                <span class="date">June 6, 2015</span>
            </div>
        </div>

        <div class="block">
            <div class="img-container video">
                <img src="/img/icon/camera.svg" />
            </div>

            <div class="content">
                <h2>Youmacon 2015</h2>
                <p>
                    For yet another year, the team hosts <a href="http://www.teamliquid.net/forum/sc2-tournaments/494083-youmacon-2015-sc2-detroit-1000-prize-oct-31-nov1#1">
                        Youmacon Detroit
                    </a>
                </p>
                <span class="date">October 30, 2015</span>
            </div>
        </div>

        <div class="block">
            <div class="img-container wait">
                <img src="/img/icon/light-bulb.svg" />
            </div>
        </div>
    </section>

    <h2 class="tease">What's next for SC2CTL...?</h2>
</section>
<div class="call-to-action">
    <h2 class="title">Keep up with us</h2>
    <h2 class="call-to-action">Subscribe to the newsletter</h2>
    <a href="http://eepurl.com/BZ3OD" class="button massive">Subscribe</a>
</div>


@stop
