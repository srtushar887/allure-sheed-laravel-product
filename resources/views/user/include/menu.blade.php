<div class="myaccount-tab-menu nav" >
    <a href="{{route('home')}}" class="{{ Request::path() == 'home' ? 'active' : '' }}" >
        Dashboard</a>
    <a href="{{route('myorder')}}" class="{{ Request::path() == 'home/my-order' ? 'active' : '' }}"> My Orders</a>
    <a href="{{route('billing.address')}}" class="{{ Request::path() == 'home/billing-address' ? 'active' : '' }}">Billing Address</a>
    <a href="{{route('my.profile')}}" class="{{ Request::path() == 'home/my-profile' ? 'active' : '' }}"> Profile</a>
    <a href="{{route('change.password')}}" class="{{ Request::path() == 'home/change-password' ? 'active' : '' }}"> Change Password</a>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
