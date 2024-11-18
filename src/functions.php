<?php
function uriPath(): string
{

    $url = $_SERVER['REQUEST_URI'];

    $urlParts = parse_url($url);

    return $urlParts['path'];

}



function routeToController(string $path): void
{
    $validRouteController = false;

    if (array_key_exists($path, ROUTES)) {
        $filePath = __DIR__ . '/../controllers/' . ROUTES[$path] . '.php';

        if (file_exists($filePath)) {
            $validRouteController = true;
            require $filePath;
        } else {
            error_log("Contrôleur introuvable : " . $filePath);
        }
    }

    if (!$validRouteController) {
        error_log("Route invalide : " . $path);
<<<<<<< HEAD
        //require __DIR__ . '/../views/page-not-found.php';
=======
        //require views/page-not-found.php;
>>>>>>> 9235782d2a2ffdc2f185a84a57e35de553d0a353
    }
}


function urlActive(string|array $paths, string $class): string
{

    $path = uriPath();

    if (is_array($paths) && in_array($path, $paths)) {
        return $class;
    }

    if ($path === $paths) {
        return $class;
    }

    return "";

}

function redirect(string $path): void
{
    header('Location: ' . $path);
    exit;

}

function addToCart()
{
    session_start();

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $itemId = (int) $_POST['id'];

        if (!in_array($itemId, $_SESSION['cart'])) {
            $_SESSION['cart'][] = $itemId;
            $message = "Article ajouté au panier !";
        }
    } else {
        $message = "ID d'article invalide.";
    }

    header("Location: " . $_SERVER['PHP_SELF'] . "?message=" . urlencode($message));
    exit;
}
function userLetThrough(PDO $pdo, string $email, string $password): bool
{
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['password'] === $password) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['email'] = $user['email'];

        return true;
    }

    return false;
}

