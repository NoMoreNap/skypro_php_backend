# Бэкенд часть для Sky_pro



## **В проекте:**

- Архитектура на PHP 7.1

----

### Примеры запросов:

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
responce:
```json
{
  "res": true,
  "token": "9ca4ff3a53ecd75e47e1c901ffafec63"
}
```





