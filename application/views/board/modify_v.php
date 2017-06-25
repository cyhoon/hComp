<!---->
<?php
//    print_r($views);
//    exit;
//?>

<div class="container">



    <p class="mg_top"></p>

    <div class="alert alert-info" role="alert"> 매너있는 글 작성이 사람을 만듭니다. </div>

    <p class="mg_top"></p>

    <form action="/hComp/board/modify/<?php echo $this->uri->segment(3); ?>" method="POST">

        <div class="panel panel-primary">

            <div class="panel-heading">
                <h3 class="panel-title"> <input type="text" class="form-control" placeholder="제목" name="subject" value="<?php echo $views[0]->subject; ?>" </h3>
            </div>

            <div class="panel-body">

                <table cellspacing="0" cellpadding="0" class="table table-striped">

                    <thead class="pull-right">

                    <tr>
                        <th scope="col"> <input type="text" class="form-control" disabled value="<?php echo $this->session->userdata('name'); ?>"> </th>
                    </tr>

                    </thead>

                </table>

                <textarea name="content" rows="3" style="width: 100%; margin: 0px; height: 268px;"><?php echo $views[0]->contents; ?></textarea>

            </div>

            <div class="controls text-center">
                <p class="help-block"><?php echo validation_errors(); ?></p>
            </div>

        </div>

        <div class="pull-right">
            <button type="submit" class="btn btn-success">작성</button>
            <a href="http://localhost/hComp/board/lists" class="btn btn-danger">취소</a>
        </div>

    </form>

</div>