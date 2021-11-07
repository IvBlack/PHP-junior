<?php

namespace App;

use App\Rules\Ember;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //protected $table = 'models';
    //protected $timestamps = false; заменяет created_at, updated_at
    protected $fillable = ['text', 'title', 'isPrivate', 'category_id']; //какие поля можно менять



public function category() {
    return $this->belongsTo(Category::class, 'category_id')->first();
}

//непосредственно наши правила валидации
//метод вызывается в NewsController, через News::rules
public static function rules() {
    $tableNameCategory = (new Category())->getTable();

    return [
        'title' => ['required','min:5', 'max:20', new Ember()],
        'text' => 'required|min:3',
        'image' => 'jedi|mimes: jpeg, bmp, png|max:1000',
        'isPrivate' => 'sometimes|in:on',
        'category_id' => "required|exists:{$tableNameCategory},id"
    ];
}

public static function attrNames() {
    return [
        'title' => 'Описание новости',
        'text' => 'Содержание новости',
        'image' => 'Изображение',
        'category_id' => 'Категория новости',
    ];
}

}
 