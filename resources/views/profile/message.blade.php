<div class="column displaybox">
    @include('profile.navprofile')
    <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
        <ul>
            <li><a href="/profile">Profile</a></li>
            <li class="is-active"><a href="/message">Messages</a></li>
        </ul>
    </nav>
    <div class="containerx">
        <div class="title is-5 has-text-link">Unread Messages</div>
        <div class="column">
                <div class="div" style="margin-bottom: 6%;">
                    <a href="/profile/message/all" class="button is-link nounnounderlinebtn is-pulled-right">View All Messages</a>
                </div>
                @if($messages->count() > 0) 
                @foreach ($messages as $message)
                    @include('profile.messagelayout') 
                @endforeach 
                @else
                    @include('profile.noresult')
                @endif
            </div>
            {{ $messages->links() }}
    </div>
</div>