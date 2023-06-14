<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function editUserInfo(Request $request)
    {
        // валидация полей
        $validatedData = $request->validate([
            'name' => ['string', "min:1", 'regex:/^[A-Za-z\s]+$/'],
            'surname' => ['string',"min:1", 'regex:/^[A-Za-z\s]+$/'],
            'phone' => ['numeric', 'regex:/^(\+996)?\d{12}$/'],
            'additionalInfo' => ['string','regex:/^[a-zA-Z0-9\s.,!?-]+$/'],
            'tglink' => ['string', 'regex:/^https:\/\/t.me\/[A-Za-z0-9_]{5,}$/'],
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);

        //Присвоение значения полей из валидации
        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->phone = $validatedData['phone'];
        $user->tglink = $validatedData['tglink'];
        $user->additionalInfo = $validatedData['additionalInfo'];

        $user->save();

        return redirect(route('profile'));
    }

    function profile()
    {
        // Получение идентификатора текущего аутентифицированного пользователя
        $id = Auth::user()->id;

        // Поиск пользователя по идентификатору
        $model = User::find($id);


        // Получение URL изображения пользователя
        $imageUrl = $model->image;

        // Возвращение представления 'profile' с передачей URL изображения в виде переменной
        return view('profile', ['imageUrl' => $imageUrl]);


    }
}
