@extends('layouts.app')

<?php use App\Models\Contents; use App\Models\Banners; ?>

@section('content')
<div class="container">
    <div id="user_messages"></div>

    <h1>Admin Dashboard</h1>
    <h2>Welcome, {{ auth()->user()->name }}</h2>


    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="card mt-4">
                <div class="card-header greenheader"><strong class="text-white">Bio Page</strong></div>
                <div class="card-body whitecard">
                    <p>Edit the text for the Bio page</p>
                    <p>Once completed, click save to store any changes in the database.</p>
                </div>
                <div class="card-footer">
                    <a href="#" 
                       title="" 
                       aria-label="" 
                       class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button" 
                       data-bs-toggle="modal" 
                       data-bs-target="#Bio">
                        Edit Bio Page
                    </a>
                    <a href="#" 
                       title="" 
                       aria-label="" 
                       class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button d-inline float-end" 
                       data-bs-toggle="modal" 
                       data-bs-target="#EditBannerImage1">
                        Edit Banner Image
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="card mt-4">
                <div class="card-header greenheader"><strong class="text-white">Tuition Page</strong></div>
                <div class="card-body whitecard">
                    <p>Edit the text for the Tuition page</p>
                    <p>Once completed, click save to store any changes in the database.</p>
                </div>
                <div class="card-footer">
                    <a href="#" 
                       title="" 
                       aria-label="" 
                       class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button" 
                       data-bs-toggle="modal" 
                       data-bs-target="#Tuition">
                        Edit Tuition Page
                    </a>
                    <a href="#" 
                       title="" 
                       aria-label="" 
                       class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button d-inline float-end" 
                       data-bs-toggle="modal" 
                       data-bs-target="#EditBannerImage2">
                        Edit Banner Image
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="card mt-4">
                <div class="card-header greenheader"><strong class="text-white">Contact Page</strong></div>
                <div class="card-body whitecard">
                    <p>Edit the text for the Contact page</p>
                    <p>Once completed, click save to store any changes in the database.</p>
                </div>
                <div class="card-footer">
                    <a href="#" 
                       title="" 
                       aria-label="" 
                       class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button" 
                       data-bs-toggle="modal" 
                       data-bs-target="#Contact">
                        Edit Contact Page
                    </a>
                    <a href="#" 
                       title="" 
                       aria-label="" 
                       class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button d-inline float-end" 
                       data-bs-toggle="modal" 
                       data-bs-target="#EditBannerImage3">
                        Edit Banner Image
                    </a>
                </div>
            </div>
        </div>
    <div>
    <div class="col-sm-12">
        <div class="card mt-4">
                <div class="card-header greenheader"><strong class="text-white">Admin Registration</strong></div>
                <div class="card-body whitecard">
                    <p>Register a new administration user.</p>
                    <p>Please note that all admin users share the same privileges, including the ability to manage the site's text content and add new admin users.</p>
                </div>
                <div class="card-footer">
                    <a href="/register" 
                       title="" 
                       aria-label="" 
                       class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button">
                        Register a new administrator
                    </a>
                </div>
            </div>
        </div>



        <h1 class="m-4">Added video links</h1>
<!-- <div class="container"> -->
<div class="row px-4">
<div class="col-sm-12 text-center">
    <a href="#" 
        title="" 
        aria-label="" 
        class="btn btn-primary btn-lg px-4 py-2 rounded-3 shadow-sm hover-button" 
        data-bs-toggle="modal" 
        data-bs-target="#AddVideo">
        <i class="fa fa-video fa-lg"></i> Add a new video
    </a>
    
    <br><hr>
</div>
@if(count($my_videos)>0)
@foreach($my_videos as $v)
<div class="col-sm-12 col-md-4 mt-4">
    <div class="card bg-white">
    <div class="card-header greenheader">
        <p class="card-title text-center">
            @if(strlen($v->title)>60)
                <strong class="text-white">{{substr($v->title,0,60)}}..</strong>
            @else 
                <strong class="text-white">{{$v->title}}</strong>
            @endif
        </p>
    </div>
    <div class="card-body text-center">
        <iframe src="{{$v->video_index}}" width="100%"></iframe>
    </div>
    <div class="card-footer">
        @if($v->deleted_at == null)
            Added: {{$v->created_at->diffForHumans()}}<br>
            <a href="#" 
                title="" 
                aria-label="" 
                class="btn btn-success btn-sm px-2 rounded-3 shadow-sm" 
                data-bs-toggle="modal" 
                data-bs-target="#EditVideo"
                data-id="{{ $v->id }}"
                data-title="{{ $v->title }}"
                data-description="{{ $v->video_index }}">
                Edit
            </a>
            <a href="{{route('softdelete.video', $v->id)}}" class="btn btn-danger btn-sm px-2 rounded-3 shadow-sm d-inline float-end"> Delete </a>
            <!-- <a href="#" 
                class="btn btn-success btn-sm py-2 rounded-3 shadow-sm" 
                data-bs-toggle="modal" 
                data-bs-target="#DeleteVideo"
                data-id="{{ $v->id }}">
                Edit
            </a> -->
        @else 
            Deleted: {{$v->deleted_at->diffForHumans()}}<br>
            <a href="{{route('restore.video', $v->id)}}" class="btn btn-primary btn-sm d-inline float-end"> Restore </a>
        @endif
    </div>
    </div>
</div>
@endforeach
@else 
    <h3 class="card p-2">No videos have been added yet.</h3>
@endif
</div>

</div>


<!-- MODALS HERE --> 
<div class="modal fade" data-bs-backdrop="false" tabindex="-1" role="dialogue" id="Bio">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-body">
        <button type="button" id="dismiss_cinema" class="close pull-right" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          <div class="row mb-4">
              <div class="col-sm-12">
                  <br>
                  <div>
                  <?php $data = Contents::where('id', 1)->get(); ?>
                    <h1 class="m-4">Edit Bio page contents</h1>
                    <br>
                    <div class="container">
                        <div id="user_messages"></div>
                        @if(count($data)>0)
                        @foreach($data as $d)
                        <div class="col-xs-12 card p-4"> 
                            <div>    
                                <br>             
                                <button class="tc" onclick="execCmd('bold');" title="Bold"><i class="fa fa-bold fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('italic');" title="Italic"><i class="fa fa-italic fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('underline');" title="Underline"><i class="fa fa-underline fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('strikeThrough');" title="Strikethrough"><i class="fa fa-strikethrough fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('justifyLeft');" title="Justify Left"><i class="fa fa-align-left fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('justifyCenter');" title="Justify Centre"><i class="fa fa-align-center fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('justifyRight');" title="Justify Right"><i class="fa fa-align-right fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('cut');" title="Cut"><i class="fa fa-cut fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('copy');" title="Copy"><i class="fa fa-copy fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('paste');" title="Paste"><i class="fa fa-paste fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('indent');" title="Increase Indent"><i class="fa fa-indent fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('outdent');" title="Decrease Indent"><i class="fa fa-dedent fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('insertUnorderedList');" title="Bullet List"><i class="fa fa-list-ul fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('insertOrderedList');" title="Numbered List"><i class="fa fa-list-ol fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('insertParagraph');" title="Insert Paragraph"><i class="fa fa-paragraph fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('undo');" title="Undo"><i class="fa fa-undo fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('redo');" title="Redo"><i class="fa fa-repeat fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('insertHorizontalRule');" title="Horizontal Rule">HR</button>
                                <button class="tc" onclick="execCmdArg('fontSize', '7');" title="Large Text"><b>L</b></button>
                                <button class="tc" onclick="execCmdArg('fontSize', '6');" title="Medium Text"><b>M</b></button>
                                <button class="tc" onclick="execCmdArg('fontSize', '4');" title="Small text"><b>S</b></button>
                               <button class="tc" onclick="execCmdArg('createLink', prompt('Enter a URL', 'http://'));" title="Create Link"><i class="fa fa-link"></i></button>
                                <button class="tc" onclick="execCmd('unLink');" title="Unlink"><i class="fa fa-unlink"></i></button>
                                <select onchange="execCmdArg('fontName', this.value);">
                                    <option value="Arial"> Arial </option>
                                    <option value="Comic Sans MS"> Comic Sans MS </option>
                                    <option value="Courier"> Courier </option>
                                    <option value="Georgia"> Georgia </option>
                                    <option value="Tahoma"> Tahoma </option>
                                    <option value="Times New Roman"> Times New Roman </option>
                                    <option value="Verdana"> Verdana </option>
                                </select>
                                <button class="tc" onclick="execCmdArg('insertHTML', '<table class=\'table\'><tbody><tr><td style=\'width: 50%; max-width: 50%; word-break: break-word;\' border=1>Column 1</td><td style=\'width: 50%; max-width: 50%; word-break: break-word;\' style=border: solid 1px #ddd;>Column 2</td></tr></tbody></table>');" title="Insert Table"><i class="fa fa-table fa-lg"></i></button>
                                <br><br>
                                <br>
                                <small>Contents:</small><hr>
                                <div class="art_cnt1" contenteditable><?php echo html_entity_decode($d->content); ?></div>
                                <br>
                                <button onclick="saveToDB1(1)" class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button" data-bs-dismiss="modal" style="width: 150px;"> <i class="fa fa-save fa-lg"></i> Save </button>
                                <br>
                            </div>
                        </div>
                        @endforeach
                        @endif



                    </div>
                    <br><br>
                    <script>
                        function execCmd(command){
                            document.execCommand(command, false, null);
                        }
                        function execCmdArg(command, arg){
                            document.execCommand(command, false, arg);
                        }

                        function saveToDB1(id1){
                            var content1 = $('.art_cnt1').html(); 
                            var aid = id1;
                            var url1 = '/admin/update_contents/'+aid;
                                $.ajax({
                                    url: url1,
                                    type: "POST",
                                    data: {
                                    "_token": "{{ csrf_token() }}",
                                    "content1": content1,
                                    },              
                                    success:function (data) {
                                        //Display Confirmation to user
                                        document.getElementById("user_messages").innerHTML = "Saved Successfully";
                                        window.setTimeout(function(){
                                        window.location.href = "/admin";
                                        }, 1000);
                                    }, error: function (data){
                                        console.log(data);
                                    }
                                });   
                        };        
                    </script>
                    </div></div>
                  </div>
              </div>
              </div>
          </div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" data-bs-backdrop="false" tabindex="-1" role="dialogue" id="Tuition">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-body">
        <button type="button" id="dismiss_cinema" class="close pull-right" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          <div class="row mb-4">
              <div class="col-sm-12">
                  <br>
                  <div>
                  <?php $data = Contents::where('id', 2)->get(); ?>
                    <h1 class="m-4">Edit Tuition page contents</h1>
                    <br>
                    <div class="container">
                        <div id="user_messages"></div>
                        @if(count($data)>0)
                        @foreach($data as $d)
                        <div class="col-xs-12 card p-4"> 
                            <div>    
                                <br>             
                                <button class="tc" onclick="execCmd('bold');" title="Bold"><i class="fa fa-bold fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('italic');" title="Italic"><i class="fa fa-italic fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('underline');" title="Underline"><i class="fa fa-underline fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('strikeThrough');" title="Strikethrough"><i class="fa fa-strikethrough fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('justifyLeft');" title="Justify Left"><i class="fa fa-align-left fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('justifyCenter');" title="Justify Centre"><i class="fa fa-align-center fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('justifyRight');" title="Justify Right"><i class="fa fa-align-right fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('cut');" title="Cut"><i class="fa fa-cut fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('copy');" title="Copy"><i class="fa fa-copy fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('paste');" title="Paste"><i class="fa fa-paste fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('indent');" title="Increase Indent"><i class="fa fa-indent fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('outdent');" title="Decrease Indent"><i class="fa fa-dedent fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('insertUnorderedList');" title="Bullet List"><i class="fa fa-list-ul fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('insertOrderedList');" title="Numbered List"><i class="fa fa-list-ol fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('insertParagraph');" title="Insert Paragraph"><i class="fa fa-paragraph fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('undo');" title="Undo"><i class="fa fa-undo fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('redo');" title="Redo"><i class="fa fa-repeat fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('insertHorizontalRule');" title="Horizontal Rule">HR</button>
                                <button class="tc" onclick="execCmdArg('fontSize', '7');" title="Large Text"><b>L</b></button>
                                <button class="tc" onclick="execCmdArg('fontSize', '6');" title="Medium Text"><b>M</b></button>
                                <button class="tc" onclick="execCmdArg('fontSize', '4');" title="Small text"><b>S</b></button>
                               <button class="tc" onclick="execCmdArg('createLink', prompt('Enter a URL', 'http://'));" title="Create Link"><i class="fa fa-link"></i></button>
                                <button class="tc" onclick="execCmd('unLink');" title="Unlink"><i class="fa fa-unlink"></i></button>
                                <select onchange="execCmdArg('fontName', this.value);">
                                    <option value="Arial"> Arial </option>
                                    <option value="Comic Sans MS"> Comic Sans MS </option>
                                    <option value="Courier"> Courier </option>
                                    <option value="Georgia"> Georgia </option>
                                    <option value="Tahoma"> Tahoma </option>
                                    <option value="Times New Roman"> Times New Roman </option>
                                    <option value="Verdana"> Verdana </option>
                                </select>
                                <button class="tc" onclick="execCmdArg('insertHTML', '<table class=\'table\'><tbody><tr><td style=\'width: 50%; max-width: 50%; word-break: break-word;\' border=1>Column 1</td><td style=\'width: 50%; max-width: 50%; word-break: break-word;\' style=border: solid 1px #ddd;>Column 2</td></tr></tbody></table>');" title="Insert Table"><i class="fa fa-table fa-lg"></i></button>
                                <br><br>
                                <br>
                                <small>Contents:</small><hr>
                                <div class="art_cnt2" contenteditable><?php echo html_entity_decode($d->content); ?></div>
                                <br>
                                <button onclick="saveToDB2(2)" class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button" data-bs-dismiss="modal" style="width: 150px;"> <i class="fa fa-save fa-lg"></i> Save </button>
                                <br>
                            </div>
                        </div>
                        @endforeach
                        @endif



                    </div>
                    <br><br>
                    <script>
                        function execCmd(command){
                            document.execCommand(command, false, null);
                        }
                        function execCmdArg(command, arg){
                            document.execCommand(command, false, arg);
                        }

                        function saveToDB2(id2){
                            var content2 = $('.art_cnt2').html(); 
                            var url2 = '/admin/update_contents/2';
                                $.ajax({
                                    url: url2,
                                    type: "POST",
                                    data: {
                                    "_token": "{{ csrf_token() }}",
                                    "content1": content2,
                                    },              
                                    success:function (data) {
                                        //Display Confirmation to user
                                        document.getElementById("user_messages").innerHTML = "Saved Successfully";
                                        window.setTimeout(function(){
                                        window.location.href = "/admin";
                                        }, 1000);
                                    }, error: function (data){
                                        console.log(data);
                                    }
                                });   
                        };        
                    </script>
                    </div></div>
                  </div>
              </div>
              </div>
          </div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" data-bs-backdrop="false" tabindex="-1" role="dialogue" id="Contact">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-body">
        <button type="button" id="dismiss_cinema" class="close pull-right" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          <div class="row mb-4">
              <div class="col-sm-12">
                  <br>
                  <div>
                  <?php $data = Contents::where('id', 3)->get(); ?>
                    <h1 class="m-4">Edit Contact page contents</h1>
                    <br>
                    <div class="container">
                        <div id="user_messages"></div>
                        @if(count($data)>0)
                        @foreach($data as $d)
                        <div class="col-xs-12 card p-4"> 
                            <div>    
                                <br>             
                                <button class="tc" onclick="execCmd('bold');" title="Bold"><i class="fa fa-bold fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('italic');" title="Italic"><i class="fa fa-italic fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('underline');" title="Underline"><i class="fa fa-underline fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('strikeThrough');" title="Strikethrough"><i class="fa fa-strikethrough fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('justifyLeft');" title="Justify Left"><i class="fa fa-align-left fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('justifyCenter');" title="Justify Centre"><i class="fa fa-align-center fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('justifyRight');" title="Justify Right"><i class="fa fa-align-right fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('cut');" title="Cut"><i class="fa fa-cut fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('copy');" title="Copy"><i class="fa fa-copy fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('paste');" title="Paste"><i class="fa fa-paste fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('indent');" title="Increase Indent"><i class="fa fa-indent fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('outdent');" title="Decrease Indent"><i class="fa fa-dedent fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('insertUnorderedList');" title="Bullet List"><i class="fa fa-list-ul fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('insertOrderedList');" title="Numbered List"><i class="fa fa-list-ol fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('insertParagraph');" title="Insert Paragraph"><i class="fa fa-paragraph fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('undo');" title="Undo"><i class="fa fa-undo fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('redo');" title="Redo"><i class="fa fa-repeat fa-lg"></i></button>
                                <button class="tc" onclick="execCmd('insertHorizontalRule');" title="Horizontal Rule">HR</button>
                                <button class="tc" onclick="execCmdArg('fontSize', '7');" title="Large Text"><b>L</b></button>
                                <button class="tc" onclick="execCmdArg('fontSize', '6');" title="Medium Text"><b>M</b></button>
                                <button class="tc" onclick="execCmdArg('fontSize', '4');" title="Small text"><b>S</b></button>
                               <button class="tc" onclick="execCmdArg('createLink', prompt('Enter a URL', 'http://'));" title="Create Link"><i class="fa fa-link"></i></button>
                                <button class="tc" onclick="execCmd('unLink');" title="Unlink"><i class="fa fa-unlink"></i></button>
                                <select onchange="execCmdArg('fontName', this.value);">
                                    <option value="Arial"> Arial </option>
                                    <option value="Comic Sans MS"> Comic Sans MS </option>
                                    <option value="Courier"> Courier </option>
                                    <option value="Georgia"> Georgia </option>
                                    <option value="Tahoma"> Tahoma </option>
                                    <option value="Times New Roman"> Times New Roman </option>
                                    <option value="Verdana"> Verdana </option>
                                </select>
                                <button class="tc" onclick="execCmdArg('insertHTML', '<table class=\'table\'><tbody><tr><td style=\'width: 50%; max-width: 50%; word-break: break-word;\' border=1>Column 1</td><td style=\'width: 50%; max-width: 50%; word-break: break-word;\' style=border: solid 1px #ddd;>Column 2</td></tr></tbody></table>');" title="Insert Table"><i class="fa fa-table fa-lg"></i></button>
                                <br><br>
                                <br>
                                <small>Contents:</small><hr>
                                <div class="art_cnt3" contenteditable><?php echo html_entity_decode($d->content); ?></div>
                                <br>
                                <button onclick="saveToDB3(3)" class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button" data-bs-dismiss="modal" style="width: 150px;"> <i class="fa fa-save fa-lg"></i> Save </button>
                                <br>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <br><br>
                    <script>
                        function execCmd(command){
                            document.execCommand(command, false, null);
                        }
                        function execCmdArg(command, arg){
                            document.execCommand(command, false, arg);
                        }
                        function saveToDB3(id3){
                            var content3 = $('.art_cnt3').html(); 
                            var url3 = '/admin/update_contents/3';
                                $.ajax({
                                    url: url3,
                                    type: "POST",
                                    data: {
                                    "_token": "{{ csrf_token() }}",
                                    "content1": content3,
                                    },              
                                    success:function (data) {
                                        //Display Confirmation to user
                                        document.getElementById("user_messages").innerHTML = "Saved Successfully";

                                        window.setTimeout(function(){
                                        window.location.href = "/admin";
                                        }, 1000);
                                    }, error: function (data){
                                        console.log(data);
                                    }
                                });   
                        };        
                    </script>
                    </div></div>
                  </div>
              </div>
              </div>
          </div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" data-bs-backdrop="false" tabindex="-1" role="dialogue" id="AddVideo">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-body">
        <button type="button" id="dismiss_cinema" class="close pull-right" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          <div class="row mb-4">
              <div class="col-sm-12">
                  <br>
                  <div>
                    <h1 class="m-4">Add a new YouTube video link</h1>
                    <div class="container">
                        <hr>
                        <div class="card p-4 greenheader">
                            <div class="row">

                            <strong>All fields are required</strong><br>

                            <form action="{{ route('add.video')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-12 mt-4">
                                        <label class="fw-bold"> Paste YouTube Video ID (ONLY): </label><br>
                                        <input type="text" class="form-control" name="video_index" required> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 mt-4">
                                        <label class="fw-bold"> Video title: </label>
                                        <input type="text" class="form-control" placeholder="Max 200 Characters - Alphanumeric Characters Only" name="title" maxlength="200" required> 
                                    </div> 
                                </div>
                                <br>
                                <button class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button" type="submit">
                                    <i class="fa fa-video fa-lg"></i> Embed Video
                                </button> 
                            </form>
                        </div>
                    </div>

                    </div>
                    </div>
                    <br>
                    </div>
                    </div>
                  </div>
              </div>
              </div>
          </div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" data-bs-backdrop="false" tabindex="-1" role="dialogue" id="EditVideo">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-body">
        <button type="button" id="dismiss_cinema" class="close pull-right" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          <div class="row mb-4">
              <div class="col-sm-12">
                  <br>
                  <div>
                    <h1 class="m-4">Edit YouTube video link</h1>
                    <div class="container">
                        <hr>
                        <div class="card p-4 greenheader">
                            <div class="row">

                            <strong>All fields are required</strong><br>

                            @method('POST')
                                <form action="{{ route('update.video')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" id="video_id" name="video_id" value="">
                                <div class="row">
                                    <div class="col-sm-12 mt-4">
                                        <label class="fw-bold"> Edit the YouTube Video ID (ONLY): </label><br>
                                        <input type="text" class="form-control" name="video_index"  id="videoDescription" required> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 mt-4">
                                        <label class="fw-bold"> Video title: </label>
                                        <input type="text" class="form-control" placeholder="Max 200 Characters - Alphanumeric Characters Only" name="title" maxlength="200"  id="videoTitle" required> 
                                    </div> 
                                </div>
                                <br>

                                <input type="hidden" name="vid" id="vid">

                                <button class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button" type="submit">
                                    <i class="fa fa-video fa-lg"></i> Update Video
                                </button> 
                            </form>
                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    const editModal = document.getElementById('EditVideo');

                                    editModal.addEventListener('show.bs.modal', function (event) {
                                        const button = event.relatedTarget;
                                        const videoId = button.getAttribute('data-id');
                                        const title = button.getAttribute('data-title');
                                        const description = button.getAttribute('data-description');

                                        // Populate form fields
                                        document.getElementById('video_id').value = videoId;
                                        document.getElementById('videoTitle').value = title;
                                        document.getElementById('videoDescription').value = description;
                                    });
                                });
                            </script>
                        </div>
                    </div>

                    </div>
                    </div>
                    <br>
                    </div>
                    </div>
                  </div>
              </div>
              </div>
          </div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" data-bs-backdrop="false" tabindex="-1" role="dialogue" id="EditBannerImage1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-body">
        <button type="button" id="dismiss_cinema" class="close pull-right" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          <div class="row mb-4">
              <div class="col-sm-12">
                  <br>
                  <div>
                    <h1 class="m-4">Edit your banner image for the Bio page</h1>
                    <div class="container">
                        <hr>
                        <div class="card p-4 greenheader">
                            <div class="row">
                            <?php $banner_image = Banners::where('id', 1)->get(); ?>
                            <strong>All fields are required</strong><br>
                            @if(count($banner_image)>0)
                            @foreach($banner_image as $im)
                            <form action="{{ route('update.image')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="1">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 mt-4">
                                        CURRENT IMAGE: {{$im->image_name}} 
                                        <br>
                                        <img src="{{ asset('images/' . $im->image_name) }}" style="width: 100%;"/>

                                    </div>            
                                    
                                    <div class="col-sm-12 col-md-6 mt-4">
                                        <label class="fw-bold"> Choose image: </label><br>
                                        <small class="fw-bold">(jpg, jpeg or png format recommended)</small>
                                        <input type="file" class="form-control" name="image_name"> 
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 mt-4">
                                        <label class="fw-bold">Alternative image text: </label>
                                        <input type="text" class="form-control" placeholder="Max 200 Characters - Alphanumeric Characters Only" name="alt" maxlength="200" value="{{$im->alt}}" required> 
                                    </div>
                                </div>
                                
                                <br>
                                <button class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button" type="submit">
                                    <i class="fa fa-image fa-lg"></i> Update Image
                                </button> 
                            </form>
                            @endforeach
                            @endif
                            





                        </div>
                    </div>

                    </div>
                    </div>
                    <br>
                    </div>
                    </div>
                  </div>
              </div>
              </div>
          </div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" data-bs-backdrop="false" tabindex="-1" role="dialogue" id="EditBannerImage2">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-body">
        <button type="button" id="dismiss_cinema" class="close pull-right" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          <div class="row mb-4">
              <div class="col-sm-12">
                  <br>
                  <div>
                    <h1 class="m-4">Edit your banner image for the Tuition page</h1>
                    <div class="container">
                        <hr>
                        <div class="card p-4 greenheader">
                            <div class="row">
                            <?php $banner_image = Banners::where('id', 2)->get(); ?>
                            <strong>All fields are required</strong><br>
                            @if(count($banner_image)>0)
                            @foreach($banner_image as $im)
                            <form action="{{ route('update.image')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="2">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 mt-4">
                                        CURRENT IMAGE: {{$im->image_name}} 
                                        <br>
                                        <img src="{{ asset('images/' . $im->image_name) }}" style="width: 100%;" />
                                    </div>            
                                    
                                    <div class="col-sm-12 col-md-6 mt-4">
                                        <label class="fw-bold"> Choose image: </label><br>
                                        <small class="fw-bold">(jpg, jpeg or png format recommended)</small>
                                        <input type="file" class="form-control" name="image_name"> 
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 mt-4">
                                        <label class="fw-bold">Alternative image text: </label>
                                        <input type="text" class="form-control" placeholder="Max 200 Characters - Alphanumeric Characters Only" name="alt" maxlength="200" value="{{$im->alt}}" required> 
                                    </div>
                                </div>
                                
                                <br>
                                <button class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button" type="submit">
                                    <i class="fa fa-image fa-lg"></i> Update Image
                                </button> 
                            </form>
                            @endforeach
                            @endif
                            





                        </div>
                    </div>

                    </div>
                    </div>
                    <br>
                    </div>
                    </div>
                  </div>
              </div>
              </div>
          </div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" data-bs-backdrop="false" tabindex="-1" role="dialogue" id="EditBannerImage3">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-body">
        <button type="button" id="dismiss_cinema" class="close pull-right" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          <div class="row mb-4">
              <div class="col-sm-12">
                  <br>
                  <div>
                    <h1 class="m-4">Edit your banner image for the Contact page</h1>
                    <div class="container">
                        <hr>
                        <div class="card p-4 greenheader">
                            <div class="row">
                            <?php $banner_image = Banners::where('id', 3)->get(); ?>
                            <strong>All fields are required</strong><br>
                            @if(count($banner_image)>0)
                            @foreach($banner_image as $im)
                            <form action="{{ route('update.image')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="3">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 mt-4">
                                        CURRENT IMAGE: {{$im->image_name}} 
                                        <br>
                                        <img src="{{ asset('images/' . $im->image_name) }}" style="width: 100%;" />
                                    </div>            
                                    
                                    <div class="col-sm-12 col-md-6 mt-4">
                                        <label class="fw-bold"> Choose image: </label><br>
                                        <small class="fw-bold">(jpg, jpeg or png format recommended)</small>
                                        <input type="file" class="form-control" name="image_name"> 
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 mt-4">
                                        <label class="fw-bold">Alternative image text: </label>
                                        <input type="text" class="form-control" placeholder="Max 200 Characters - Alphanumeric Characters Only" name="alt" maxlength="200" value="{{$im->alt}}" required> 
                                    </div>
                                </div>
                                
                                <br>
                                <button class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button" type="submit">
                                    <i class="fa fa-image fa-lg"></i> Update Image
                                </button> 
                            </form>
                            @endforeach
                            @endif
                            





                        </div>
                    </div>

                    </div>
                    </div>
                    <br>
                    </div>
                    </div>
                  </div>
              </div>
              </div>
          </div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->






@endsection
