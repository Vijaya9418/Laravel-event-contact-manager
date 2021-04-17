@extends('../layout/design')
@section('content')
<link rel="stylesheet" media="all" href="{{ asset('css/home.css') }}" type="text/css" />

<link rel="stylesheet" media="all" href="{{ asset('css/post.css') }}" type="text/css" />
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
 
<div class="back">
    <div class="imageup">

    </div>
    <form method="post" action='uploads' enctype="multipart/form-data">
        @csrf
        Select image to upload:
        <input type="file" name="filename" id="fileToUpload">
        @error('filename')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
        <input type="submit" value="Upload Image" name="submitimg">
    </form>

    <link rel="stylesheet" media="all" href="{{ asset('css/home.css') }}" type="text/css" />

    <span class="posts">
        <h4>Posts here</h4>
        <div>
            <?php
            for ($iv = 0; $iv < count($pdtitle); $iv++) {
                $check = false;
                for ($i = 0; $i < count($groups); $i++) {
                    if ($groups[$i] == $pdgroup[$iv]) {
                        $check = true;
                    }
                }
                if (!$check) {
                    echo "<form action='postfetch' method='post'>
                    ";?>@csrf<?php echo"
                    <input name='datano' hidden value='" . $iv . "'>
                    <button name='postdisplay'><div class='postcard'><span class='title'>" . $pdtitle[$iv] . "</span>
                <span class='dec'>" . substr($pddata[$iv], 0, 30) . "</span>
                <span class='auth'>Auth: " . $pdgname[$iv] . "</span>
                <span class='pgroup'>Group: " . $pdgroup[$iv] . "</span>
                <span class='pdate'>" . $pddate[$iv] . "</span></div></button>
                </form>
                ";
                }
            }
            ?>

        </div>

    </span>
</div>
@endsection