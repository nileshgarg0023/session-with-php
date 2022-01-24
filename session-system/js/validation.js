/***JQuery code to check existing email***/
$(function () {
    var imgarray = ["qGphJD","CAPTCHA","captcha","V3B5w3pw","Google"];
    var rimg = new Image();
    var index;
    RandomImage()
    function RandomImage()
    {
    index = Math.random();
    index = Math.floor(index*10);
    var l = imgarray.length-1;
    if(index > l) index= index%l;
    rimg.src = "http://localhost/session_handling/images/"+index+".png";
    document.vimg.src= rimg.src;
    }
    $('#capimg').click(function ()
    {
    RandomImage()
    });
    var dataValid
    $('#Logsubmit').click(validate_login);
    $('#Regsubmit').click(validate_reg);
    function check_empty(eleid,divid)
    {
    $(eleid).each(function ()
    {
    
    var cur = $(this);
    $(divid).next().remove();
    if ($.trim(cur.val()) == '')
    {
    $(divid).after('<div class="error" style="color:red">This field can not be empty</div>');
    dataValid = false;
    }
    else if(eleid == '#captcha')
    {
    check_captcha(eleid,divid)
    }
    else if(eleid == '#password' || eleid == '#cpassword' )
    {
    if($.trim(cur.val()).length < 6)
    {
    $(divid).after('<div class="error" style="color:red">Password is not in correct format</div>');
    dataValid = false;
    }
    else
    {
    if(document.getElementById("password").value != document.getElementById("cpassword").value && eleid == '#cpassword' )
    {
    $(divid).after('<div class="error" style="color:red">Password does not match</div>');
    dataValid = false;
    }
    }
    }
    });
    }
    function check_captcha(eleid,divid)
    {
    $(eleid).each(function ()
    {
    var match_t = false;
    var cur = $(this);
    $(divid).next().remove();
    for(var i=0; i<imgarray.length; i++)
    {
    if($.trim(cur.val()) == imgarray[i] && (i == index))
    {
    match_t = true;
    break;
    }
    }
    if(match_t == false)
    {
    $(divid).after('<div class="error" style="color:red">Invalid captcha entry</div>');
    dataValid = false;
    }
    });
    }
    function check_email(eleid,divid,type)
    {
    dataValid = true;
    $(eleid).each(function ()
    {
    var cur = $(this);
    $(divid).next().remove();
    if ($.trim(cur.val()) == '')
    {
    $(divid).after('<div class="error" style="color:red">This field can not be empty</div>');
    dataValid = false;
    }
    else
    {
    var emailPattern = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
    if (!emailPattern.test(cur.val()))
    {
    $(divid).after('<span class="error" style="color:red"> Invalid Email Id</span>');
    dataValid = false;
    }
    }
    if(type == 2)
    {
    $.post('http://localhost/session_handling/php/check_email.php', {'email' : cur.val()}, function(data) {
    if(data)
    {
    $(divid).after('<span class="error" style="color:red">Email already exists</span>');
    dataValid = false;
    }
    });
    }
    });
    }
    function validate_login()
    {
    dataValid = true;
    check_empty('#lpassword','#logpass')
    check_email('#lemail','#logemail',1)
    if(dataValid)
    {
    var postdata = $('#logForm').serialize();
    $.post('http://localhost/session_handling/php/login_check.php',postdata,
    function(data)
    {
    if(data == false)
    {
    alert("Invalid email or password")
    }
    else
    {
    $('#myModa2').modal('toggle');
    window.location.href = data
    }
    },
    'html'
    );
    }
    }
    function validate_reg()
    {
    dataValid = true;
    check_empty('#fname','#ele1')
    check_email('#email','#ele2',1)
    check_email('#email','#ele2',2)
    check_empty('#password','#ele3')
    check_empty('#cpassword','#ele4')
    check_empty('#captcha','#ele5')
    if(dataValid)
    {
    var postdata = $('#regForm').serialize();
    $.post('http://localhost/session_handling/php/register.php',postdata,
    function(data)
    {
    if(data)
    {
    $('#myModal1').modal('toggle');
    $('#regmsg').html("<center><h2>Registration successfully completed</h2><p>Check your email to activate your account</p></center>");
    }
    },
    'html'
    );
    }
    }
    });