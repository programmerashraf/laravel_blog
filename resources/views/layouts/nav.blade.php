<nav class="navbar navbar-expand-md  navbar-light bg-light">
          <div class="container">
            
           
            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="{{url("/")}}">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown05">
                    @foreach($categories as $category)
                    <a class="dropdown-item" href="{{url("category/".$category->name)}}">{{ $category->name }}</a>
                    @endforeach
                  </div>

                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url("/about")}}">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url("/contact")}}">Contact</a>
                </li>
              </ul>
              
            </div>
          </div>
        </nav>