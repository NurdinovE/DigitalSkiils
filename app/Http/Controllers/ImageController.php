<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        // Сохранение загруженного изображения
        $path = $request->file('image')->store('images', 'public');

        // Получение URL сохраненного изображения
        $url = Storage::url($path);


        // Получение идентификатора текущего аутентифицированного пользователя
        $id = Auth::user()->id;

        // Поиск пользователя по идентификатору
        $user = User::find($id);

        // Присвоение URL изображения пользователю
        $user->image = $url;

        // Сохранение изменений
        $user->save();

        return redirect()->route('profile');
    }
}
