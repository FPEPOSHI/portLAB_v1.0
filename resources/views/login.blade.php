<!Doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{!! asset('js/bootstrap.min.js')!!}"></script>

    <script type="text/javascript">
        function test()
        {
            var em = document.getElementById("login-username").value;
            var pas = document.getElementById("login-password").value;
            var pas = document.getElementById("error-text").innerHTML="dicka shkoi gabim";
            document.getElementById("login-alert").style.display="block";

        }

    </script>

</head>

<body>

<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-5 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Miresevini ne portLAB</div>
                        {{--<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Harruat fjalekalimin?</a></div>--}}
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12">
                            <span id="error-text" style="margin-right:8px;"></span> 
                        </div>

                        {!! Form::open(array('class'=> 'form-horizontal',"autocomplete" => "off", 'id' => 'loginform','role' => 'form', 'route'=> 'log_user')) !!}

                        <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username"  required="required" type="text" class="form-control" name="login_usr" value="" placeholder="email ose emri perdoruesit">
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password"   required="required" type="password" class="form-control" name="login_pass" placeholder="fjalekalimi">
                                    </div>
                            <!-- <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1">Me mbaj mend
                                        </label>
                                      </div>
                                    </div> -->
                                <div style="margin-top:10px" class="form-group pull-left">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <input style="padding-left: 32px; padding-right: 32px;" id="btn-login"
                                      type="submit" class="btn btn-success" value="Hyr">
                                      <!-- <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>
                                      <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>-->

                                    </div>
                                </div>
                        {!! Form::close() !!}

                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Nuk keni nje llogari? {!! $test or "" !!}
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Regjistrohu ketu
                                        </a>
                                        </div>
                                    </div>
                                </div>    



                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Regjistrohu </div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px">
                                <span style="margin-right:8px;">Keni nje llogari?</span> 
                                <a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Hyr</a></div>
                        </div>  
                        <div class="panel-body" >
                            {!! Form::open(array('class'=> 'form-horizontal',"autocomplete" => "off","enctype"=>"multipart/form-data", 'id' => 'signupform','role' => 'form', 'route'=> 'log_user')) !!}

                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group">
                                    <label for="register_name" class="col-md-3 control-label">Emri</label>
                                    <div class="col-md-9">
                                        <input type="text"  required="required" class="form-control" name="register_name" placeholder="emri juaj">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="register_email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email"  required="required" class="form-control" name="register_email" placeholder="adresa e email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="register_photo" class="col-md-3 control-label">Foto</label>
                                    <div class="col-md-9">
                                        <input type="file"  required="required" class="form-control" name="register_photo" placeholder="foto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="register_usr" class="col-md-3 control-label">Perdorues</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="register_usr"  required="required" placeholder=" emri i perdoruesit">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="register_pass" class="col-md-3 control-label">Fjalekalimi</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="register_pass" required="required" placeholder="fjalekalimi">
                                    </div>
                                </div>
                                    
                                <!-- <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Kodi i konfirmimit</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="icode" placeholder="">
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input id="btn-signup" type="submit" class="btn btn-info " value="Regjistrohu">
                                        <!-- <span style="margin-left:8px;">or</span>   -->
                                    </div>
                                </div>
                            {!! Form::close() !!}
                                
                                <!-- <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                    </div>                                           
                                        
                                </div> -->

                         </div>
                    </div>

               
               
                
         </div> 
    </div>

</body>
</html>