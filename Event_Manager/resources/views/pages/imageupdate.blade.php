<link rel="stylesheet" media="all" href="{{ asset('css/home.css') }}" type="text/css" />

<link rel="stylesheet" media="all" href="{{ asset('css/post.css') }}" type="text/css" />


<div id='gcimg' class='gc' style='visibility:visible'>
        <form action='imgupdated' method='post'>
        @csrf
        <h3 style='color:white'><?php echo $gnimg; ?></h3>
        <h5 style='color:white'>To upload ur image go to Explore tab and upload your image with a uique name and added it here.</h5>
        <input hidden name='gpname' value='<?php echo $gnimg; ?>'>
        <input placeholder='Image name' required name='imgname'>
        @error('imgname')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
        <button name='imguploadeventf'>Submit</button>
        </form>
        <button ><a href='/'>Close</a></button>
        <script>
   
        </script>
        </div>