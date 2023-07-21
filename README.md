# Бэкенд часть для Sky_pro



## **В проекте:**

- Архитектура на PHP 7.1

----

### Примеры запросов: 

1. Пользователи
| Описание запроса       |                              Пример         | 
| ------------- |:-------------------------------------------:| 
| _Зарегистрироваться_    | POST - https://bayonetta.ru/user/signup.php | 
| _Войти_   | POST - https://bayonetta.ru/user/login.php  | 



request:
```js
const formData = new FormData();
formData.append('login','tony')
formData.append('pass','admin')
fetch('https://bayonetta.ru/user/login.php ', {
    method: 'POST',
    body: formData
})
```

2. Треки
| Описание запроса       | Пример                | 
| ------------- |:------------------:| 
| _Получить все треки_    |  GET - http://bayonetta.ru/track/all.php?<token>   | 
| _Получить трек по id_   | GET - http://bayonetta.ru/track/index.php?id=<id>&token=<token> |

responce on success:
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
responce on error:
```json
{
  "res": false
}
```





