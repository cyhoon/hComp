<h1></h1>

<script type="text/javascript">
    function comment_add()
    {
        var csrf_token = getCookie('csrf_cookie_name');
        var name = "comment_contents=" + encodeURIComponent(document.com_add.comment_contents.value) + "&csrf_test_name="+csrf_token+"&table=<?php echo $this->uri->segment(3); ?>&board_id=<?php echo $this->uri->segment(5);?>";
        sendRequest("/bbs/ajax_board/ajax_comment_add", name, add_action, "POST");
    }

    function add_action()
    {
        if ( httpRequest.readyState == 4 )
        {
            if(httpRequest.status == 200 )
            {
                if ( httpRequest.responseText == 1000 )
                {
                    alert("댓글 내용을 입력하세요");
                }
                else if ( httpRequest.responseText == 2000 )
                {
                    alert("다시 입력하세요");
                }
                else if ( httpRequest.responseText == 9000 )
                {
                    alert("로그인하여야 합니다.");
                }
                else
                {
                    var contents = document.getElementById("comment_area");
                    contents.innerHTML = httpRequest.responseText;

                    var textareas = document.getElementById("input01");
                    textareas.value = '';
                }
            }
        }
    }
</script>

<div class="container">

    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $views[0]->subject; ?>  </h3>
        </div>

        <div class="panel-body">

            <table cellspacing="0" cellpadding="0" class="table table-striped">

                <thead class="pull-right">

                    <tr>
                        <th scope="col">이름 : <?php echo $views[0]->user_name; ?></th>
                        <th scope="col">조회수 : <?php  echo $views[0]->hits; ?></th>
                        <th scope="col">등록일 : <?php echo $views[0]->reg_date; ?></th>
                    </tr>
                    <tr class="pull-right"> <th scope="col">이메일 : <?php echo $views[0]->email; ?></th> </tr>

                </thead>

            </table>

            <p> <?php echo $views[0]->contents ?> </p>

        </div>
    </div>

    <div class="pull-right">
        <a href="http://localhost/hComp/board/write" class="btn btn-success btn">작성</a>
        <a href="http://localhost/hComp/board/modify/<?php echo $views[0]->board_id; ?>" class="btn btn-warning">수정</a>
        <a href="http://localhost/hComp/board/delete/<?php echo $views[0]->board_id; ?>" class="btn btn-danger" role="button">삭제</a>
    </div>

</div>