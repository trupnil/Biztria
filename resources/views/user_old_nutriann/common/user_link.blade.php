<li class="list-group-item" style="{{ Request::segment(3) === 'dashboard' ? 'background-color:#ece9e9;' : '' }}">
      <a href="{{route('user-dashboard')}}"  >Dashboard</a> 
      </li>
      <li class="list-group-item" style="{{ Request::segment(2) === 'user-profile' ? 'background-color:#ece9e9;' : '' }}">
      <a href="{{route('user-profile')}}">Account details</a></li>
      <li class="list-group-item" style="{{ Request::segment(3) === 'orders' ? 'background-color:#ece9e9;' : '' }}">
      <a href="{{route('user-orders')}}">My Orders</a></li>
      <li class="list-group-item" style="{{ Request::segment(1) === 'rewards-point' ? 'background-color:#ece9e9;' : '' }}">
      <a href="{{route('user-reward')}}">Rewards Points</a></li>
      <li class="list-group-item" >
      <a href="{{route('user-logout')}}">Logout</a></li>