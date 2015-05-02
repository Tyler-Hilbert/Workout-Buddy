<nav id="myNavbar" class="navbar navbar-static navbar-inverse" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::route('home') }}">Weight Room</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::route('home') }}">Get Workout</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ URL::route('athlete.create') }}">Create Athlete</a></li>
                <li><a href="{{ URL::route('workout.create') }}">Add Workout</a></li>
                <li><a href="{{ URL::route('exercise.create') }}">Create Exercise</a></li>
            </ul>
        </div>
    </div>
</nav>