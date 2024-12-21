<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Збереження даних профілю
    $_SESSION['profile'] = [
        'surname' => $_POST['surname'] ?? '',
        'name' => $_POST['name'] ?? '',
        'patronymic' => $_POST['patronymic'] ?? '',
        'birthdate' => $_POST['birthdate'] ?? '',
        'address' => $_POST['address'] ?? '',
        'hobbies' => $_POST['hobbies'] ?? [],
        'gender' => $_POST['gender'] ?? '',
        'nationality' => $_POST['nationality'] ?? '',
        'info' => $_POST['info'] ?? '',
        'email' => $_POST['email'] ?? '',
        'skype' => $_POST['skype'] ?? '',
        'phone' => $_POST['phone'] ?? '',
        'contact_method' => $_POST['contact_method'] ?? [],
        'subscribe' => $_POST['subscribe'] ?? '',
        'avatar' => '/uploads', // Початкове значення
    ];

    // Завантаження аватара

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
			$avatarPath = 'uploads/' . basename($_FILES['avatar']['name']);

			if (move_uploaded_file($_FILES['avatar']['tmp_name'], $avatarPath)) {
					$_SESSION['profile']['avatar'] = $avatarPath;
			} else {
					echo "Помилка при збереженні аватара.";
			}
	}

	header('Location: profile.php');
	exit();
}
?>
