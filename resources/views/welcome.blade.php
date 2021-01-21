<div class="container-head">
    <nav class=" my-nav">
            <img class="nav logo" style=";" src="{{ asset('/logo.png') }}">
            <div class="nav logo-text">
                <p class="inside_logo_text parent">DYNS</p>
                <p class="inside_logo_text child">Develop Youself Successufly Now</p>
            </div>
    </nav>
</div>
<div style="height: 1500px">

</div>


<style>
    .container-head {
        background-image: url('background.jpg');
        height: 100vh;
        width: 100%;
        left: 0;
    }


    .nav {
        flex-flow: wrap;
        padding: 10px 0 0 1em;
    }

    .my-nav {
        align-items: center;
        position: fixed;
        display: flex;
        width: 100%;
        height: 90px;
        background-image: url('background.jpg');
        top: 0;
        z-index: 1;
    }

    .logo{
        margin-left: 10%;
        width: 70px;
        height: 70px;
        z-index: 2;
    }

    .logo-text {
        position: relative;
        align-self:center;
    }

    .inside_logo_text{
        font-family: "Poppins", sans-serif;
        font-size: 14px;
        color: #fff;
        margin: 0;
    }

    .inside_logo_text.parent{
        font-size: 25px;
        font-weight: bold;
    }

    html, body {
        margin: 0;
    }
</style>
