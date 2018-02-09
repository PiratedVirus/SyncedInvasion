<?php
    include '../../dbconnect.php';
    include 'helpers/sessions.php';
    include 'helpers/sql_functions.php';
    include 'helpers/admin_sql_functions.php';
    include 'templates/header.php';
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">info_outline</i>
                    </div>
                    <div id="top" class="card-content">
                        <p class="category">Question ID</p>
                        <h3 class="title qId"> <?php echo getTotalTests($conn)."_".(getQuestionsCountAdmin($conn,$_COOKIE['testname']) + 1); ?>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">content_paste</i><a target="_blank" href="test_questions"> View all Questions from current test.</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-6">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title testTitle"><?php echo $_COOKIE['testname'] ?></h4>
                        <p class="category"><?php echo "To be conducted on " .$_COOKIE['testdate'] ?></p>
                    </div>
                    <div class="card-content table-responsive">
                        <p>Add questions to test. Once done click on Save & Finish.</p>
                    </div>

                </div>
            </div>
        </div>
        </div>

        <div class="row col-md-8 col-md-offset-2 input-holder">
            <div class="row Qstatus"></div>
            <h3 class="title">Question</h3>
            <textarea class="form-control" id="question_title" placeholder="Question Title" rows="3"></textarea>
            <h3 class="title">Options</h3>
            <div class="row">
                <div class="form-group label-floating col-md-4">
                    <label class="control-label">Option A</label>
                    <input type="text" id="optA" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group label-floating col-md-4">
                    <label class="control-label">Option B</label>
                    <input type="text" id="optB" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group label-floating col-md-4">
                    <label class="control-label">Option C</label>
                    <input type="text" id="optC" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group label-floating col-md-4">
                    <label class="control-label">Option D</label>
                    <input type="text" id="optD" class="form-control">
                </div>
            </div>
            <h3 class="title ">Correct Response</h3>
            <div class="row margin-bottom">
                <div class="form-group label-floating col-md-4">
                    <label class="control-label">Correct Option Index( A, B, C, D)</label>
                    <input type="text" id="correctOptIndex" class="form-control">
                </div>
                <div class="form-group col-md-8">
                   <p>The correct answer is : <span id="correctOptText"></span></p>
                </div>
            </div>
            <h3 class="title">Description</h3>
            <textarea class="form-control" id="ans_desc" placeholder="Description for correct answer (optional)" rows="3"></textarea>



            <div class="row margin-bottom col-md-offset-1 margin-top-half margin-bottom-half">
                <a href="#top" type="submit" class="btn btn-primary col-md-5  addNextQuestion">Save & Next</a>
                <a href="test_save" class="btn btn-primary col-md-5 addFinishQuestion"  data-toggle="tooltip" data-placement="right" title="You can add more questions in the future from Edit Tests menu.">Save & Finish</a>
            </div>

        </div>
    </div>
</div>


<?php include 'templates/footer.php'; ?>
<script>
    $('#test').addClass('active');
</script>
