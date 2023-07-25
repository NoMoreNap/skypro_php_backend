# Бэкенд часть для Sky_pro



## **В проекте:**

- Архитектура на PHP 7.1

----

### Примеры запросов: 

```js
// POST
const formData = new FormData();
formData.append('login','tony')
formData.append('pass','admin')
fetch('https://bayonetta.ru/user/login.php ', {
    method: 'POST',
    body: formData
})
```
```js
// GET
fetch('https://bayonetta.ru/track/index.php?id=<id>&token=<token>'})
```
#### Ручки:
1. Пользователи

| Описание запроса       |                              Пример         | 
| ------------- |:-------------------------------------------:| 
| _Зарегистрироваться_    | POST - https://bayonetta.ru/user/signup.php | 
| _Войти_   | POST - https://bayonetta.ru/user/login.php  |


2. Треки

| Описание запроса               |                                 Пример                                  | 
|--------------------------------|:-----------------------------------------------------------------------:| 
| _Получить все треки_           |            GET - https://bayonetta.ru/track/all.php?<token>             | 
| _Получить треки по id_         |    GET - https://bayonetta.ru/track/index.php?id=<id>&token=<token>     |
| _Добавить трек в избранное_    | POST - https://bayonetta.ru/track/favorite.php?token=<token>&action=add |
| body                           |                              id: id трека                               |
| _Получить избранные треки_     | GET - https://bayonetta.ru/track/favorite.php?token=<token>&action=get  |
| _Удалить трек из избранного_   | POST - https://bayonetta.ru/track/favorite.php?token=<token>&action=del |
| body                           |                              id: id трека                               |
| _Получить сортированные треки_ | GET - https://bayonetta.ru/track/favorite.php?token=<token>&action=rand |

#### Ответы:

Responces on success:
```json
[
    { "song_name": "string",
      "author": "string",
      "album": "string",
      "duratation": "string",
      "subtitle": "string",
      "id": "string",
      "url": "string" },
  
    { "song_name": "string",
      "author": "string",
      "album": "string",
      "duratation": "string",
      "subtitle": "string",
      "id": "string",
      "url": "string" },
  
    {} // and more, if u get all tracks
]
```
```json
{
  "res": true,
  "text": "Success text."
}
```
Responce on error:
```json
{
  "res": false,
  "text": "Error message."
}
```





