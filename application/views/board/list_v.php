
<h1></h1>
<div class="container">

    <div class="jumbotron">
        <div class="container">
            <h2> 대한민국 <span style="font-size:35px; color:#0000FF">정보보안</span>을 책임지는 <span style="color: darkred; font-size: 35px;">대표 피~카~츄 기업</span> </h2>
            <p class="pull-right" style="font-size: 40px; color: #843534"> hComp <span style="font-size:20px; color:#272525">(  ( Hacker Company )  )</span></p>
            <p class="pull-right"></p>
        </div>
    </div>


    <div class="alert alert-info" role="alert">
        <p style="text-align: center"> Hacker Company is a bulletin board.  </p>
    </div>

    <article id="board_area">
        <header>
            <h1></h1>
        </header>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">번호</th>
                <th scope="col">제목</th>
                <th scope="col">작성자</th>
                <th scope="col">이메일</th>
                <th scope="col">조회수</th>
                <th scope="col">작성일</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($list as $lt) {
                ?>
                <tr>
                    <th scope="row">
                        <?php echo $lt->board_id; ?>
                    </th>

                    <td>
                        <a rel="external" href="/hComp/board/view/<?php echo $lt->board_id; ?>"><?php echo $lt->subject; ?></a>
                    </td>

                    <td><?php echo $lt->user_name; ?></td>

                    <td><?php echo $lt->email; ?></td>

                    <td><?php echo $lt->hits; ?></td>

                    <td>
                        <time datetime="<?php echo mdate("%Y-%M-%j", human_to_unix($lt->reg_date)); ?>"><?php echo mdate("%M, %j, %y", human_to_unix($lt->reg_date)); ?></time>
                    </td>

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

        <div class="pull-right">
            <a href="http://localhost/hComp/board/write" class="btn btn-success btn">작성</a>
        </div>

    </article>
