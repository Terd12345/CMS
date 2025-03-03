<!DOCTYPE html>
<html>
<head>
    <title>Enroll Now</title>
</head>
<body>

    <h1>Enroll Now</h1>
        <p>Welcome to the enrollment page, {{ Auth::user()->name }}.</p>

        <h3>This page is under construction. coming soon....</h3>
  
    <form action="{{ route('student.logout') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <button type="submit">Logout</button>
    </form>
    
</body>
</html>
