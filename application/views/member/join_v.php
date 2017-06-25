
<div class="mg_top"></div>

<div class="container">

    <div class="row">

        <div class="col-md-6">
            <div class="alert alert-info text-center" role="alert"> 로그인 하시면 더 좋은 서비스를 이용할 수 있습니다. ( <a href="/hComp/member/login">로그인 하러가기</a> ) </div>
            <img src="/hComp/img/pika.jpg" alt="pika">
        </div>

        <div class="col-md-6">
            <div class="alert alert-danger text-center" role="alert"> 계정 만들기 </div>

            <div class="mg_top controls text-center">
                <div class="alert alert-warning help-block" role="alert"> <?php echo validation_errors(); ?> </div>
            </div>

            <form class="mg_top" action="/hComp/member/join" method="POST">

                <label for="id"> 이메일 </label>
                <div class="input-group">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-console"> </span> </span>
                    <input type="text" class="form-control" id="id" name="email" placeholder="이메일 입력" value="<?php echo set_value('email'); ?>">
                </div>
                <br>
                <label for="pw"> 패스워드 </label>
                <div class="input-group">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-adjust"> </span></span>
                    <input type="password" class="form-control" id="pw" name="password" placeholder="비밀번호 입력" value="<?php echo set_value('password') ?>">
                </div>
                <br>
                <label for="phone"> 휴대폰 번호 </label>
                <div class="input-group">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-tags"></span> </span>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="전화번호 입력" value="<?php echo set_value('phone') ?>">
                </div>
                <br>
                <label for="name"> 이름 </label>
                <div class="input-group">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-user"></span> </span>
                    <input type="text" class="form-control" id="name" name="name" placeholder=" 이름입력 " value="<?php echo set_value('name') ?>">
                </div>
                <br><br><br>

                <button type="submit" class="btn btn-danger btn-lg btn-block"> 회원 가입 </button>

            </form>

        </div>

    </div>

</div>