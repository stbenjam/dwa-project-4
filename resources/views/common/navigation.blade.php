<nav class="navbar navbar-dark bg-primary navbar-expand-lg ">
    <a class="navbar-brand" href="/">Reward Maximizer</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link {{ ($navbar_location == "root") ? "active" : "" }}" href="/">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link {{ ($navbar_location == "credit_cards") ? "active" : "" }}" href="/credit_cards">Credit Cards</a>
            <a class="nav-item nav-link {{ ($navbar_location == "categories") ? "active" : "" }}" href="/categories">Categories</a>
        </div>

        <div class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
            <a href="http://github.com/stbenjam/dwa-project-4/" class="nav-link"><i class="fa fa-github fa-2x"></i></a> 
        </div>
    </div>
</nav>
