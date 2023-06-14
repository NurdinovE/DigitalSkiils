<style>
    .btn {
        margin-left: 10px;
    }
</style>
<div class="container">
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none font-big">
                DigitalSkills
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

            <li><a href="/" class="nav-link px-2">Главная</a></li>
            <li><a href="/" class="nav-link px-2">Контакты</a></li>
            <li><a href="/" class="nav-link px-2">О нас</a></li>
        </ul>

        <div class="col-md-3 text-end">
            @if (Route::has('login'))
                <div>
                @auth
                    <!-- Если пользователь аутентифицирован, отображается блок с кнопкой "Profile" и кнопкой "Log Out" -->
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary ml-4">
                                <a href="{{ route('profile') }}"
                                   class="ml-4 text-sm text-white dark:text-gray-500 underline text-decoration-none">Profile</a>
                            </button>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="button" class="btn btn-primary">
                                    <a href="{{route('logout')}}"
                                       class="text-white text-decoration-none"
                                       onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </button>

                            </form>
                        </div>
                @else
                    <!-- Если пользователь не аутентифицирован, отображается блок с кнопками "Log in" и "Register" -->

                        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                            <!-- First Modal -->
                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                                 aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @include('../auth/register')
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2"
                                                    data-bs-toggle="modal">
                                                Already registered
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Second Modal -->
                            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                                 aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @include('../auth/login')
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                                Registration
                            </button>
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
                                log In
                            </button>

                            @endauth
                        </div>
                    @endif
                </div>
    </header>
</div>

