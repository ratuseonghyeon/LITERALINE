INSERT IGNORE INTO users (name, username, password, role)
VALUES
(
    'User Test',
    'user_test',
    '$2y$10$8ylZnBkylfU8F5/jLPWAT.2MzkIXZe3iu7Xe/T7I0PunJuDvlozBq',
    'user'
),
(
    'Admin Test',
    'admin_test',
    '$2y$10$l8SxLHgisF3LsKLFXd6YiuGpUkK9BQxIjU0KanWhE1ex20.n2tD02',
    'admin'
);