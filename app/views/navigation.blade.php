<nav id="myNavbar" class="navbar navbar-static-top navbar-inverse" role="navigation">
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
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::route('home') }}">Get Workout</a></li>
            </ul>
            <div class="container">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ URL::route('athlete.create') }}">Athletes</a></li>
                    <li><a href="{{ URL::route('workout.create') }}">Record Results</a></li>
                    <li><a href="{{ URL::route('exercise.create') }}">Create Exercise</a></li>
                    <li><a href="{{ URL::route('timed_exercise.create') }}">Timed Exercise</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>