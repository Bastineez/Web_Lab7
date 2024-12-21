<?php
session_start();

if (!isset($_SESSION['profile'])) {
    echo "Немає даних для відображення. Будь ласка, заповніть форму.";
    exit();
}

$profile = $_SESSION['profile'];
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Інформація профілю</title>
</head>
<body>
    <h1>Інформація профілю</h1>

    <?php if (!empty($profile['avatar']) && file_exists($profile['avatar'])): ?>
        <img src="<?= htmlspecialchars($profile['avatar']); ?>" alt="Аватар" style="width: 150px; height: auto;">
    <?php else: ?>
        <p>Аватар не завантажений.</p>
    <?php endif; ?>

    <p><strong>Прізвище:</strong> <?= htmlspecialchars($profile['surname'] ?? 'Не вказано'); ?></p>
    <p><strong>Ім'я:</strong> <?= htmlspecialchars($profile['name'] ?? 'Не вказано'); ?></p>
    <p><strong>По-батькові:</strong> <?= htmlspecialchars($profile['patronymic'] ?? 'Не вказано'); ?></p>
    <p><strong>Дата народження:</strong> <?= htmlspecialchars($profile['birthdate'] ?? 'Не вказано'); ?></p>
    <p><strong>Адреса:</strong> <?= htmlspecialchars($profile['address'] ?? 'Не вказано'); ?></p>
    <p><strong>Мої захоплення:</strong> <?= htmlspecialchars(implode(', ', $profile['hobbies'] ?? [])); ?></p>
    <p><strong>Стать:</strong> <?= htmlspecialchars($profile['gender'] ?? 'Не вказано'); ?></p>
    <p><strong>Національність:</strong> <?= htmlspecialchars($profile['nationality'] ?? 'Не вказано'); ?></p>
    <p><strong>Коротка інформація:</strong> <?= htmlspecialchars($profile['info'] ?? 'Не вказано'); ?></p>
    <p><strong>E-mail:</strong> <?= htmlspecialchars($profile['email'] ?? 'Не вказано'); ?></p>
    <p><strong>Skype:</strong> <?= htmlspecialchars($profile['skype'] ?? 'Не вказано'); ?></p>
    <p><strong>Телефон:</strong> <?= htmlspecialchars($profile['phone'] ?? 'Не вказано'); ?></p>
    <p><strong>Зв'язуватися зі мною по:</strong> <?= htmlspecialchars(implode(', ', $profile['contact_method'] ?? [])); ?></p>
    <p><strong>Отримувати розсилку:</strong> <?= htmlspecialchars($profile['subscribe'] ?? 'Не вказано'); ?></p>
</body>
</html>
