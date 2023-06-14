<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Профиль</title>
    <style>
        .profileModalForm {
            width: 300px;
            margin: 0 auto;
        }

        .ProfileFormTitle {
            margin-left: 10px;
        }

        .inputs {
            width: 280px;
            padding: 0 10px;
        }

        .profileImage{
            width: 30%;
        }
        .profileInfo{
            margin-left: auto;
            width: 60%;
        }
        .userAvatar{
            width: 150px;
            height: 190px;
            border-radius: 50%;
            margin:0 auto 30px;
        }
        .userAvatar img{
            width: 100%;
            height: 100%;
        }

        @media (max-width: 480px) {
            .profileContainer{
                display: block;
            }
            .profileImage{
                width: 100%;
            }
            .profileInfo{
                width: 100%;
            }
        }
    </style>
</head>
<body>
@include('layouts/navigation')
<main>
    <section class="profile">
        <div class="container">
            <div class="profileContainer d-flex justify-between flex-wrap  ">
                <div class="profileImage mx-auto sm:px-6 lg:px-8">
                    <div class="userAvatar">
                        <img class="rounded-circle" src="{{ $imageUrl ? $imageUrl : 'https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg'}}" alt="">
                    </div>
                    <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control" type="file" name="image" id="formFile">
                            <button class="btn btn-secondary text-gray-900 mt-4" type="submit">Upload</button>
                        </div>
                    </form>
                </div>
                <div class="profileInfo  sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            @if ($errors->any())
                                <!-- Если есть ошибки валидации, отображается блок с сообщением об ошибке -->
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{route('editUserInfo')}}" method="post" class="profileModalForm ">
                                @csrf
                                <h3 class="ProfileFormTitle">Profile Settings</h3>
                                <div class="inputs">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text"
                                               class="form-control" id="name"
                                               name="name"
                                               value="{{Auth::user()->name ? Auth::user()->name : ""}}"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledInput" class="form-label">Email</label>
                                        <input class="form-control"
                                               id="disabledInput"
                                               type="email"
                                               value="{{Auth::user()->email ? Auth::user()->email : ""}}"
                                               disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="surname" class="form-label">Surname</label>
                                        <input type="text"
                                               class="form-control"
                                               id="surname"
                                               aria-describedby="emailHelp"
                                               name="surname"
                                               value="{{Auth::user()->surname ? Auth::user()->surname : ""}}"
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Your phone number</label>
                                        <input type="number"
                                               class="form-control"
                                               id="phone"
                                               aria-describedby="emailHelp"
                                               name="phone"
                                               placeholder="996"
                                               value="{{Auth::user()->phone ? Auth::user()->phone : ""}}"
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label for="tglink" class="form-label">Telegram link</label>
                                        <input type="text"
                                               class="form-control"
                                               id="tglink"
                                               aria-describedby="emailHelp"
                                               name="tglink"
                                               value="{{Auth::user()->tglink ? Auth::user()->tglink : ""}}"
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label for="additionalInfo" class="form-label">Other information</label>
                                        <input type="text"
                                               class="form-control"
                                               id="additionalInfo"
                                               aria-describedby="emailHelp"
                                               name="additionalInfo"
                                               value="{{Auth::user()->additionalInfo ? Auth::user()->additionalInfo : ""}}"
                                        >
                                    </div>
                                </div>
                                <button
                                    class="btn btn-primary"
                                    type="submit">Save update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
</body>
</html>
