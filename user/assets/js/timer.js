$(document).ready( function(){
    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

    document.cookie = "submitFlag=zero;"
    var startTimer = readCookie('startTimer');
    if(startTimer == 'one'){
        var y = setInterval( function () {
            $.ajax({
                url:  "../user/templates/timer_response",
                method: "GET",
                success: function (data) {
                    $('#desktopTimer').html(data);
                    $('#mobileTimer').html(data);
                    // console.log(data);
                    var time = data.toString().replace(/:/g, ''); // results in 'b'
                    // console.log(time);
                    if(time == 0000){
                        $('#desktopTimer').css('background','-webkit-linear-gradient(#eb3349, #f45c43)');
                        $('#desktopTimer').css('-webkit-background-clip','text');
                        $('#desktopTimer').css('-webkit-text-fill-color','transparent');
                        // $numAttemptedQues = questionAttempted.length;
                        // $taggedQuestion = taggedQuestion.length;
                        $time = $('#mobileTimer').text();
                        $TotalQuestion = $('#unAT').text();
                        var r ="Click Submit button to submit your test!";
                        var submitFlag = readCookie('submitFlag');

                        if(submitFlag == 'zero'){
                            $('.questionHolder').css('display','none');
                            swal({
                                title: "Time Up!",
                                text: r,
                                icon: "info",
                                buttons: [false, "Submit Test"],
                                dangerMode: true,
                            }).then((willDelete) => {
                                if (willDelete) {
                                    // $('.examHolder').css('display','none');
                                    // $('.resultBtnHolder').css('display','flex');

                                    document.cookie = "submitFlag=one;"
                                    document.cookie = "startTimer=zero";
                                    $('.resultBtnHolder').toggle('fade');
                                    $('.questionHolder').load("store_ans.php", {
                                        btnClicked: "endTest"
                                    });
                                    swal("Successfully submitted!", {
                                        icon: "success",
                                    });

                                }
                            });
                        }


                    }
                }
            })
        }, 1000);

    }

})