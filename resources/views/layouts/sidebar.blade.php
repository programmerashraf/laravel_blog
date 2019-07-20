<div class="col-md-12 col-lg-4 sidebar">
              <div class="sidebar-box search-form-wrap">
                <form action="{{ url("/search") }}" class="search-form">
                  <div class="form-group">
                    <span class="icon fa fa-search"></span>
                    <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter" name="s">
                  </div>
                </form>
              </div>
              <!-- END sidebar-box -->
              <div class="sidebar-box">
                <div class="bio text-center">
                  <img src="{{url($user->image)}}" alt="Image Placeholder" class="img-fluid">
                  <div class="bio-body">
                    <h2>{{ $user->name }}</h2>
                      <p>{{$user->bio}}</p>
                  </div>
                </div>
              </div>
              <!-- END sidebar-box -->

              <div class="sidebar-box">
                <h3 class="heading">Categories</h3>
                <ul class="categories">
                    @foreach($categories as $category)
                        <li><a href="{{url("category/".$category->name)}}">
                                {{ $category->name }}
                                <span>({{$category->posts->count()}})</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
              </div>
              <!-- END sidebar-box -->

              <div class="sidebar-box">
                <h3 class="heading">Tags</h3>
                <ul class="tags">
                    @foreach($tags as $tag)
                        <li>
                            <a href="{{ url("tag/".$tag->name) }}">
                            {{$tag->name}}
                            </a>
                        </li>
                    @endforeach

                </ul>
              </div>
            </div>