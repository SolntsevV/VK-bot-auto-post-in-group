# VK bot auto post in group

Бот получает последние записи из новостной ленты и постит запись в свое сообщество, но можно перенастроить на пост на свою страницу. Все вложения в пост бот комбинирует и также добавляет
Лучше настроить планировщих заданий так, чтобы через определенный промежуток времени бот отправлял запись в сообщество.

1. В config.php необходимо вставить токен  профиля VK, для этого необходимо перейти [Токен](https://oauth.vk.com/authorize?client_id=4798482&redirect_uri=http://api.vk.com/blank.html&scope=offline,messages,friends,status,wall&display=page&response_type=token) и скопировать из url
2. В config.php необходимо добавить owner id группы, куда будет постить бот. При этом пост может делать только тот бот, от которого создана группа.
3. Настроить планировщих задач на файл updatenews.php

![Example](https://github.com/SolntsevV/VK-bot-auto-post-in-group/raw/master/example.png)