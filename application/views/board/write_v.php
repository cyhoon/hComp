<div class="container">


    <p class="mg_top"></p>

    <div class="alert alert-info" role="alert"> 매너있는 글 작성이 사람을 만듭니다. </div>

    <p class="mg_top"></p>

    <form action="http://localhost/hComp/board/write" method="POST">

        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title"> <input type="text" class="form-control" placeholder="제목" name="subject" value="<?php echo set_value('subject'); ?>"></h3>
            </div>

            <div class="panel-body">

                <table cellspacing="0" cellpadding="0" class="table table-striped">

                    <thead class="pull-right">

                    <tr>
                        <th scope="col">
<!--                            세션 적용하기전 코드 -->
<!--                        <input type="text" class="form-control" value="--><?php //echo set_value('name'); ?><!--">-->
                            <input type="text" class="form-control text-center" value="<?php echo $this->session->userdata('name'); ?>" disabled>
                        </th>
                    </tr>

                    </thead>

                </table>

                <textarea name="content" rows="3" style="width: 100%; margin: 0px; height: 268px;"><?php echo set_value('content'); ?></textarea>

            </div>

        </div>

        <div class="pull-right">
            <button type="submit" class="btn btn-success">작성</button>
            <a href="http://localhost/hComp/board/lists" class="btn btn-danger">취소</a>
        </div>

    </form>

</div>