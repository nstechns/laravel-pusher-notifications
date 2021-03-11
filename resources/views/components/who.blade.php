@if(Auth::guard('web')->check())
<h3>Welcome Public Panel</h3>
<p class="text-success">
	You are Logged In as <strong>USER</strong>
</p>
@else
<p class="text-danger">
	You are Logged Out as <strong>USER</strong>
</p>
@endif

@if(Auth::guard('admin')->check())
<h3>Welcome Admin Panel</h3>
<p class="text-success">
	You are Logged In as <strong>Admin</strong>
</p>
@else
<p class="text-danger">
	You are Logged Out as <strong>Admin</strong>
</p>
@endif