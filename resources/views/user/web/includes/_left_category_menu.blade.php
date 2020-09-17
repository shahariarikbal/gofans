<aside class="sidebar static">
    <div class="widget widget-space-social">
        <h4 class="widget-title">Socials</h4>
        <ul class="socials">
            <li class="facebook">
                <a title="" href="#"><i class="fa fa-facebook"></i> <span>facebook</span> <ins>45 likes</ins></a>
            </li>
            <li class="twitter">
                <a title="" href="#"><i class="fa fa-twitter"></i> <span>twitter</span><ins>25 likes</ins></a>
            </li>
            <li class="google">
                <a title="" href="#"><i class="fa fa-google"></i> <span>google</span><ins>35 likes</ins></a>
            </li>
        </ul>
    </div>
    <div class="widget widget-space-shortcuts">
        <h4 class="widget-title">Shortcuts</h4>
        <ul class="naves">
            <li>
                <i class="fa fa-user"></i>
                <a href="{{ url('/timeline/'.auth()->user()->id) }}" title="">Timeline</a>
            </li>
            <li>
                <i class="fa fa-users"></i>
                <a href="inbox.html" title="">Friends</a>
            </li>
            <li>
                <i class="fa fa-paper-plane"></i>
                <a href="fav-page.html" title="">Offers</a>
            </li>
            <li>
                <i class="fa fa-money"></i>
                <a href="timeline-friends.html" title="">Earn Coins</a>
            </li>
            <li>
                <i class="fa fa-tasks"></i>
                <a href="timeline-photos.html" title="">My Task</a>
            </li>
            <li>
                <i class="fa fa-outdent"></i>
                <a href="timeline-videos.html" title="">Payout</a>
            </li>
            <li>
                <i class="fa fa-cube"></i>
                <a href="messages.html" title="">Referrals</a>
            </li>
            <li>
                <i class="fa fa-life-ring"></i>
                <a href="notifications.html" title="">Support</a>
            </li>
            <li>
                <i class="fa fa-life-ring"></i>
                <a href="people-nearby.html" title="">Help</a>
            </li>
            <li>
                <i class="fa fa-life-ring"></i>
                <a href="insights.html" title="">Setting</a>
            </li>
        </ul>
    </div><!-- Shortcuts -->
    <div class="widget">
        <h4 class="widget-title">Recent Activity</h4>
        <ul class="activitiez">
            <li>
                <div class="activity-meta">
                    <i>10 hours Ago</i>
                    <span><a href="#" title="">Commented on Video posted </a></span>
                    <h6>by <a href="time-line.html">black demon.</a></h6>
                </div>
            </li>
            <li>
                <div class="activity-meta">
                    <i>30 Days Ago</i>
                    <span><a href="#" title="">Posted your status. “Hello guys, how are you?”</a></span>
                </div>
            </li>
            <li>
                <div class="activity-meta">
                    <i>2 Years Ago</i>
                    <span><a href="#" title="">Share a video on her timeline.</a></span>
                    <h6>"<a href="#">you are so funny mr.been.</a>"</h6>
                </div>
            </li>
        </ul>
    </div><!-- recent activites -->
    <div class="widget stick-widget">
        <h4 class="widget-title">Who's follownig</h4>
        <ul class="followers">
            <li>
                <figure><img src="{{ asset('goweb') }}/images/resources/friend-avatar2.jpg" alt=""></figure>
                <div class="friend-meta">
                    <h4><a href="time-line.html" title="">Kelly Bill</a></h4>
                    <a href="#" title="" class="underline">Add Friend</a>
                </div>
            </li>
            <li>
                <figure><img src="{{ asset('goweb') }}/images/resources/friend-avatar4.jpg" alt=""></figure>
                <div class="friend-meta">
                    <h4><a href="time-line.html" title="">Issabel</a></h4>
                    <a href="#" title="" class="underline">Add Friend</a>
                </div>
            </li>
            <li>
                <figure><img src="{{ asset('goweb') }}/images/resources/friend-avatar6.jpg" alt=""></figure>
                <div class="friend-meta">
                    <h4><a href="time-line.html" title="">Andrew</a></h4>
                    <a href="#" title="" class="underline">Add Friend</a>
                </div>
            </li>
            <li>
                <figure><img src="{{ asset('goweb') }}/images/resources/friend-avatar8.jpg" alt=""></figure>
                <div class="friend-meta">
                    <h4><a href="time-line.html" title="">Sophia</a></h4>
                    <a href="#" title="" class="underline">Add Friend</a>
                </div>
            </li>
            <li>
                <figure><img src="{{ asset('goweb') }}/images/resources/friend-avatar3.jpg" alt=""></figure>
                <div class="friend-meta">
                    <h4><a href="time-line.html" title="">Allen</a></h4>
                    <a href="#" title="" class="underline">Add Friend</a>
                </div>
            </li>
        </ul>
    </div><!-- who's following -->
</aside>
