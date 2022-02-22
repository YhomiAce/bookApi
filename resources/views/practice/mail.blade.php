<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Mail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h1>Welcome</h1>
        <div class="row justify-content-center">
            <div class="colmd-8">
                <form action="/send-mail" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Enter Email Address</label>
                        <input type="text" name="email" class="form-control">
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message">Enter Message</label>
                        <textarea name="message" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <FORM name="windowEvent">
        Enter Path Of File Or Window Which You Want To Open : <input type="text" name="txtpath"/>
        <input type="button" value="Open" name="btnOpenPopup" onClick="OpenNewWindow(txtpath.value)" />
     </FORM>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function OpenNewWindow(MyPath)
        {
           window.open(MyPath,"","toolbar=no,status=no,menubar=no,location=center,scrollbars=no,resizable=no,height=500,width=657");
        }
     </script>

</body>
</html>
