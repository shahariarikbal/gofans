@extends('user.layout-web')

@section('title')
    Newsfeed - Gofans
@endsection

@section('content')
    <div class="central-meta new-pst">
        <div class="new-postbox">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @elseif(session('warning'))
                <div class="alert alert-warning" role="alert">
                    {{ session('warning') }}
                </div>
            @endif
            <figure>
                @if(auth()->user()->profile_photo!='' && file_exists('storage/images/'.auth()->user()->profile_photo))
                    <img src="{{ asset('storage/images/'.auth()->user()->profile_photo) }}" alt="{{ auth()->user()->name }}">
                @else
                    <img src="{{ asset('goweb/images/avatar.png') }}" alt="{{ auth()->user()->name }}">
                @endif
            </figure>
            <div class="newpst-input">
                <form action="{{ url('/newsfeed-publish') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <textarea rows="2" name="newsfeed_text" placeholder="write something"></textarea>
                    <input type="hidden" name="status" value="0">
                    <div class="attachments">
                        <ul>
                            <li>
                                <i class="fa fa-music"></i>
                                <label class="fileContainer">
                                    <input type="file">
                                </label>
                            </li>
                            <li>
                                <i class="fa fa-image"></i>
                                <label class="fileContainer">
                                    <input id="file-input" type="file" name="image" onchange="preview_img(event)"/>
                                </label>
                            </li>
                            <li>
                                <i class="fa fa-video-camera"></i>
                                <label class="fileContainer">
                                    <input type="file">
                                </label>
                            </li>
                            <li>
                                <i class="fa fa-camera"></i>
                                <label class="fileContainer">
                                    <input type="file">
                                </label>
                            </li>
                            <li>
                                <button type="submit" id="btnSubmit">Post</button>
                            </li>
                        </ul>
                    </div>
                </form>
                <img id="prev-img">
                <span style="color: red; margin-left: 60px;"> {{ $errors->has('newsfeed_text') ? $errors->first('newsfeed_text') : ' ' }}</span>
            </div>
        </div>
    </div><!-- add post new box -->
    @include('user.web.includes.post-edit-modal')
    <div id="app" class="loadMore">
        @foreach($newsfeed as $data)
         <div class="central-meta item">
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        @if(!empty($data->user) && $data->user->profile_photo!='' && file_exists('storage/images/'.$data->user->profile_photo))
                            <img src="{{ url('storage/images/'.$data->user->profile_photo) }}" alt="{{ isset($data->user->name) ? $data->user->name : '' }}" id="avater" style="width: 40px; height: 40px;"/>
                        @else
                            <img src="{{ asset('goweb/images/avatar.png') }}" alt="{{ !empty($data->user) ? $data->user->name : 'No user name found' }}">
                        @endif
                    </figure>

                        @if($data->user_id === auth()->user()->id)
                            <li class="dropdown pull-right" style="list-style: none; margin-top: 5px">
                                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" title="newsfeed Edit" role="button" aria-haspopup="true" aria-expanded="false">
                                </a>
                                <ul class="dropdown-menu page-list">
                                    <li class="action-post-li">
                                        <a href="#" data-toggle="modal" class="action-post" data-target="#exampleModal" data-id="{!! $data->id !!}" onclick="event.preventDefault(); editNewsfeed(this)">
                                            Edit
                                        </a>
                                    </li>
                                    <li class="action-post-li">
                                        <a href="{{ url('/newsfeed-post-delete/'.$data->id) }}" class="action-post" title="Delete post">
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <div class="friend-name user-name-width">
                            <ins><a href="{{ isset($data->user) ? url('/timeline/'.$data->user->id): '#' }}" title="" class="pull-left">{{ isset($data->user) ? $data->user->name:'' }}</a></ins>
                            <span>published: {{ date('d-m-Y - h:i A', strtotime($data->created_at)) }}</span>
                        </div>
                        <div class="post-meta">
                            @if($data->image)
                                <img src="{{ url('storage/images/'.$data->image) }}" />
                            @endif
                            <div class="description border-bottom">
                                <p>{!! substr($data->newsfeed_text, 0, 150) !!}....</p>
                            </div>
                            <div class="we-video-info we-border-bottom">
                                <ul>
                                    <li>
                                    <span class="like" data-toggle="tooltip" title="like count">
                                        <i class="fa fa-heart"></i>
                                        <small>2.2k</small>
                                    </span>
                                    </li>
                                    <li class="pull-right">
                                        <span class="comment" data-toggle="tooltip" title="Comments count">
                                            <i class="fa fa-comments-o"></i>
                                            <small>52</small>
                                        </span>
                                    </li>
                                    <li>
                                </ul>
                            </div>
                            <div class="we-video-info">
                                <ul>
                                    <li class="social-media">
                                        <div id="removeIcon" class="menu">
                                            <div class="btn trigger"><i class="fa fa-thumbs-o-up"></i></div>
                                            <div class="rotater">
                                                <div class="btn btn-icon">
                                                    <a href="#" data-toggle="tooltip" title="haha">
                                                        <img src="{{ asset('/goweb/images/emoji/haha.png') }}"/>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon">
                                                    <a href="#" data-toggle="tooltip" title="love">
                                                        <img src="{{ asset('/goweb/images/emoji/love.jpg') }}"/>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon">
                                                    <a href="#" data-toggle="tooltip" title="Sad">
                                                        <img src="{{ asset('/goweb/images/emoji/sad.png') }}"/>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon">
                                                    <a href="#" data-toggle="tooltip" title="Like">
                                                        <img src="{{ asset('/goweb/images/emoji/like.jpg') }}"/>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon">
                                                    <a href="#" data-toggle="tooltip" title="Angry">
                                                        <img src="{{ asset('/goweb/images/emoji/angry.jpg') }}"/>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon">
                                                    <a href="#" data-toggle="tooltip" title="Cry">
                                                        <img src="{{ asset('/goweb/images/emoji/cry.png') }}"/>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon">
                                                    <a href="#" data-toggle="tooltip" title="Smart">
                                                        <img src="{{ asset('/goweb/images/emoji/smart.png') }}"/>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon">
                                                    <a href="#" data-toggle="tooltip" title="wow">
                                                        <img src="{{ asset('/goweb/images/emoji/wow.png') }}"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="comment-center">
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="fa fa-comments-o"></i>
                                        <small>Comment</small>
                                    </span>
                                    </li>
                                    <li class="social-media pull-right">
                                        <div id="removeIcon" class="menu">
                                            <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="coment-area">
                                <ul class="we-comet">
                                    <li v-for="comment in allComments" v-if="comment.post_id === {{ $data->id }}" >
                                        <div class="comet-avatar">
                                            <template v-if="comment.user_avatar !== null">
                                                <img :src="'storage/images/'+comment.user_avatar" :alt="comment.user_name">
                                            </template>
                                            <template v-else>
                                                <img src="{{ asset('goweb') }}/images/avatar.png" :alt="comment.user_name">
                                            </template>
                                        </div>
                                        <div class="we-comment">
                                            <div class="coment-head">
                                                <h5><a href="{{ url('/timeline/'.$data->id) }}" title="">@{{ comment.user_name }}</a></h5>
                                                <span>@{{ comment.post_date }}</span>
                                                <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                            </div>
                                            <p v-text="comment.body"></p>
                                        </div>
                                    </li>
                                    {{--<li>
                                        <a href="#" title="" class="showmore underline">more comments</a>
                                    </li>--}}
                                    <li class="post-comment">
                                        <div class="comet-avatar">
                                            @if(auth()->user()->profile_photo!='' && file_exists('storage/images/'.auth()->user()->profile_photo))
                                                <img src="{{ asset('storage/images/'.auth()->user()->profile_photo) }}" alt="{{ auth()->user()->name }}">
                                            @else
                                                <img src="{{ asset('goweb/images/avatar.png') }}" alt="{{ auth()->user()->name }}">
                                            @endif
                                        </div>
                                        <div class="post-comt-box">
                                            <form v-on:submit.prevent="commentStore({{ $data->id }})" >
                                                <textarea v-model="comments" placeholder="Post your comment" name="body"></textarea>
                                                <button type="submit" style="padding-bottom: 15px; color: #0b0b0b">Post</button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

@section('page_js')
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/vue.resource.js') }}"></script>
    <script type="text/javascript">
        var app = new Vue({
            el: '#app',
            data: {
                comments : null,
                allComments: [],
            },

            mounted() {
                this.getComments();
            },
            created() {
            },

            methods: {
                commentStore(postId){
                    let _this = this;
                    var newComments = {
                        _token: "{{ csrf_token() }}",
                        post_id: postId,
                        body: _this.comments,
                    }

                    this.$http.post("{{ route('user.commentStore') }}", newComments).then(function (resp) {
                        if (resp.data.status === 200){
                            setTimeout(function(){
                                _this.comments = null;
                                _this.getComments();
                                toastr.success(resp.data.message, 'Successfully.. !!', {
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut",
                                    "progressBar": true,
                                    timeOut: 3000
                                });
                            }, 500);
                        }else{
                            setTimeout(function(){
                                toastr.error("The comment field is required.", 'Error.. !!', {
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut",
                                    "progressBar": true,
                                    timeOut: 3000
                                });
                            }, 500);
                        }
                    }).catch(function (resp) {
                        setTimeout(function(){
                            toastr.warning("Your api not working", 'Warning.. !!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true,
                                timeOut: 3000
                            });
                        }, 500);
                    });
                },

                getComments(){
                    let _this = this;
                    this.$http.get("{{ route('user.getComments') }}").then(function (resp) {
                        if (resp.data.status === 200){
                            console.log(_this.allComments = resp.data.comments)
                            _this.allComments = resp.data.comments;
                        }
                    }).catch(function (resp) {
                        setTimeout(function(){
                            toastr.warning("Your api not working", 'Warning.. !!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true,
                                timeOut: 3000
                            });
                        }, 500);
                    });
                }
            },

        });
    </script>

    <script>
        function preview_img(event)
        {
            if(event.target.files[0])
            {
                let reader = new FileReader();
                reader.onload = function ()
                {
                    let output = document.getElementById('prev-img');
                    output.src = reader.result;
                    output.style.display = "block";
                    output.style.width = "25%";
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        }



        $(".menu").on("click", function(event) {
            event.stopPropagation();
        });

        $(document).on("click", function(event) {
            $("#removeIcon").removeClass("active");
        });

        function edit_preview_img(event)
        {
            if(event.target.files[0])
            {
                let reader = new FileReader();
                reader.onload = function ()
                {
                    let output = document.getElementById('edit_img');
                    output.src = reader.result;
                    output.style.display = "block";
                    output.style.width = "25%";
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        }

        function editNewsfeed(el)
        {
            axios.get('/newsfeed/edit/'+el.getAttribute('data-id'))
                .then(function (response) {
                    //console.log(response)
                    document.getElementById('newsfeedId').value = el.getAttribute('data-id');
                    document.getElementById('newsfeed_text').value = response.data.newsfeed_text;
                    document.getElementById('status').value = response.data.status;

                    if(response.data.image) {
                        $("#edit_img").attr("src", "{{ asset('storage/images') }}/" + response.data.image)
                    }
                    else {
                        $("#edit_img").attr("src", "{{ asset('storage/images') }}/default.png")
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    </script>
@endsection
