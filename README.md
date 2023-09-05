# api-jsonplaceholder
Данный проект осуществляет работу с API сервиса JsonPlaceholder. С его помощью вы сможете: вывести конкретного пользователя, его задачи и запись. Каждую запись можно добавить отдельно.

Для начала работы создайте экземпляр класса User или Post:

$user = new User();
$post = new Post();

Далее обратитесь к методам и введите id нужного пользователя (для класса User):

$user->getUser(10);<br>
$user->getPosts(10);<br>
$user->getTasks(10);<br>

Или введите данные для новой записи и id пользователя (для класса Post):

$post->addPost('Заголовок', 'Текст', 10);

