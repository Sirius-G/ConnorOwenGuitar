@extends('layouts.app2')

@section('content')
<div class="logocontainer">
    <img src="images/logofull.png" class="logo">
</div>
<div id="progress-bar-container">
    <div id="progress-bar"></div>
</div>

<script>
    const progressBar = document.getElementById("progress-bar");

    // Kick off animation shortly after page load
    window.onload = () => {
      progressBar.style.width = "100%";

      // Start fade-out just before redirect
      setTimeout(() => {
        document.body.classList.add("fade-out");
      }, 2500); // allow full bar to show

      // Redirect after fade
      setTimeout(() => {
        window.location.href = "/home";
      }, 3000); // total duration = 3 seconds
    };
  </script>

@endsection